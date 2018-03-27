<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\logic;

use think\Model;
use think\Db;
use cidip\lib\model\Message as MessageModel;



class Message extends Model
{
    public function listData($pageindex = 1,$pagesize)
    {
        $map['status'] = ['=', 1];
        $list = Db::name('ViewIdeamessage')->where($map)
            ->order('create_time desc')
            ->limit(($pageindex - 1) * $pagesize, $pagesize)
            ->select();

        foreach ($list as &$m) {
            $m['islike'] = false;//未登陆情况下统一返回false
            $mapmessage['messageid'] = $m['messageid'];
            $mapmessage['status'] = 1;
            $m['photos'] = Db::name('Messagephoto')->where($mapmessage)->select();
            $m['replys'] = Db::name('ViewMessagereply')->where($mapmessage)->order('messagereplyid desc')->select();
        }

        $total = MessageModel::where($map)->count();
        $result['list'] = $list;
        $result['total'] = $total;
        return $result;
    }
}