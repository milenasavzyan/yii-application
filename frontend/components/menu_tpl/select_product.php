<option value="<?= $category['id'] ?>"
    <?php if ($category['id'] == $this->model->category_id) echo 'selected' ?>>
    <?= $category['title'] ?>
</option>

<?php if (isset($category['children'])) : ?>
    <?= $this->getMenuHtml($category['children']) ?>
<?php endif; ?>
