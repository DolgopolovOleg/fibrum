<?php

/**
 * This is the model class for table "text_blocks".
 *
 * The followings are the available columns in table 'text_blocks':
 * @property integer $id
 * @property string $title
 * @property string $text_ru
 * @property string $text_en
 * @property integer $android_enabled
 * @property integer $ios_enabled
 * @property integer $desktop_enabled
 */
class TextBlocks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'text_blocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title', 'required'),
			array('android_enabled, ios_enabled, desktop_enabled', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('text_ru, text_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text_ru, text_en, android_enabled, ios_enabled, desktop_enabled', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'text_ru' => 'Russian variant',
			'text_en' => 'English variant',
			'android_enabled' => 'Show on Android',
			'ios_enabled' => 'Show on IOs',
			'desktop_enabled' => 'Show on Desktop',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text_ru',$this->text_ru,true);
		$criteria->compare('text_en',$this->text_en,true);
		$criteria->compare('android_enabled',$this->android_enabled);
		$criteria->compare('ios_enabled',$this->ios_enabled);
		$criteria->compare('desktop_enabled',$this->desktop_enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TextBlocks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getLocaleTextById($id){
        $data = $this->model()->findAllByPk($id);
        return Yii::app()->language == 'ru'?$data[0]['text_ru'] : $data[0]['text_en'];
    }

    public function getAny(){
        return "asdf";
    }

    public function getLocaleText(){
        return Yii::app()->language == 'ru' ? $this['text_ru'] : $this['text_en'];
    }

    public function checkDeviceShow(){
        $os = Yii::app()->params['OS'];
        if( ($os == 'desktop' && $this->desktop_enabled) ||
            ($os == 'android' && $this->android_enabled) ||
            ($os == 'ios' && $this->ios_enabled) )
            return true;
        return false;
    }

}
