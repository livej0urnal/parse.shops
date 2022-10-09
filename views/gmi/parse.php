<?php

$gmi = 'https://gmi-trading.itemcatalog.biz/PriceCatalog/ItemsByCategory/?categoryCode=ALL_ITEMS&selectType=CATEG&page=1';
$htmlgmi = file_get_html($gmi);
?>

<?php  foreach ($htmlgmi->find('div.price-catalog-product-item') as $product) :?>
    <tr>
        <td><?= $product->title = $product->find('div.product-title' , 0)->innertext; ?></td>

    </tr>
<?php endforeach; ?>
