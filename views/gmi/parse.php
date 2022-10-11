
<?php
    $base_html = 'https://gmi-trading.itemcatalog.biz/PriceCatalog/ItemsByCategory/?categoryCode=ALL_ITEMS&selectType=CATEG&page=';
    $i = 1;
    $gmi_html = $base_html . $i;
    $htmlgmi = file_get_html($gmi_html);
    $articles = $htmlgmi->find('article');
    $q = 1;
?>
<?php if(count($articles) > 1) : ?>
    <?php  foreach ($htmlgmi->find('article') as $product) :?>
        <tr>
            <td><?= $product->image = $product->find('img.catalog-img ', 0)->getAttribute('src'); ?></td>
            <br>
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

        <?php echo $q; ?>
        <br>

        <?php $q = $q + 1; ?>
    <?php  endforeach; ?>

    <?php if(count($articles) ===  $q) { $i = $i + 1; $q = 1;} ?>
<?php endif; ?>

