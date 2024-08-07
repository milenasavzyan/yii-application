<?php

use yii\helpers\Html;
use yii\helpers\Url;

$content = strip_tags($model->content);
$shortContent = mb_strimwidth($content, 0, 100, '...');
?>

<div class="tn-news">
    <div class="tn-title">
        <?php if ($model->image): ?>
            <a href="<?= Url::to(['view', 'id' => $model->id]) ?>">
                <img src="<?= Yii::getAlias('@web/' . $model->image) ?>" alt="<?= htmlspecialchars($model->title) ?>" class="img-fluid" style="height: auto; width: 150px;">
            </a>
         <?php endif; ?>
    </div>
    <div>
        <h4><?= Html::encode($model->title) ?></h4>
        <p><?= Html::encode($shortContent) ?></p>
    </div>
</div>
