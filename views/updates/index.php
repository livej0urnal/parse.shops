<?php
use yii\helpers\Url;
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use yii\bootstrap5\Modal;
use yii\widgets\LinkPager;
use coderius\lightbox2\Lightbox2;
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
                                <li class="list-inline-item"><?= Html::encode($this->title) ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form id="search-everything" class="au-form-icon--sm" action="<?= \yii\helpers\Url::to(['site/search']) ?>" method="get" style="display: flex;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input id="search-input" class="au-input--style2" type="text" placeholder="Search everything..." name="q" value="<?= $input ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <select id="select-out_stock" name="select"  class="form-control au-input--style2" name="stock" style="min-height: 45px;">
                                            <option value=""> Stock </option>
                                            <option value="null" > Out stock </option>
                                            <option value="1" > In stock </option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="seller-search" name="seller" multiple="multiple" class="form-control au-input--style2" name="stock" style="min-height: 45px;">
                                            <option value="Alexmeat"> Alexmeat </option>
                                            <option value="Baltic" > Baltic </option>
                                            <option value="EIC" > EIC </option>
                                            <option value="Euphoria" > Euphoria </option>
                                            <option value="Gmi" > Gmi </option>
                                            <option value="Grantefoods" > Grantefoods </option>
                                            <option value="Leader" > Leader </option>
                                            <option value="Lea" > Lea </option>
                                            <option value="Mamta" > Mamta </option>
                                            <option value="MegaFood" > MegaFood </option>
                                            <option value="Natars" > Natars </option>
                                            <option value="Psv" > Psv </option>
                                            <option value="RedOctober" > RedOctober </option>
                                            <option value="Royal" > Royal </option>
                                            <option value="Sakhalin" >Sakhalin</option>
                                            <option value="Stradiva" >Stradiva</option>
                                            <option value="Tamani" >Tamani</option>
                                            <option value="Three" >Three</option>
                                            <option value="Zakuson" >Zakuson</option>
                                            <option value="Zenith" >Zenith</option>

                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="search-success" class="btn btn-outline-success" style="float: right;margin: 10px;min-width: 20%;">Search</button>
                                    </div>
                                </div>

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
                <?= coderius\lightbox2\Lightbox2::widget([
                    'clientOptions' => [
                        'resizeDuration' => 200,
                        'wrapAround' => true,

                    ]
                ]); ?>
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
                        <?php if (!empty($products)) : ?>
                            <tbody>
                            <?php foreach ($products as $product) : ?>
                                <?php $last_update = $product->last; ?>
                                    <?php if(!empty($last_update)) : ?>
                                        <?php if($product->price != $last_update->price ) : ?>
                                     <tr class="tr-shadow find-gmi-updates <?php if (!empty($last_update)) : ?> <?php if ($last_update->price > $product->price) : ?> bg-success <?php elseif($last_update->price < $product->price) : ?> bg-danger <?php else:  ?> disabled<?php endif; ?><?php endif; ?>"
                                        data-value="<?= $product->sku ?>" data-seller="<?= $product->seller ?>">
                                        <td>
                                            <a href="<?= Yii::getAlias($product->image); ?>" data-lightbox="roadtrip" >
                                                <!-- Thumbnail picture -->
                                                <img loading="lazy" class="img-product loupe-image"  src="<?= $product->image ?>" alt=""
                                                     width="100" height="50">
                                            </a>
                                        </td>
                                        <td><?= $product->title ?></td>
                                        <td><?= $product->sku ?></td>
                                        <td><?= $product->article ?></td>
                                        <td><?= $product->units ?></td>
                                        <td><?= $product->per ?></td>
                                        <td>$<?= $product->price ?>
                                            <?php if (!empty($last_update) and $product->price != 0) : ?>
                                                <?php if($last_update->price != $product->price) : ?>
                                                    <br>
                                                    <span
                                                            class="mark title--sbold"
                                                            style="color: red">
                                                    <?php echo round($product->price - $last_update->price, 2);?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
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
                                                <td colspan="2">
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
                                            <?php
                                            $dates = [];
                                            $prices = [];
                                            ?>
                                        <?php endif; ?>
                                        <tr class="spacer"></tr>
                                    <?php endif; ?>
                                    <tr class="spacer"></tr>
                                <?php endif; ?>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        <?php else: ?>
                            <h4>Empty</h4>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>