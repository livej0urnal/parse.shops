<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>
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
                            <th>Last Updates</th>
                        </tr>
                        </thead>
                        <?php if(!empty($products)) : ?>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr class="tr-shadow">
                                    <td><img src="<?= $product->image ?>" alt="" width="50" height="70"></td>
                                    <td><?= $product->title ?></td>
                                    <td><?= $product->sku ?></td>
                                    <td><?= $product->article ?></td>
                                    <td><?= $product->units ?></td>
                                    <td><?= $product->per ?></td>
                                    <td><?= $product->price ?></td>
                                    <td>
                                        <?php
                                            $last_update = \app\models\GmiUpdates::find()->where(['sku_product' => $product->sku])->max('update_at');;

                                        ?>
                                        <?= Yii::$app->formatter->asDatetime($last_update->update_at, 'short') ?>
                                    </td>
                                </tr>
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
