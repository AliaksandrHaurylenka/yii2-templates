<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bottle".
 *
 * @property integer $id
 * @property string $type
 * @property string $venchik
 * @property string $venchik_en
 * @property integer $volume
 * @property integer $number
 * @property double $height
 * @property string $dev_1
 * @property double $diameter
 * @property string $dev_2
 * @property string $name_1
 * @property string $name_2
 * @property integer $full_naliv
 * @property string $dev_naliv
 * @property integer $massa
 * @property string $dev_massa
 * @property string $status
 */
class Bottle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grid_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'venchik', 'venchik_en', 'height', 'dev_1', 'diameter', 'dev_2', 'name_1', 'name_2', 'dev_naliv', 'dev_massa', 'status'], 'required'],
            [['volume', 'number', 'full_naliv', 'massa'], 'integer'],
            [['height', 'diameter'], 'number'],
            [['type', 'dev_1', 'dev_2', 'dev_naliv', 'dev_massa', 'status'], 'string', 'max' => 5],
            [['venchik', 'venchik_en'], 'string', 'max' => 10],
            [['name_1', 'name_2'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'venchik' => 'Венчик',
            'venchik_en' => 'Venchik En',
            'volume' => 'Объем',
            'number' => 'Порядковый номер',
            'height' => 'Высота',
            'dev_1' => 'Dev 1',
            'diameter' => 'Диаметр корпуса',
            'dev_2' => 'Dev 2',
            'name_1' => 'Имя',
            'name_2' => 'Name 2',
            'full_naliv' => 'Full Naliv',
            'dev_naliv' => 'Dev Naliv',
            'massa' => 'Massa',
            'dev_massa' => 'Dev Massa',
            'status' => 'Новинки',
        ];
    }

    /**
     * main NEW BOTTLE
     */
     public static function getNew(){
        $newBottle = self::find()
            ->asArray()//вывести массивом
            ->where(['status' => 'new'])//условие по столбцу 'status' со значением 'new'
            ->all();

        return $newBottle;
     }

    /**
     * main bottle-carousel
     */
    public static function getBottle(){
        $bottle = self::find()
            ->asArray()
            ->where(['status' => 'old'])
            ->all();

        return $bottle;
    }


    /**
     * menu BOTTLE //С архивом изделий
     */
    //public static function getMenuBottle(){
    public static function getMenuBottle($venchik_en, $status){
        $menuBottle = self::find()
            ->asArray()
            //равносильно 'venchik_en' = $venchik_en  AND  'status' => $status
           /* ->where([
                'venchik_en' => $venchik_en,
                'status' => $status
            ])*/

            //работает как и предыдущее
            ->where(['venchik_en' => $venchik_en])
            ->andWhere(['status' => $status])

            ->orderBy('number ASC')
            ->all();

        return $menuBottle;
    }







}
