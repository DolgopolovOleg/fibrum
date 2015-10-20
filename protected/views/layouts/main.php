<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

<!--    fibrum-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" media="all"/>
    <link rel="stylesheet" id="responsive-slider-css" href="css/responsive-slider.css" type="text/css" media="all">

    <script type="text/javascript">
        /* <![CDATA[ */
        var slider = {"effect":"slide","delay":"7000","duration":"600","start":"1"};
        /* ]]> */
    </script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsive-slider.js"></script>


    <script>(function() {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(['addPixelId', '925962924099773']);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=925962924099773&amp;ev=PixelInitialized" /></noscript>
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=S6bxMLQFvChQ/QRGrQiDw3XjdLAS290HlWySbBCtKfikdDNrvJc/JhA4ATN5kinPFk*rFQYVT3hl3v1GuLybfXM3OZwviVspcfo3ZnVFOJ/AM0dzAYgp2pnXAAFOKx0xCanRyL8jRRmgwRLm0I81f01PDyljYEWcDf201exjKeY-';</script>

    <!--    fibrum-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42850737-6', 'auto');
    ga('send', 'pageview');

</script>





<div>
    Master branch content
</div>








<nav role="navigation" class="navbar navbar-default" id="gt-header">
    <div class="container">

        <div class="navbar-header">
            <button data-target="#header-navigation" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="" class="navbar-brand">
                <img alt="FIBRUM" src="http://fibrum.com/images/modernus-logo.png">
            </a>
        </div>


        <div id="header-navigation" class="collapse navbar-collapse header-navigation">

<!--            <ul class="nav navbar-nav navbar-right" id="main-menu">-->
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=> Yii::t('blog', 'aboutProject'), 'url'=>array('/index')),
                        array('label'=> Yii::t('blog', 'apps'),         'url'=>array('/apps')),
                        array('label'=> Yii::t('blog', 'gallery'),      'url'=>array('/gallery')),
                        array('label'=> Yii::t('blog', 'video'),        'url'=>array('/video')),
                        array('label'=> Yii::t('blog', 'press'),        'url'=>array('/press')),
                        array('label'=> Yii::t('blog', 'shop'),         'url'=>array('/shop')),
                        array('label'=> Yii::t('blog', 'sdk'),          'url'=>array('/sdk')),
                        array('label'=> Yii::t('blog', 'contacts'),     'url'=>array('/contacts')),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                    'htmlOptions' => array('class'=>'nav navbar-nav navbar-right'),
                    'id' => 'main-menu'
                )); ?>

            <?php $this->widget('LanguageSwitcherWidget'); ?>

            <div class="pull-right"></div>

        </div>

    </div>
</nav>
<div class="floater"></div>

<?php echo $content; ?>



<div class="gt-section gt-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Copyright 2015 &copy; FIBRUM Limited. All Rights Reserved www.fibrum.com
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/smoothscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jpreloader.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/contact-form.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/imagesloaded.pkgd.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sitescript.js"></script>

</body>
</html>
