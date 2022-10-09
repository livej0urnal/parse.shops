<?php

$gmi = 'https://gmi-trading.itemcatalog.biz/PriceCatalog/ItemsByCategory/?categoryCode=ALL_ITEMS&selectType=CATEG&page=13';
$htmlgmi = file_get_html($gmi);
?>

<?php  foreach ($htmlgmi->find('article') as $product) :?>
    <tr>
        <td><?= $product->title = $product->find('div.product-title' , 0)->innertext; ?></td>
        <br>
        <td><?= $product->sku = $product->find('div.product-description', 0)->innertext; ?></td>
        <br>
        <td><?= $product->sku = $product->hasAttribute('style', 'padding-right: 10px; font-weight: bold;color: #575757')->innertext; ?></td>


    </tr>
<?php endforeach; ?>
