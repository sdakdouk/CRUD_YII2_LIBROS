<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%libros}}".
 *
 * @property int $id
 * @property string $titulo
 * @property string $isbn
 * @property int $autor
 * @property int|null $pagina
 * @property int $categoria
 *
 * @property Autor $autor0
 * @property Categoria $categoria0
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%libros}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'isbn', 'autor', 'categoria'], 'required'],
            [['autor', 'pagina', 'categoria'], 'integer'],
            [['titulo', 'isbn'], 'string', 'max' => 225],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor' => 'id']],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'isbn' => Yii::t('app', 'Isbn'),
            'autor' => Yii::t('app', 'Autor'),
            'pagina' => Yii::t('app', 'Pagina'),
            'categoria' => Yii::t('app', 'Categoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(Autor::className(), ['id' => 'autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }
}
