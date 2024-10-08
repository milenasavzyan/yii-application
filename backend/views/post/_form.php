<?php
use common\models\Category;
use bajadev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

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

    <?= $form->field($model, 'information')->widget(CKEditor::class, [
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
    <?= $form->field($model, 'categories[]')->checkboxList($parentCategories, [
        'item' => function($index, $label, $name, $checked, $value) use ($childCategories) {
            $checkbox = "<div>";
            $checkbox .= "<label>{$label}</label>";
            if (isset($childCategories[$value])) {
                foreach ($childCategories[$value] as $childCategory) {
                    $checkbox .= "<div style='margin-left:20px;'><label><input type='checkbox' name='Categories[]' value='{$childCategory->id}'> {$childCategory->title}</label></div>";
                }
            }
            $checkbox .= "</div>";
            return $checkbox;
        }
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
