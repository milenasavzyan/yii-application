<?php

use backend\models\Category;
use bajadev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class, [
        'options' => [
            'rows' => 6,
            'height' => 400,
            'toolbar' => [
                ['Bold', 'Italic', 'Underline'],
                ['NumberedList', 'BulletedList'],
                ['Link', 'Unlink'],
                ['Image', 'Table', 'HorizontalRule'],
                ['Undo', 'Redo']
            ],
            'removePlugins' => 'elementspath',
            'resize_enabled' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'categories')->checkboxList(
        ArrayHelper::map(Category::find()->all(), 'id', 'title'),
        ['separator' => '<br>']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
