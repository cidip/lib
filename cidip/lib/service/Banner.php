<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/1
 * Time: 11:21
 */
namespace cidip\lib\service;
use think\Model;
use cidip\lib\logic\Banner as BannerLogic;
class Banner extends Model{
    protected $logic;

    protected function initialize(){
        $this->logic = new BannerLogic();
    }

    //首页资讯数据分页
    public function listIndexBanner(){
        $list = $this->logic->listData(1,10);
        return $list;
    }
}