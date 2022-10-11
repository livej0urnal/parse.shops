<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="au-breadcrumb-content">
                    <form class="au-form-icon--sm" action="<?= \yii\helpers\Url::to(['gmi/search']) ?>" method="get" >
                        <input class="au-input--w300 au-input--style2" name="q" type="text" placeholder="Search for title or sku" value="<?= $q ?>">
                        <button class="au-btn--submit2" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>

                    <div class="col-md-8">
                        <select name="selectLg" id="selectLg" class="form-control form-control-lg">
                            <option value="0">Select Manufacture</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>

                </div>

            </div>
            <div class="col-md-12">

                <div class="table-responsive table-responsive-data2">
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
                            <th>Last Update</th>
                        </tr>
                        </thead>
                        <?php if(!empty($products)) : ?>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr class="tr-shadow">
                                    <td><?= $product->id ?></td>
                                    <td><img src="<?= $product->image ?>" alt="" width="50" height="70"></td>
                                    <td><?= $product->title ?></td>
                                    <td><?= $product->sku ?></td>
                                    <td><?= $product->article ?></td>
                                    <td><?= $product->units ?></td>
                                    <td><?= $product->per ?></td>
                                    <td><?= $product->price ?></td>
                                    <td>
                                        <?php echo Yii::$app->formatter->asDatetime($product->updated_at, 'short'); ?>
                                    </td>
                                </tr>
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
