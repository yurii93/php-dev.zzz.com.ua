<h3>Комментарии пользователя под ником <b style="color: white"><?php echo $data['comments'][0]['user'] ?></b>.</h3>


<div style="color: yellow">

<?php
foreach ($data['comments'] as $comment) {

    echo '<hr><p>' . $comment['content'] . '</p>';
}
?>

</div>

<div><?php echo $data['pagination']->get() ?></div>