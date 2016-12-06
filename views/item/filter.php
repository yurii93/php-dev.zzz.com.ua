<h2>Результаты поиска:</h2>

<?php

foreach ($data['item'] as $item) {
    echo '<p ><a href="/item/index/' . $item['id'] . '/">' . $item['title'] . '</a></p>';
}
?>