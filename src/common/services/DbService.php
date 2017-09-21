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
 * Database service.
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
    private $_mode = self::MODE_EMAIL;
    /**
     * @var array
     */
    private $_errors = [];
    /**
     * @var NewsletterClient
     */
    private $_model;


    /**
     * Setter for mode.
     *
     * @param int $mode
     */
    public function setMode($mode)
    {
        $this->_mode = $mode;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->_mode !== self::MODE_GENERIC && $this->_mode !== self::MODE_EMAIL) {
            throw new InvalidConfigException('Invalid mode config!');
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
        return new ActiveDataProvider([
            'query' => NewsletterClient::find()->orderBy(['created_at' => SORT_ASC]),
            'db' => $this->db,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $this->_model = $this->getModel();
        $this->defineMode();
        if ($this->checkModel($data)) {
            try {
                if ($this->_model->insert(false)) {
                    $this->trigger(SubscribeEvent::EVENT_AFTER_SUBSCRIBE, Yii::createObject([
                        'class' => SubscribeEvent::class,
                        'contacts' => $this->_model->contacts,
                    ]));
                    return true;
                }
            } catch (\Exception $ex) {
                throw $ex;
            }
        }
        return false;
    }

    /**
     * Define mode for model.
     */
    protected function defineMode()
    {
        switch ($this->_mode) {
            case self::MODE_GENERIC:
                $this->_model->setScenario(NewsletterClient::SCENARIO_DEFAULT);
                break;
            case self::MODE_EMAIL:
                $this->_model->setScenario(NewsletterClient::SCENARIO_CONTACTS_EMAIL);
                break;
        }
    }

    /**
     * Process post data.
     *
     * @param array $data
     * @return bool
     */
    protected function checkModel(array $data)
    {
        if ($this->_model->load($data)) {
            if ($this->_model->validate()) {
                return true;
            }
            $this->_errors = $this->_model->getErrors();
        }
        return false;
    }
}
