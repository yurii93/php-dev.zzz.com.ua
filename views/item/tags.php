<h3>Новости по тегу <span style="color: white"><?php echo $data['tag'] ?></span>.</h3>
    <?php foreach ($data['list'] as $item) : ?>
    <p><a href="/item/index/<?php echo $item['id'] ?>"><?php echo $item['title'] ?></a></p>
    <?php endforeach; ?>
<div><?php echo $data['pagination']->get() ?></div>