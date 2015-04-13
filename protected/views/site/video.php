<?php

$this->pageTitle=Yii::app()->name;

foreach($video as $item){ ?>
    <div>
        <iframe width="420" height="315" src="https://www.youtube.com/embed/<?=$item['path'];?>" frameborder="0" allowfullscreen></iframe>
    </div>
<?php } ?>