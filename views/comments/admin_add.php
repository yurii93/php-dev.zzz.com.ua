<h1>Добавить комментарий</h1>

<form action="" method="post">


    <label for="news">Выбрать новость</label>
    <select name="news_id" id="news" class="form-control" required>


        <?php foreach ($data['news'] as $news) : ?>

            <option value="<?php echo $news['id'] ?>"><?php echo $news['title'] ?></option>

        <?php endforeach; ?>

    </select>

    <label for="content">Ваш комментарий</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
    <br>
    <input type="submit" class="btn btn-success" value="Добавить">

</form>