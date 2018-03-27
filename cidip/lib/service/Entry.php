<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/1
 * Time: 11:21
 */
namespace cidip\lib\service;
use think\Model;
use cidip\lib\logic\Entry as EntryLogic;
class Entry extends Model{
    protected $logic;

    protected function initialize(){
        $this->logic = new EntryLogic();
    }

    public function getEntryCount(){
        $result = $this->logic->listData(1,10);
        return $result['total'];
    }
}