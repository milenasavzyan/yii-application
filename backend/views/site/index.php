<?php

/* @var $this \yii\web\View */

use yii\widgets\Menu;

$this->title = "Welcome!"
?>

<div class="row">
    <div class="col-lg-4 col-xs-12">
        <h5>Categories</h5>
        <div class="icon">
            <i class="fa fa-user"></i>
        </div>
        <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>


    <div class="col-lg-4 col-xs-12">
        <h5>Posts</h5>
        <div class="icon">
            <i class="fa fa-user"></i>
        </div>
        <a href="<?= \yii\helpers\Url::to(['post/index']) ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>


</div>

