<?php

namespace app\components;

use app\models\Statistic;
use Yii;
use yii\base\Component;

class MyComponent extends Component
{
    public $label1;
    private $_label2;

    public function getLabel2()
    {
        return $this->_label2;
    }
    public function setLabel2($value)
    {
        $this->_label2 = strtolower($value);
    }

    public function welcome()
    {
        echo "Test Component";
    }

    //event
    const EVENT_AFTER_RENDER = 'after-render';

    public static function MyEventHandler()
    {
        $statistic = new Statistic();
        $statistic->access_time = date("Y-m-d H:i:s");
        $statistic->user_host = Yii::$app->request->getHostInfo();
        $statistic->path_info = Yii::$app->getRequest()->getPathInfo();
        $statistic->user_ip = Yii::$app->request->userIP;
        $statistic->query_string = Yii::$app->request->queryString;
        $statistic->save();
    }
}
