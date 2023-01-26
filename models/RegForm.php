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
class RegForm extends User
{
    // добавим недостающие два поля
   public $passwordConfirm;
   public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          
            [['email', 'fio', 'phone', 'login', 'password', 'id_city', 'date_of_birth', 'sex', 'currency'], 'required','message' => 'Поле обязательно для заполнения!'],
            ['fio', 'match', 'pattern' => '#[А-Яа-я\- ]+#', 'message' => 'Только кириллица, пробелы и дефисы'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z]{1,}$/u', 'message' => 'Только латинские буквы!'],
            ['login', 'unique', 'message' => 'Такой логин уже используется!'],['email', 'email', 'message' => 'Некорректный email!'],
            ['email', 'unique', 'message' => 'Такой email уже используется!'],['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны сопадать!'],
            [['agree'], 'boolean'],[['agree'], 'compare', 'compareValue' => true, 'message' => 'Необходимо дать согласие!'],
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
            'passwordConfirm'=>"Подтверждение пароля",
            'agree'=>'Согласие на обработку данных',
        ];
    }

    
}
// dddddddddddddd
