<?php
namespace app\models;
//amespace frontend\models;





/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $fecha
 * @property integer $autor
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'autor'], 'required'],
            [['descripcion'], 'string'],
            [['fecha'], 'safe'],
            [['autor'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
            [['titulo'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
            'autor' => 'Autor',
        ];
    }
}
