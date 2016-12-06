<h2>Новости категории <span style="color: white">аналитика</span>.</h2>
<?php

foreach ($data['analytik'] as $analytik) {
    echo '<p ><a href="/item/index/' . $analytik['id'] . '/">' . $analytik['title'] . '</a></p>';
}
?>
<div><?php echo $data['pagination']->get(); ?></div>