<h1>Редактировать комментарий</h1>

<form action="" method="post">


    <label for="news">Выбрать комментарий</label>
    <select name="comment_id" id="news" class="form-control" required>


        <?php foreach ($data['comments'] as $comment) : ?>

            <option value="<?php echo $comment['id'] ?>"><?php echo '[Пользователь: ' . $comment['user'] . '] | [Новость: ' . $comment['news_title'] . '] | [Комментарий: ' . $comment['content'] . ']' ?></option>

        <?php endforeach; ?>

    </select>

    <label for="content">Редактировать</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
    <br>
    <input type="submit" class="btn btn-success" value="Редактировать">

</form>