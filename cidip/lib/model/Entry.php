<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23
 * Time: 13:06
 */
namespace cidip\lib\model;
use think\Model;
class Entry extends Model{

    protected $autoWriteTimestamp = 'datetime';

    protected $auto = [];

    protected $insert = ['status' => 1];

    protected $update = [];


}