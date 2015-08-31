<?php

class Branch extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "tb_branch";
    }

    public function attributeLabels() {
        return array(
            'branch_id' => Yii::t("lang", "ID"),
            'branch_name' => Yii::t("lang", "name_warehouse_store"),
            'branch_tel' => Yii::t("lang", "phone_number"),
            'branch_email' => Yii::t("lang", "email"),
            'branch_address' => Yii::t("lang", "address"),
            'branch_created_date' => Yii::t("lang", "save_the_date")
        );
    }

    public function rules() {
        return array(
            array('branch_name, branch_tel, branch_address', 'required'),
            array('branch_email, branch_id', 'safe')
        );
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->branch_created_date = new CDbExpression("NOW()");
        }
        return parent::beforeValidate();
    }

    public function search() {
        $criteria = new CDbCriteria();
        $criteria->compare('branch_id', $this->branch_id);
        $criteria->compare('branch_name', $this->branch_name);
        $criteria->compare('branch_tel', $this->branch_tel);
        $criteria->compare('branch_email', $this->branch_email);
        $criteria->compare('branch_address', $this->branch_address);
        $criteria->compare('branch_creted_date', $this->branch_created_date);

        return new CActiveDataProvider($this, array('criteria' => $criteria));
    }

    public static function getOptions($no_select = null) {
        $model = Branch::model()->findAll();
        $arr = array();

        if ($no_select == true) {
            $arr[] = '--- ไม่เลือกรายการ ---';
        }

        foreach ($model as $r) {
            $arr[$r->branch_id] = $r->branch_name;
        }
        return $arr;
    }

}
