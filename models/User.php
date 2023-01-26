<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *

 * @property int $id
 *  * @property int $fio
 * @property int $phone
 * @property string $login
 * @property string $password
 * @property int $id_city потому что самое длинное название города в мире - 168 символов
 * @property string $date_of_birth
 * @property string $sex
 * @property string $avatar
 * @property string $currency валюта
 * @property string $role
 *
 * @property BankCard[] $bankCards
 * @property Basket[] $baskets
 * @property City $city
 * @property Comment[] $comments
 * @property Company[] $companies
 * @property Company[] $companies0
 * @property DeliveryAddress[] $deliveryAddresses
 * @property Like[] $likes
 * @property Product[] $products
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'fio', 'phone', 'login', 'password', 'id_city', 'date_of_birth', 'sex', 'currency'], 'required'],
            [['phone'], 'string', 'max' => 100],
            [['id_city'], 'number'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['currency'], 'string'],
            [['email'], 'string', 'max' => 120],
            [['fio'], 'string', 'max' => 255],
            [['login', 'password'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 300],
            [['role'], 'string', 'max' => 20],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'fio'=> 'ФИО',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'login' => 'Логин',
            'password' => 'Пароль',
            'id_city' => 'Город',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
            'avatar' => 'Аватар',
            'currency' => 'Валюта',
            'role' => 'Роль',
        ];
    }

    /**
     * Gets query for [[BankCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCards()
    {
        return $this->hasMany(BankCard::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Companies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies0()
    {
        return $this->hasMany(Company::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[DeliveryAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['created_by' => 'id']);
    }

    // интерфейс,достали из базового User
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // доставали из встроеного массива, а теперь из бд
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // пока без токена работаем
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login'=> $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
      // пока не надо
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // пока не надо
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
        // пока  хэширование не требовали
    }   
}
// dddddddddddddd
