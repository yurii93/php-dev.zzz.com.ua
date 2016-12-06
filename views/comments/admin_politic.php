<h1>Модерация комментариев (политика)</h1>

<form action="" method="post">


    <label for="news">Комментарий</label>
    <select name="comment_id" id="news" class="form-control" required>

        <?php if(!$data['comments']) :?>
            <option disabled selected><?php echo 'Нет комментариев в категории политика'; ?></option>
        <?php endif; ?>

        <?php foreach ($data['comments'] as $comment) : ?>
            <option required value="<?php echo $comment['id'] ?>"><?php echo $comment['content']; ?></option>
        <?php endforeach; ?>

    </select>
    <br>
    <label for="content">Сделать видимым</label>

    <input type="checkbox" value="1" name="show" id="content" class="form-control" required>

    <br>
    <input type="submit" class="btn btn-success" value="Показать">

</form>