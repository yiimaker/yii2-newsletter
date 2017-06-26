<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\common\services;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\db\Connection;
use yii\di\Instance;
use ymaker\newsletter\common\events\SubscribeEvent;
use ymaker\newsletter\common\models\entities\NewsletterClient;

/**
 * Service for newsletter model
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DbService extends Component implements ServiceInterface
{
    const MODE_GENERIC = 1;
    const MODE_EMAIL = 2;

    /**
     * @var string|Connection
     */
    public $db = 'db';
    /**
     * @var int
     */
    public $mode = self::MODE_EMAIL;


    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->mode !== self::MODE_GENERIC && $this->mode !== self::MODE_EMAIL) {
            throw new InvalidConfigException('Invalid mode!');
        }
        $this->db = Instance::ensure($this->db, Connection::class);
    }

    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new NewsletterClient();
    }

    /**
     * @inheritdoc
     */
    public function getDataProvider()
    {
        $query = NewsletterClient::find()->orderBy(['created_at' => SORT_ASC]);

        return new ActiveDataProvider([
            'query' => $query,
            'db' => $this->db,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $model = $this->getModel();
        $initResult = $this->initModel($model, $data);

        if (is_array($initResult)) {
            return $initResult;
        } elseif ($initResult) {
            try {
                if ($model->insert(false)) {
                    $this->trigger(
                        SubscribeEvent::EVENT_AFTER_SUBSCRIBE,
                        Yii::createObject([
                            'class' => SubscribeEvent::class,
                            'contacts' => $model->contacts,
                        ])
                    );
                    return true;
                }
            } catch (\Exception $ex) {
                throw $ex;
            }
        }
        return false;
    }

    /**
     * Process post data
     *
     * @param NewsletterClient $model
     * @param array $data
     * @return array|bool
     */
    protected function initModel(&$model, array $data)
    {
        if ($model->load($data)) {
            switch ($this->mode) {
                case self::MODE_GENERIC:
                    $model->setScenario(NewsletterClient::SCENARIO_DEFAULT);
                    break;
                case self::MODE_EMAIL:
                    $model->setScenario(NewsletterClient::SCENARIO_CONTACTS_EMAIL);
                    break;
            }

            if (!$model->validate()) {
                return $model->getErrors();
            }
            return true;
        }
        return false;
    }
}
