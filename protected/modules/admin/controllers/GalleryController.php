<?php

class GalleryController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
    {
        return array(

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','index','update','insertfile','del','upload','updfile','create','delete','view', 'switchvisible'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$gallery = Gallery::model()->findAll();
        $model=new Gallery;
		$this->render('index',array(
			'gallery'=>$gallery,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gallery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}












    public function actionUpload()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = Yii::app()->params['UPLOAD_DIR'] . '/';
        $random_dir = date("m_d_Y") . '_' . md5(time());
        $folder .= $random_dir . '/';
        if( !mkdir( Yii::app()->params['UFP'] . DIRECTORY_SEPARATOR . $random_dir, 0777 ) )
            echo json_encode( array("result" => "Can`t create folder") ) ;

        $allowedExtensions = array("jpg", "png", "jpeg", "gif");
        $sizeLimit = 10 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);


        $gallery = new Gallery();
        $gallery->name = $result['filename'];
        $gallery->path = $random_dir ;
        $gallery->is_slider = 0 ;
        $gallery->is_show = 0 ;
        $gallery->save();

        $result['path'] = $gallery->path;
        $result['name'] = $gallery->name;
        $result['is_slider'] = $gallery->is_slider;
        $result['id'] = $gallery->id;

        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        $fileSize=filesize($folder.$result['filename']);
        $fileName=$result['filename'];

        echo $return;
    }


    function actionDel(){

        if( !$_POST['id'] )
            echo json_encode( array('result' => false) ) ;

        $id = $_POST['id'] ;

        // Удаляем из таблицы документов
        $docModel = new Gallery ;
        $del = $docModel->deleteByPk($id) ;

        echo json_encode( array('result' => $del, ) ) ;
    }


    function actionUpdfile(){

        if( $_POST['id'] ){
            $id = $_POST['id'] ;
            $fileName = $_POST['fileName'] ;
//            $description = $_POST['description'] ;

            $docModel = new Gallery ;
            $update = $docModel->updateByPk($id, array('title'=>$fileName) );

            echo json_encode( array('result' => $update) ) ;
        }
    }


    public function actionSwitchvisible()
    {
        if(
            (!isset($_POST['reason']) || !isset($_POST['id'])) ||
            ($_POST['reason'] !== 'is_show' && $_POST['reason'] !== 'is_slider') ){
                echo json_encode( array('result' => false)  ) ;
        }else{
            $id = $_POST['id'];
            $reason = $_POST['reason'];
            $gallery = Gallery::model()->findByPk($id);
            $gallery[$reason] = $gallery[$reason] == 1?0:1;
            $gallery->save();
            echo json_encode( array(
                'result' => true,
                'reason' => $_POST['reason'],
                'id' => $_POST['id'],
                'isShown' => $gallery[$reason]
            ) ) ;
        }

    }




    function uploadPicture(){

    }

    function createMini(){

    }

}
