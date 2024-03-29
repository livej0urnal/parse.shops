<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use dosamigos\chartjs\ChartJs;
?>

<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="col-md-6">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?= Url::home() ?>">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Last Updates</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form id="search-everything" class="au-form-icon--sm"
                              action="<?= \yii\helpers\Url::to(['site/search']) ?>" method="get" style="display: flex;">
                            <div class="col-sm-6">
                                <input class="au-input--w300 au-input--style2" type="text"
                                       placeholder="Search everything..." name="q" value="<?= $q ?>">
                            </div>
                            <div class="col-sm-6">
                                <select id="select-out_stock" name="select"
                                        class="form-control au-input--w300 au-input--style2" name="stock"
                                        style="min-height: 45px;">
                                    <option value=""> Stock</option>
                                    <option value="null" <?php if ($select === 'null'): ?> selected <?php endif; ?>> Out
                                        stock
                                    </option>
                                    <option value="1" <?php if ($select === '1'): ?> selected <?php endif; ?>> In
                                        stock
                                    </option>

                                </select>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-t-20">
    <div class="container">
        <div class="row">
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
                            <th>Price</th>
                            <th>In stock</th>
                            <th>Seller</th>
                        </tr>
                        </thead>
                        <?php if (!empty($products_all)) : ?>
                            <tbody>
                            <?php foreach ($products_all as $product) : ?>
                                <?php $updates = $product->updates; ?>
                                <?php
                                $last_update = null;
                                foreach ($updates as $single) {
                                    if ($single->price != $product->price) {
                                        $last_update = $single;
                                    }
                                }
                                ?>
                                <tr class="tr-shadow find-gmi-updates <?php if (!empty($last_update)) : ?> <?php if($last_update->price > $product->price) : ?> bg-success <?php else : ?> bg-danger<?php endif; ?><?php else: ?> disabled <?php endif; ?>"
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


                                <?php if(!empty($last_update)) : ?>
                                    <?php $updates = $product->updates; ?>
                                    <?php if (count($updates) > 1) : ?>
                                        <?php
                                        foreach ($updates as $item) {
                                            $dates[] = Yii::$app->formatter->asDate($item['update_at'], 'php:m-d');
                                            $prices[] = $item['price'];
                                        }

                                        ?>
                                        <tr class="spacer tr-shadow-hidden disabled disabled-<?= $product->sku ?>">
                                            <td colspan="9">
                                                <?= ChartJs::widget([
                                                    'type' => 'bar',
                                                    'data' => [
                                                        'labels' => $dates,
                                                        'datasets' => [
                                                            [
                                                                'backgroundColor' => "rgba(255, 99, 132, 0.2)",
                                                                'borderColor' => "rgba(255, 99, 132, 0.2)",
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
                                        <?php $dates = [];
                                        $prices = []; ?>
                                    <?php endif; ?>
                                    <tr class="spacer"></tr>
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
