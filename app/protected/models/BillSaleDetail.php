<?php

class BillSaleDetail extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'tb_bill_sale_detail';
    }
    
    public function attributeLabels() {
        return array(
            'bill_sale_detail_id' => Yii::t("lang", "ID"),
            'bill_id' => Yii::t("lang", "Bill ID"),
            'bill_sale_detail_barcode' => Yii::t("lang", "Product Code"),
            'bill_sale_detail_price' => Yii::t("lang", "price"),
            'bill_sale_detail_price_vat' => Yii::t("lang", "price_vat"),
            'bill_sale_detail_qty' => Yii::t("lang", "number"),
            'branch_id' => Yii::t("lang", "branch")
        );
    }
    
    public function getProduct() {
        return Product::model()->find(array(
            'condition' => "product_code = '{$this->bill_sale_detail_barcode}'"
        ));
    }

}


