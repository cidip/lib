<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/1
 * Time: 11:21
 */
namespace cidip\lib\service;
use think\Model;
use cidip\lib\logic\Message as MessageLogic;
class Message extends Model{
    protected $logic;

    protected function initialize(){
        $this->logic = new MessageLogic();
    }

    //首页资讯数据分页
    public function listIndexMessage(){
        $list = $this->logic->listData(1,5);
        return $list;
    }
}