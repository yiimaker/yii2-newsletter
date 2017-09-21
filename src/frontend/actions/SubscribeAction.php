<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\frontend\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use ymaker\newsletter\common\services\ServiceInterface;

/**
 * Action for subscribe on newsletter.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class SubscribeAction extends Action
{
    /**
     * Running action.
     *
     * @return \yii\web\Response|array
     * @throws NotFoundHttpException
     */
    public function run()
    {
        $request = Yii::$app->getRequest();
        if ($request->getIsPost()) {
            /* @var ServiceInterface $service */
            $service = Yii::createObject(ServiceInterface::class);
            $response = Yii::$app->getResponse();

            if (!$service->create($request->post()) && $request->getIsAjax()) {
                $response->format = Response::FORMAT_JSON;
                return $service->getErrors();
            }

            return $response->redirect($request->getReferrer());
        }
        throw new NotFoundHttpException();
    }
}
