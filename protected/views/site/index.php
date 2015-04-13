<?php

$this->pageTitle=Yii::app()->name;

if($androidText->checkDeviceShow())
    echo '<div>' . $androidText->getLocaleText() . '</div>';

if($desktopText->checkDeviceShow())
    echo '<div>' . $desktopText->getLocaleText() . '</div>';

if($iosText->checkDeviceShow())
    echo '<div>' . $iosText->getLocaleText() . '</div>';