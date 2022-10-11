<?php
$new_link = 0;
for ($i = 0; $i < 20; $i = $i + 1) {
    $gmi_html = 'https://grantefoods.itemcatalog.biz/PriceCatalog/ItemsByCategory/?categoryCode=ALL_ITEMS&selectType=CATEG&page='. $i;
    $htmlgmi = file_get_html($gmi_html);
    $articles = $htmlgmi->find('article');

    if(count($articles) > 1) {
        $this_link = \app\models\Grantefoods::findOne(['links' => $gmi_html]);
        if(!$this_link) {
            $link = new \app\models\Grantefoods();
            $link->links = $gmi_html;
            $link->save();
            $new_link ++;
        }

    }
}

echo 'Найдено ссылок ' . $new_link;