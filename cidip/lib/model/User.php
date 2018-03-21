<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\model;
use think\Model;
class User extends Model{

    protected $autoWriteTimestamp = 'datetime';

    protected $auto = [];

    protected $insert = ['status' => 1];

    protected $update = [];


}