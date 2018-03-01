<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\model;
use think\Model;
class Topic extends Model{
    protected $auto = [];
    protected $insert = ['create_time','status' => 1,'link','comments_count'];
    protected $update = ['update_time'];
    protected $autoWriteTimestamp = 'datetime';
    protected function setCommentsCountAttr()
    {
        return 11;
    }
}