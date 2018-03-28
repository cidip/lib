<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/21
 * Time: 9:29
 */
namespace cidip\lib\logic;
use think\model;
use cidip\lib\model\Category as CategoryModel;

class Category extends Model{

    public function listAllData($type = 'Ip'){
        $list = CategoryModel::where(['type'=>$type,'status'=> '1'])->order('orderno')->select();
        return $list;
    }

    public function listAllDataExcept($type = 'Ip',$exceptColumns){
        $list = CategoryModel::where(['type'=>$type,'status'=> '1'])->field($exceptColumns,true)->order('orderno')->select();
        return $list;
    }

    public function listAllDataInclude($type = 'Ip',$exceptColumns){
        $list = CategoryModel::where(['type'=>$type,'status'=> '1'])->field($exceptColumns)->order('orderno')->select();
        return $list;
    }
}
