<?php
use yii\helpers\Html;
?>
<?= Html::checkboxList('child_categories', null, \yii\helpers\ArrayHelper::map($childCategories, 'id', 'title')) ?>
