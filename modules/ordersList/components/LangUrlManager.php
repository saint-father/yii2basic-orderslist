<?php
namespace app\modules\ordersList\components;

use app\modules\ordersList\models\lang\Lang;
use yii\web\UrlManager;

class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if( isset($params['lang_id']) ){
            // find language or set default
            $lang = Lang::findOne($params['lang_id']);

            if ($lang === null){
                $lang = Lang::getDefaultLang();
            }

            unset($params['lang_id']);
            $url = parent::createUrl($params);

            return $url == '/' ? '/' . $lang->url : '/' . $lang->url . $url;
        } else {
            $lang = Lang::getCurrent();
        }

        $url = parent::createUrl($params);

        return $url; // == '/' ? '/' . $lang->url : '/' . $lang->url . $url;
    }
}
