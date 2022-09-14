<?php
/**
 * @link https://perfectpanel.com/
 * @copyright Copyright (c) 2008 Perfect Panel LLC
 * @license https://perfectpanel.com/license/
 */

namespace app\modules\ordersList\widgets;

use app\modules\ordersList\models\lang\Lang;
use yii\bootstrap5\Widget;

/**
 * Language switcher widget
 */
class WLang extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function init(){}

    /**
     * {@inheritdoc}
     * @return string|void
     */
    public function run() {
        return $this->render('view', [
            'current' => Lang::getCurrent(),
            'langs' => Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all(),
        ]);
    }
}