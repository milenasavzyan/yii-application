<option value="<?= $category['id'] ?>"
    <?php if ($category['id'] == $this->model->parent_id) echo 'selected' ?>
    <?php if ($category['id'] == $this->model->id) echo 'disabled' ?>>
    <?= $category['title'] ?>
</option>

<?php if (isset($category['children'])) : ?>
    <?= $this->getMenuHtml($category['children']) ?>
<?php endif; ?>
