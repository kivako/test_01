<?php


namespace app\controllers;


use app\models\OtherData;

/**
 * API Контроллер
 * @package app\controllers
 */
class OtherDataApiController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\OtherData';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    /**
     * Метод создания, если нет входных данных создаст со случайными значениями
     * @return OtherData|false
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model = new OtherData();
        if ($body = \Yii::$app->getRequest()->getRawBody()) {
            if ($ar = json_decode($body,true)) {
                if (!$model->load($ar, '')) {
                    return "Не верные входные параметры\n";
                }
            } else {
                return "Не верные входные параметры, не могу декодировать JSON\n";
            }
        } else {
            $model->c1 = $this->genRandomString();
            $model->c2 = $this->genRandomNumber();
        }

        if ($model->validate() && $model->save()) {
            return $model;
        }
        return false;
    }

    /**
     * Генерация случайного числа
     * @return int
     * @throws \Exception
     */
    private function genRandomNumber()
    {
        return random_int(100, 999);
    }

    /**
     * Генерация случайной строки
     * @param int $length
     * @return string
     */
    private function genRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}