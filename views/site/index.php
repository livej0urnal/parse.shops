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
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input id="search-input" class="au-input--style2" type="text" placeholder="Search everything..." name="q">
                                    </div>
                                    <div class="col-md-4">
                                        <select id="select-out_stock" name="select"  class="form-control au-input--style2" name="stock" style="min-height: 45px;">
                                            <option value=""> Stock </option>
                                            <option value="null" > Out stock </option>
                                            <option value="1" > In stock </option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="seller-search" name="seller" multiple="multiple"  class="form-control au-input--style2" name="stock" style="min-height: 45px;">
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
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"> <?php echo count($products); ?></h2>
                    <span class="desc">Products </span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number"><?php echo count($today) ?></h2>
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
                    <h2 class="number"><?php echo count($out_stock);; ?></h2>
                    <span class="desc">out of stock</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
