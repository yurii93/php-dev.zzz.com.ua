<h3>Изменить цвет</h3>
<form action="" method="post">

    <div class="form-group">
        <h4>Цвет фона:</h4>
        <select name="background" class="form-control" required>

            <?php foreach ($data['background'] as $value => $title) : ?>

                <option value="<?php echo $value ?>"><?php echo $title ?></option>

            <?php endforeach; ?>

        </select>
    </div>
    <div class="form-group">
        <h4>Цвет шапки:</h4>
        <select name="header" class="form-control" required>

            <?php foreach ($data['header'] as $value => $title) : ?>

                <option value="<?php echo $value ?>"><?php echo $title ?></option>

            <?php endforeach; ?>

        </select>
    </div>
    <input type="submit" class="btn btn-success" value="Изменить">
</form>