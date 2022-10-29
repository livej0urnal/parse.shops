<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use dosamigos\chartjs\ChartJs;
    use yii\bootstrap5\Modal;
    use yii\widgets\LinkPager;
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

                <ul class="nav nav-tabs updates-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/index']) ?>">Alexmeat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/gmi', 'seller' => 'Gmi']) ?>">Gmi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/megafood', 'seller' => 'Megafood']) ?>">Megafood</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/euphoria', 'seller' => 'Euphoria']) ?>">Euphoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/baltic', 'seller' => 'Baltic']) ?>">Baltic</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/redoctober', 'seller' => 'Redoctober']) ?>">Redoctober</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/grantefoods', 'seller' => 'GranteFoods']) ?>">GranteFoods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/lea', 'seller' => 'Lea']) ?>">Lea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/mamta', 'seller' => 'Mamta']) ?>">Mamta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/three', 'seller' => 'Three']) ?>">Three</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/tamani', 'seller' => 'Tamani']) ?>">Tamani</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/psv', 'seller' => 'Psv']) ?>">Psv</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/zenith', 'seller' => 'Zenith']) ?>">Zenith</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/royal', 'seller' => 'Royal']) ?>">Royal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/sakhalin', 'seller' => 'Sakhalin']) ?>">Sakhalin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/stradiva', 'seller' => 'Stradiva']) ?>">Stradiva</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/zakuson', 'seller' => 'Zakuson']) ?>">Zakuson</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/natars', 'seller' => 'Natars']) ?>">Natars</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/eic', 'seller' => 'Eic']) ?>">Eic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['updates/leader', 'seller' => 'Leader']) ?>">Leader</a>
                    </li>
                </ul>
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
                            <th></th>
                        </tr>
                        </thead>
                        <?php if (!empty($products)) : ?>
                            <tbody>
                            <?php foreach ($products as $product) : ?>
                                <?php $updates = $product->updates; ?>
                                <?php
                                $last_update = null;
                                foreach ($updates as $single) {
                                    if ($single->price != $product->price) {
                                        $last_update = $single;
                                    }
                                }
                                ?>
                                <tr class="tr-shadow find-product-updates <?php if (!empty($last_update)) : ?> <?php if($last_update->price > $product->price) : ?> bg-success <?php else : ?> bg-danger<?php endif; ?><?php else: ?> disabled <?php endif; ?>"
                                    data-value="<?= $product->sku ?>" data-seller="<?= $product->seller ?>">
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
                                    <td>
                                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#modal">
                                            Medium
                                        </button>
                                    </td>
                                </tr>
                                <?php if(!empty($last_update)) : ?>
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
<div class="modal fade show" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                    zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                    resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                    genus Equus, along with other living equids.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>