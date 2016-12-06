<h1>Редактировать комметарий</h1>

<form style="width: 500px;" action="" method="post">
    <label for="comment">Комметарий</label>
    <textarea id="comment" name="comment" cols="30" rows="10" class="form-control" required><?php echo $data['comment'][0]['content']; ?></textarea>
    <br>
    <input type="submit" class="btn btn-success" value="Изменить">
</form>
<br>