<h1>Новости категории <?php foreach ($data['categories'] as $category) {
        if ($category['id'] == $data['categoryId']) {
            echo "<a href='/categories/page/{$category['id']}/page-1' style='color: white'>{$category['title']}</a>";
            break;
        }
    } ?></h1>


    <?php
    foreach ($data['list'] as $item) {
        echo '<p><a href="/item/index/' . $item['id'] . '">' . $item['title'] . '</a></p>';
    } ?>

<div><?php echo $data['pagination']->get() ?></div>