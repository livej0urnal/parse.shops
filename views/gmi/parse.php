<?php

$gmi = 'https://gmi-trading.itemcatalog.biz/PriceCatalog/ItemsByCategory/?categoryCode=ALL_ITEMS&selectType=CATEG&page=1';
$htmlgmi = file_get_html($gmi);
?>

<?php
    $articles = $htmlgmi->find('article');
    echo count($articles);
?>

<?php  foreach ($htmlgmi->find('article') as $product) :?>
    <tr>
<!--        <td>--><?//= $product->image = $product->find('img.catalog-img ', 0)->getAttribute('src'); ?><!--</td>-->
<!--        <img src="--><?//= $product->image ?><!--" alt="">-->
<!--        <br>-->
        <td><?= $product->title = $product->find('div.product-title' , 0)->innertext; ?></td>
        <br>
        <td><?= $product->sku = $product->find('div.product-description', 0)->innertext; ?></td>
        <br>

        <td><?= $product->article = $product->find('div.product-description', 1)->next_sibling('div')->innertext; ?></td>
        <td><?= $product->units = $product->find('div.description', 0)->innertext; ?></td>
        <br>
        <td><?= $product->per = $product->find('div.description', 1)->innertext; ?></td>
        <br>
        <td><?= $product->price = $product->find('div.product-price', 0)->innertext; ?></td>
        <br><br>



    </tr>
<?php endforeach; ?>
