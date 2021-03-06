<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'post-form',
    'enableAjaxValidation' => FALSE,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
    <div style="display: none;">
        <?php
        echo $form->fileField($gallery,'forum_image',array('id'=>'forum_image',)); // image file select when clicks on upload photo
        ?>
    </div>
    <div class="row">
        <?php echo $form->textArea($model,'content',
            array('placeholder'=>"What's going on...!", // placeholder
                'class'=>'status-txt-area', // css style class
            ));
        ?>
    </div>
    <div>
        <a href="" onclick="return uploadImage();"><b class="photo">Upload Photo</b></a> <!-- Image link to select imag -->
        <?php echo CHtml::htmlButton('Post',array(
            'onclick'=>'javascript: send();', // on submit call JS send() function
            'id'=> 'post-submit-btn', // button id
            'class'=>'post_submit',
        ));
        ?>
    </div>
<?php $this->endWidget(); ?>