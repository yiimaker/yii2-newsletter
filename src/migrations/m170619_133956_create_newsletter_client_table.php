<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

use yii\db\Migration;

/**
 * Handles the creation of table `newsletter_client`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class m170619_133956_create_newsletter_client_table extends Migration
{
    /**
     * @var string Migration tabel name.
     */
    public $tableName = '{{%newsletter_client}}';


    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            /* @link http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci */
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            $this->tableName,
            [
                'id'            => $this->primaryKey()->comment('ID'),
                'contacts'      => $this->string(255)->comment('Contacts'),
                'created_at'    => $this->integer()->notNull()->comment('Created at'),
                'updated_at'    => $this->integer()->notNull()->comment('Updated at'),
            ],
            $tableOptions
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
