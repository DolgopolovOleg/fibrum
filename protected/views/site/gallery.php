<?php
$this->pageTitle=Yii::app()->name;
$filePath = Yii::app()->params['UPLOAD_DIR'] . '/';
?>

<?php
foreach($gallery as $item){
    $imgPath = $filePath . $item['path'] . DIRECTORY_SEPARATOR . $item['name'];
?>
    <img src="<?=$imgPath;?>" style="width: 200px"/>
<?php
}
?>

