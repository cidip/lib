<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\logic;

use think\Model;
use cidip\lib\model\User as UserModel;



class User extends Model
{
    public function listData($pageindex = 1,$pagesize)
    {
        $map['status'] = ['=', 1];
        $list = UserModel::where($map)
            ->order('create_time desc')
            ->limit(($pageindex - 1) * $pagesize, $pagesize)
            ->select();

        $total = UserModel::where($map)->count();
        $result['list'] = $list;
        $result['total'] = $total;
        return $result;
    }
}