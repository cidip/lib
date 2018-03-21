<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/1
 * Time: 11:21
 */
namespace cidip\lib\service;
use think\Model;
use cidip\lib\logic\Topic as TopicLogic;
use cidip\lib\logic\Category as CategoryLogic;
use cidip\lib\validate\Topic as TopicValidate;
class Topic extends Model{
    protected $logic;

    protected function initialize(){
        $this->logic = new TopicLogic();
    }

    //首页资讯数据分页
    public function listIndexTopic($page_index,$page_size){
        $list = $this->logic->listData(null,'1,2',$page_size,$page_index);
        return $list;
    }

    //读取资讯数据
    public function loadTopic($topic_id){
        $data = $this->logic->loadData($topic_id);
        return $data;
    }

    //资讯分类列表
    public function listTopicCategory(){
        $categoryLogic = new CategoryLogic();
        $list = $categoryLogic->listAllData('Ip');
        return $list;
    }
}