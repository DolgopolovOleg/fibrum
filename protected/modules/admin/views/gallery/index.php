<h1>Галерея: </h1>

<script id="entry-template" type="text/x-handlebars-template">
    <div class="gallery-item" item-id="{{id}}">
        <img src="/files/{{path}}/{{name}}" alt="{{name}}" style="width:150px;"/>
        <div class="option">
            <span onclick="deleteGallItem({{id}})" >Удалить</span>
        </div>
    </div>
</script>

<script>
    function deleteGalleryItem(file){
        console.log('Custom console - ', file);
        var source   = $("#entry-template").html();
        var template = Handlebars.compile(source);
        var context = {id: file['id'], path: file['path'], name: file['name']};
        var html    = template(context);
        $('.gallery-container').prepend(html);
    }

    function deleteGallItem(id){
        if(!confirm('Удалить объект?')) return;
        $.post(
            "/admin/gallery/del",
            {
                id: id
            },
            function(data){
                var item = $('div.gallery-item[item-id=' + id + ']');
                $(item).remove();
            }
        );
    }

    function switchVisible(reason, id){
        $.post(
            "/admin/gallery/switchvisible",
            {
                id: id,
                reason: reason
            },
            function(data){
                var jsonData = JSON.parse(data);
                if(jsonData['result'] == true && jsonData['reason'] == 'is_show'){
                    console.log(jsonData);
                    var item = $('div.gallery-item[item-id=' + id + ']');
                    $(item).remove();
                }
            }
        );
    }
</script>

<? $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            'action'=>Yii::app()->createUrl('admin/gallery/upload'),
            'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit'=>10*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>1024*1024/10,// minimum file size in bytes
            'onComplete'=>"js:function(id, fileName, responseJSON){ console.log(responseJSON); deleteGalleryItem(responseJSON) }",
            //'messages'=>array(
            //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
            //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
            //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
            //                  'emptyError'=>"{file} is empty, please select files again without it.",
            //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
            //                 ),
//            'showMessage'=>"js:function(message){ alert(message); }"
        )
    ));
?>

<div class="gallery-container">
    <?php
        foreach($gallery as $item){
            $is_show_style = $item['is_show'] ? '' : 'not-show' ;
            $is_shown = $item['is_show']?'checked':'';
            $is_slider = $item['is_slider']?'checked':'';
    ?>
        <div class="gallery-item" item-id="<?=$item['id'];?>">
            <img class="<?=$is_show_style;?>" src="/files/<?=$item['path'];?>/<?=$item['name'];?>" alt="<?=$item['name'];?>" style="width:150px;"/>
            <div class="option">
                <span onclick="deleteGallItem(<?=$item['id'];?>)">Удалить</span>
            </div>
            <div class="option">
                <label for="">Показывать: <?=$is_shown;?> </label>
                <input type="checkbox" name="is_show" value="true" <?=$is_shown;?> onclick="switchVisible('is_show', <?=$item['id'];?>)" />
            </div>
            <div class="option">
                <label for="">Показывать в слайдере:</label>
                <input type="checkbox" name="is_slider" value="true" <?=$is_slider;?> onclick="switchVisible('is_slider', <?=$item['id'];?>)" />
            </div>

        </div>
    <?php
        }
    ?>
</div>

