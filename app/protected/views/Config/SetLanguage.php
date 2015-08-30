<?php

$lg = Yii::app()->session['language'];

if (!empty($lg)) {
    Yii::app()->language = $lg;
} else {
    Yii::app()->session['language'] = 'lv';
}