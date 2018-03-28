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
    public function listIndexTopic(){
        $list = $this->logic->listData(null,'1,2',3,1);
        return $list;
    }

    //资讯分类列表
    public function listTopicCategory(){
        $categoryLogic = new CategoryLogic();
        $list = $categoryLogic->listAllDataInclude('Topic','categoryid,name');
        return $list;
    }

    //资讯列表查询
    public function queryTopics($categoryId,$pageSize,$pageIndex){
        $list = $this->logic->listData($categoryId,'1,2',$pageSize,$pageIndex);
        return $list;
    }

    //读取资讯数据
    public function loadTopic($topic_id){
        $data = $this->logic->loadData($topic_id);
        return $data;
    }
}