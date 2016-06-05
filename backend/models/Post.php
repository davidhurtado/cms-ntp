<?php

namespace app\models;

use Yii;

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
            [['titulo', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['fecha'], 'safe'],
            [['autor'], 'integer',],
            [['titulo'], 'string', 'max' => 100],
            [['titulo'], 'unique'],
            [['visible'], 'boolean'],
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
            'visible' => 'Visible',
        ];
    }
}
