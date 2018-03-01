<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\logic;
use think\Model;
class Topic extends Model{

    public function add($title)
    {
        $topic = new \cidip\lib\model\Topic();
        $topic->title = $title;
        $topic->save();
    }
}