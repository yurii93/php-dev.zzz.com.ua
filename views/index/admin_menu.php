<h3>Добавить меню</h3><br>
<form action="" method="post">

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" id="title" name="title" value="" class="form-control" required>
    </div>


    <?php if (isset($_SESSION['submenu'])) {
        for ($i = 1; $i <= $_SESSION['submenu']; $i++) : ?>

            <div class="form-group">
                <label for="subtitle">Подзаголовок <?php echo $i ?></label>
                <input type="text" id="subtitle" name="subtitle[]" value="" class="form-control" required>
            </div>

        <?php endfor;
    } ?>


    <a href="/admin/index/submenu/"
       class="btn btn-primary"><?php if (isset($_SESSION['submenu']) && $_SESSION['submenu']) {
            echo 'Добавить еще один';
        } else {
            echo 'Добавить подзаголовок';
        } ?></a>

    <?php if (isset($_SESSION['submenu']) && $_SESSION['submenu']) : ?>
        <a href="/admin/index/deleteSubmenu/" class="btn btn-primary">Удалить один</a>
    <?php endif; ?>

    <input type="submit" class="btn btn-success" value="Добавить">
</form>