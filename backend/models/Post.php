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
 * @property integer $visible
 *
 * @property Categorias $categorias
 * @property Etiquetas $etiquetas
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
            [['titulo', 'descripcion', 'visible'], 'required'],
            [['descripcion'], 'string'],
            [['fecha'], 'safe'],
            [['autor', 'visible'], 'integer'],
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
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetas()
    {
        return $this->hasOne(Etiquetas::className(), ['id' => 'id']);
    }
}
