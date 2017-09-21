<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\common\services;

/**
 * Base interface for services.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
interface ServiceInterface
{
    /**
     * Returns model object.
     *
     * @return mixed
     */
    public function getModel();

    /**
     * Returns data provider.
     *
     * @return \yii\data\BaseDataProvider
     */
    public function getDataProvider();

    /**
     * Creates newsletter client.
     *
     * @param array $data Array with client contacts
     * @return bool
     */
    public function create(array $data);

    /**
     * Should returns array with errors.
     *
     * @return array
     */
    public function getErrors();
}
