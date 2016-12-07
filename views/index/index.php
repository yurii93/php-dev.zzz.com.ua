<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <?php foreach ($data['slider'] as $slide) { ?>

            <div class="item <?php if (!next($data['slider'])) echo 'active' ?>">
                <img src="<?php echo $slide['image'] ?>" width="500" height="300">
                <div class="carousel-caption">
                    <?php echo $slide['title'] ?>
                </div>
            </div>

        <?php } ?>

    </div>

    <!-- Controls -->

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<hr>
<h3>Поиск по новостям</h3>
<form action="/item/filter/" method="post">
    <div class="form-group">
        <span>Дата от:</span>
        <input type="date" class="form-control our-search" name="dateFrom" required>
        <span>Дата до:</span>
        <input type="date" class="form-control our-search" name="dateTo" required>
        <span>Теги:</span>
        <select size="2" multiple name="tags[]" class="form-control our-search" required>
            <?php foreach($data['tags'] as $tag) : ?>
            <option value="<?php echo $tag; ?>"><?php echo trim($tag, "\'"); ?></option>
            <?php endforeach; ?>
        </select>
        <span>Категории:</span>
        <select size="2" multiple name="category[]" class="form-control our-search" required>
            <?php foreach($data['categories'] as $category) : ?>
                <option value="<?php echo $category['title']; ?>"><?php echo $category['title']; ?></option>
            <?php endforeach; ?>
        </select>
		<br>
    <button type="submit" class="btn btn-success">Поиск</button>
    </div>
</form><hr>
<h2>Категории и новости</h2>
<h3><a href="/item/analytik/page-1" style="font-size: 30px; color: #FFD700">Аналитика</a></h3>

<?php
foreach ($data['analytik'] as $analytik) {
    echo '<p ><a href="/item/index/' . $analytik['id'] . '/">' . $analytik['title'] . '</a></p>';
}

?>


<?php

foreach ($data['categories'] as $category) {

    echo '<hr><h4>' . '<a style="font-size: 30px; color: #FFD700" href="/categories/page/'
        . $category['id'] . '/page-1">' . $category['title'] . '</a></h4>';

    foreach ($data['news'] as $news) {

        if ($category['id'] == $news['category_id']) {
            echo '<p><a href="/item/index/' . $news['id'] . '/">' . $news['title'] . '</a></p>';
        }
    }
    echo '</a>';
}
?>

<!--SLIDER-->

<!---->
<hr>
<div class="row">
    <div class="col-md-6">
<h3>Топ-5 комментаторов:</h3>
<?php foreach($data['top_commentators'] as $user) : ?>
    <a href="/comments/all/<?php echo $user['user'] ?>/page-1/"><p><b><?php echo $user['user'] ?>:</b> <span class="badge"><?php echo $user['quantity'] ?></span></p></a>
<?php endforeach; ?>
    </div>
    <div class="col-md-6">
<h3>Наиболее обсуждаемые темы <br> (за сегодня):</h3>
<?php if($data['top_news']) :?>
<?php foreach($data['top_news'] as $news) : ?>
    <a href="/item/index/<?php echo $news['id'] ?>"><p><b><?php echo $news['title'] ?></b> <span class="badge"><?php echo $news['quantity'] ?></span></p></a>
<?php endforeach; ?>
<?php else: ?>
<b style="color: chocolate;">Сегодня обсуждений не было</b>
<?php endif; ?>
    </div>
</div>

