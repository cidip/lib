<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\logic;

use think\Model;
use cidip\lib\model\Ipr as IprModel;



class Ipr extends Model
{
    public function listData($pageindex = 1,$pagesize)
    {
        $map['status'] = ['=', 1];
        $list = IprModel::where($map)
            ->order('create_time desc')
            ->limit(($pageindex - 1) * $pagesize, $pagesize)
            ->select();

        $total = IprModel::where($map)->count();
        $result['list'] = $list;
        $result['total'] = $total;
        return $result;
    }
}