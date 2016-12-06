<h3>Добавить рекламный блок</h3><br>
<form action="" method="post">
    <div class="form-group">
        <label for="title">Название продукта</label>
        <input type="text" name="title" value="" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Продавец</label>
        <input type="text" id="content" name="vendor" value="" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tags">Цена</label>
        <input type="number" id="tags" name="price" value="" class="form-control" required>
    </div>

    <div class="form-group">
        <b>Где отображать?</b>
    <div class="radio">
        <label>
            <input type="radio" name="number" id="optionsRadios1" value="1" required>
            Слева!
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="number" id="optionsRadios2" value="2" required>
            Справа!
        </label>
    </div>
    </div>
    <input type="submit" class="btn btn-success" value="Добавить">
</form>