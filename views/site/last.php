<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
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

<?php debug($products_all); ?>
