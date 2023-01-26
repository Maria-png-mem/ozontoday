<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property string $text
 * @property int $rating
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product[] $products
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        // ОГРАНИЧЕНИЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯЯ
        return [

            [['id_user', 'text', 'rating'], 'required'],
            [['id_user', 'id_product', 'rating'], 'integer'],
            [['text'], 'string'],
            [['rating'], 'integer','max'=>5],
            [['created_at', 'updated_at'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => 'updated_at',
                'createdAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'id_product' => 'Идентификатор продукта',
            'id_user' => 'Идентификатор пользователя',
            'text' => 'Текст',
            'rating' => 'Рейтинг',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_comment' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
