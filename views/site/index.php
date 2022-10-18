<?php
    use yii\helpers\Url;
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
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form id="search-everything" class="au-form-icon--sm" action="<?= \yii\helpers\Url::to(['site/search']) ?>" method="get" style="display: flex;">
                            <div class="col-sm-6">
                                <input class="au-input--w300 au-input--style2" type="text" placeholder="Search everything..." name="q" value="<?= $q ?>">
                            </div>
                            <div class="col-sm-6">
                                <select id="select-out_stock" name="select"  class="form-control au-input--w300 au-input--style2" name="stock" style="min-height: 45px;">
                                    <option value=""> Stock </option>
                                    <option value="null" <?php if($select === 'null'): ?> selected <?php endif; ?>> Out stock </option>
                                    <option value="1" <?php if($select === '1'): ?> selected <?php endif; ?>> In stock </option>

                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WELCOME-->
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4">Welcome back
                    <span><?= Yii::$app->user->identity->username ?>!</span>
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<!-- END WELCOME-->

<section class="statistic statistic2">
    <button type="button" class="btn btn-outline-secondary btn-sm" style="float: right;" onclick="location.href='/site/update/'">
        <i class="fa fa-lightbulb-o"></i>&nbsp; Update</button>
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"> <?php echo $products->value; ?></h2>
                    <span class="desc">Products </span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number"><?php echo $today->value; ?></h2>
                    <span class="desc">upgrade this day</span>
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number"><?php echo count($users); ?></h2>
                    <span class="desc">users</span>
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number"><?php echo $out_stock->value; ?></h2>
                    <span class="desc">out of stock</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
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
                <h3 class="title-5 m-b-35">last updates</h3>
                <div class="table-responsive table-responsive-data2">

                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>SKU</th>
                            <th>Manufacture</th>
                            <th>Units</th>
                            <th>Per</th>
                            <th>Price</th>
                            <th>Updated At</th>
                            <th>In stock</th>
                            <th>Seller</th>
                        </tr>
                        </thead>
                        <?php if(!empty($products_all)) : ?>
                            <tbody>
                            <?php foreach ($products_all as $product) : ?>
                                <tr class="tr-shadow find-gmi-updates" data-value="<?= $product->sku ?>">
                                    <td><?= $product->id ?></td>
                                    <td><img loading="lazy" src="<?= $product->image ?>" alt="" width="50" height="70"></td>
                                    <td><?= $product->title ?></td>
                                    <td><?= $product->sku ?></td>
                                    <td><?= $product->article ?></td>
                                    <td><?= $product->units ?></td>
                                    <td><?= $product->per ?></td>
                                    <td>$<?= $product->price ?></td>
                                    <td>
                                        <?php echo Yii::$app->formatter->asDatetime($product->updated_at, 'short'); ?>
                                    </td>
                                    <td><?php if($product->instock === null) : ?> <span style="color:red;">out</span> <?php else : ?> <span style="color:green;">in</span> <?php endif; ?></td>
                                    <td><?= $product->seller ?></td>
                                </tr>
                                <?php $updates = $product->updates; ?>
                                <?php foreach ($updates as $item) : ?>
                                    <tr class="spacer tr-shadow-hidden disabled disabled-<?= $item->sku_product ?>">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>$<?= $item->price ?></td>
                                        <td colspan="2"> <?php echo Yii::$app->formatter->asDatetime($item->update_at, 'short'); ?></td>

                                    </tr>

                                <?php endforeach; ?>
                                <tr class="spacer"></tr>

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