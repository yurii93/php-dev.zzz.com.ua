<h3>Добавить новость</h3><br>
<form action="" method="post">

    <div class="form-group">
        <label for="category">Категория</label>
        <select name="category" class="form-control" required>

            <?php foreach ($data['category_list'] as $item) : ?>

            <option value="<?php echo $item['title'] . ',' . $item['id'] ?>"><?php echo $item['title'] ?></option>

            <?php endforeach;?>

        </select>
    </div>

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" value="" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Содержимое</label>
        <textarea id="content" name="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="tags">Теги</label>
        <input type="text" id="tags" name="tags" value="" class="form-control" placeholder="Если большо одного - писать через запятую и без пробела" required>
    </div>

    <div class="form-group">
        <label for="image">Изображение (URL)</label>
        <input type="text" id="image" name="image" value="" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="analytik">Аналитическая?</label>
        <input type="checkbox" id="analytik" name="analytik" value="1" class="form-control">
    </div>

    <input type="submit" class="btn btn-success" value="Добавить">
</form>