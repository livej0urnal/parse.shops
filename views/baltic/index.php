<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use dosamigos\chartjs\ChartJs;

?>
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4">Seller:
                    <span><?= Html::encode($this->title) ?></span>
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <form class="au-form-icon--sm" action="<?= \yii\helpers\Url::to(['baltic/search']) ?>" method="get">
                        <input class="au-input--w300 au-input--style2" name="q" type="text"
                               placeholder="Search for title or sku/manufacture" value="<?= $q ?>">
                        <button class="au-btn--submit2" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <?php if (!empty($manufactures)) : ?>
                        <div class="col-md-4">
                            <select name="select" id="select-manufacture" class="form-control" data-value="baltic">
                                <option value="0"><?php if ($q): ?> <?= $q ?><?php else : ?> Select Manufacture <?php endif; ?></option>
                                <?php foreach ($manufactures as $item) : ?>
                                    <option <?php if ($q == $item->article): ?> selected <?php endif; ?>
                                            value="<?= $item->article ?>"><?= $item->article ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-4">
                        <?php if (!empty($pages)) : ?>
                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" class="item-pagination">
                                    <?php echo LinkPager::widget([
                                        'pagination' => $pages,
                                        'options' => ['class' => 'pagination tab-paginations'],
                                        'linkOptions' => ['class' => 'page-link'],
                                    ]); ?>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
            <div class="col-md-12">

                <div class="table-responsive table-responsive-data2">

                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>SKU</th>
                            <th>Manufacture</th>
                            <th>Units</th>
                            <th>Per</th>
                            <th><?php echo $sort->link('price'); ?></th>
                            <th><?php echo $sort->link('instock'); ?></th>
                            <th>Seller</th>
                        </tr>
                        </thead>
                        <?php if (!empty($products)) : ?>
                            <tbody>
                            <?php foreach ($products as $product) : ?>
                                <?php $last_update = \app\models\BalticUpdates::find()->where(['sku_product' => $product->sku])->andWhere(['!=', 'price', $product->price])->andWhere(('update_at >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)'))->orderBy(['update_at' => SORT_DESC])->one(); ?>
                                <tr class="tr-shadow find-gmi-updates <?php if (!empty($last_update)) : ?> <?php if ($last_update->price > $product->price) : ?> bg-success <?php else : ?> bg-danger<?php endif; ?><?php endif; ?>"
                                    data-value="<?= $product->sku ?>">
                                    <td><img loading="lazy" class="img-product" src="<?= $product->image ?>" alt=""
                                             width="300" height="300"></td>
                                    <td><?= $product->title ?></td>
                                    <td><?= $product->sku ?></td>
                                    <td><?= $product->article ?></td>
                                    <td><?= $product->units ?></td>
                                    <td><?= $product->per ?></td>
                                    <td>$<?= $product->price ?> <?php if (!empty($last_update)) : ?><br><span
                                                class="mark title--sbold"
                                                style="color: red"><?php echo round($product->price - $last_update->price, 2); ?></span><?php endif; ?>
                                    </td>
                                    <td><?php if ($product->instock === null) : ?> <span
                                                style="color:red;">out</span> <?php else : ?> <span
                                                style="color:green;">in</span> <?php endif; ?></td>
                                    <td><?= $product->seller ?></td>
                                </tr>

                                <?php if (!empty($last_update)) : ?>
                                    <?php $updates = \app\models\BalticUpdates::find()->select(['price', 'update_at', 'sku_product'])->where(['sku_product' => $product->sku])->orderBy(['update_at' => SORT_ASC])->all(); ?>

                                    <?php if (count($updates) > 1) : ?>
                                        <?php
                                        foreach ($updates as $item) {
                                            $dates[] = Yii::$app->formatter->asDate($item->update_at, 'php:m-d');
                                            $prices[] = $item->price;
                                        }

                                        ?>
                                        <tr class="spacer tr-shadow-hidden disabled disabled-<?= $product->sku ?>">
                                            <td colspan="9">
                                                <?= ChartJs::widget([
                                                    'type' => 'line',
                                                    'data' => [
                                                        'labels' => $dates,
                                                        'datasets' => [
                                                            [
                                                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                                                'borderColor' => "rgba(179,181,198,1)",
                                                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                                                'pointBorderColor' => "#fff",
                                                                'pointHoverBackgroundColor' => "#fff",
                                                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                                                'data' => $prices,
                                                                'fill' => false,
                                                                'stepped' => true
                                                            ],

                                                        ]
                                                    ]
                                                ]);
                                                ?>
                                            </td>

                                        </tr>
                                        <tr class="spacer"></tr>
                                        <?php $dates = [];
                                        $prices = []; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <h4>Empty</h4>
                        <?php endif; ?>
                    </table>
                </div>
                <?php if (!empty($pages)) : ?>
                    <div class="demo-inline-spacing">
                        <!-- Basic Pagination -->
                        <nav aria-label="Page navigation" class="item-pagination">
                            <?php echo LinkPager::widget([
                                'pagination' => $pages,
                                'options' => ['class' => 'pagination tab-paginations'],
                                'linkOptions' => ['class' => 'page-link'],
                            ]); ?>
                        </nav>
                        <!--/ Basic Pagination -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
