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

    protected $autoWriteTimestamp = 'datetime';

    protected $auto = [];

    protected $insert = ['status' => 1];

    protected $update = [];

    public function user()
    {
        return $this->belongsTo('User','userid','userid');
    }

    public function category(){
        return $this->belongsTo('Category','categoryid','categoryid');
    }

}