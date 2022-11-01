<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <!-- Required meta tags-->
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>
<?php $this->beginBody() ?>
<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                        <li class="has-sub">
                            <a href="<?= \yii\helpers\Url::home() ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <span class="bot-line"></span>
                            </a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['updates/index']) ?>">Last Updates</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>Package #1</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['shop/category', 'seller' => 'Gmi']) ?>">GMI - Tranding</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['shop/category', 'seller' => 'Megafood']) ?>">Megafood</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['shop/category', 'seller' => 'Euphoria']) ?>">Euphoria </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['shop/category', 'seller' => 'Baltic']) ?>">Baltic</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>Package #2</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['redoctober/index']) ?>">Redoctober</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['grantefoods/index']) ?>">Grantefoods</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['lea/index']) ?>">Lea </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['mamta/index']) ?>">Mamta</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>Package #3</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['three/index']) ?>">Three</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['tamani/index']) ?>">Tamani</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['psv/index']) ?>">psv</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['alex/index']) ?>">Alexmeat</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>Package #4</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['zenith/index']) ?>">zenith</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['royal/index']) ?>">Royal</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['sakhalin/index']) ?>">Sakhalin</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['stradiva/index']) ?>">Stradiva</a>
                                </li>


                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>Package #5</a>
                            <ul class="header3-sub-list list-unstyled">


                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['zakuson/index']) ?>">Zakuson</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['natars/index']) ?>">Natars</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['eic/index']) ?>">Eic</a>
                                </li>

                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['leader/index']) ?>">Leader</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['shops/index']) ?>"><i class="far fa-check-square"></i>Shops</a>
                        </li>

                    </ul>
                </div>
                <div class="header__tool">
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="/images/icon/avatar-01.jpg" alt="<?= Yii::$app->user->identity->username ?>" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?= Yii::$app->user->identity->username ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <span class="email"><?= Yii::$app->user->identity->username ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="<?= \yii\helpers\Url::to(['/admin']) ?>">
                                            <i class="zmdi zmdi-account"></i>Accounts</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="<?= \yii\helpers\Url::to(['site/logout']) ?>">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->

    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="<?= \yii\helpers\Url::home() ?>">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['updates/index']) ?>">Last Updates</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['gmi/index']) ?>">GMI - Tranding</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['megafood/index']) ?>">Megafood</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['euphoria/index']) ?>">Euphoria </a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['baltic/index']) ?>">Baltic</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['redoctober/index']) ?>">Redoctober</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['grantefoods/index']) ?>">Grantefoods</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['lea/index']) ?>">Lea </a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['mamta/index']) ?>">Mamta</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['three/index']) ?>">Three</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['tamani/index']) ?>">Tamani</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['psv/index']) ?>">psv</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['alex/index']) ?>">Alexmeat</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['zenith/index']) ?>">zenith</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['royal/index']) ?>">Royal</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['sakhalin/index']) ?>">Sakhalin</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['stradiva/index']) ?>">Stradiva</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['zakuson/index']) ?>">Zakuson</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['natars/index']) ?>">Natars</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['eic/index']) ?>">Eic</a>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['leader/index']) ?>">Leader</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
        <div class="header__tool">
            <div class="account-wrap">
                <div class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image">
                        <img src="/images/icon/avatar-01.jpg" alt="John Doe" />
                    </div>
                    <div class="content">
                        <a class="js-acc-btn" href="#"><?= Yii::$app->user->identity->username ?></a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                            <div class="image">
                                <a href="#">
                                    <img src="/images/icon/avatar-01.jpg" alt="John Doe" />
                                </a>
                            </div>
                            <div class="content">
                                <span class="email"><?= Yii::$app->user->identity->username ?></span>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="/admin">
                                    <i class="zmdi zmdi-account"></i>Accounts</a>
                            </div>
                        </div>
                        <div class="account-dropdown__footer">
                            <a href="/site/logout">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER MOBILE -->

    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">
        <?= $content ?>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

</div>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<?php $this->endBody() ?>
</body>


</html>
<!-- end document-->
<?php $this->endPage() ?>
