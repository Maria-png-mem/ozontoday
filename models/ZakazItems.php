<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zakaz_items".
 *
 * @property int $id
 * @property int $id_purchase
 * @property int $id_product
 * @property float $price
 * @property int $count
 *
 * @property Product $product
 * @property Purchase $purchase
 */
class ZakazItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_purchase', 'id_product', 'price', 'count'], 'required'],
            [['id_purchase', 'id_product', 'count'], 'integer'],
            [['price'], 'number'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_purchase'], 'exist', 'skipOnError' => true, 'targetClass' => Purchase::class, 'targetAttribute' => ['id_purchase' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'id_purchase' => 'Идентификатор заказа',
            'id_product' => 'Идентификатор продукта',
            'price' => 'Цена',
            'count' => 'Кол-во',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }

    /**
     * Gets query for [[Purchase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchase::class, ['id' => 'id_purchase']);
    }
}
