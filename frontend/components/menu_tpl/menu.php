<a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>" class="nav-item nav-link">
<?php if ($category['id'] != 1): ?>
<?php endif; ?>
<?php if (isset($category['children'])) : ?>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown"><?= $category['title'] ?> <i
                    class="fa fa-angle-down float-right mt-1"></i></a>
        <div class="dropdown-menu bg-secondary border-0 rounded-0 w-100 m-0">
            <?= $this->getMenuHtml($category['children']) ?>
        </div>
    </div>
<?php endif; ?>
</a>