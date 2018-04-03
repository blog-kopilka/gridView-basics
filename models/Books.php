<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $src
 * @property string $author
 * @property string $description
 * @property int $created_at
 * @property int $delete
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'created_at'], 'required'],
            [['description'], 'string'],
            [['created_at', 'delete'], 'integer'],
            [['title', 'src', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'src' => 'Src',
            'author' => 'Author',
            'description' => 'Description',
            'created_at' => 'Created At',
            'delete' => 'Delete',
        ];
    }
}
