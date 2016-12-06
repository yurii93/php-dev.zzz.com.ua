<?php if (isset($_SESSION['menuItems'])) {
    $menuItems = unserialize($_SESSION['menuItems']); ?>

    <h3>Удалить меню</h3><br>
    <form action="" method="post">

        <div class="form-group">

            <label for="title">Заголовок</label>
            <select name="title" id="" class="form-control">
                <option value="" disabled selected>Не выбирать, если хотите удалить только подзаголовок!</option>
                <option value="<?php echo $menuItems['title'] ?>"><?php echo $menuItems['title'] ?></option>
            </select>

            <label for="title">Подзаголовок</label>
            <select name="subtitle" id="" class="form-control">

                <?php foreach ($menuItems['subtitle'] as $items) : ?>
                    <option value="<?php echo $items ?>"><?php echo $items ?></option>
                <?php endforeach; ?>

            </select>
            <br>
            <input type="submit" class="btn btn-success" value="Удалить">
        </div>
    </form>

<?php } else {
    echo '<h1>Нет созданых меню.</h1>';
} ?>
