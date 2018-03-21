<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 18:08
 */
namespace cidip\lib\logic;

use think\Model;
use cidip\lib\model\Topic as TopicModel;



class Topic extends Model
{

    public function createData($params)
    {
        $topic = new TopicModel($params);
        $result = $topic->allowField(true)->save();
        if (false === $result) {
            return $topic->getError();
        } else {
            return $result;
        }
    }

    public function listData($categoryid, $type, $pagesize, $pageindex = 1)
    {
        $map['status'] = ['=', 1];
        $map['type'] = ['in',$type];
        if (isset($categoryid)) {
            $map['categoryid'] = $categoryid;
        }
        $list = TopicModel::where($map)
            ->order('is_hot desc,create_time desc')
            ->limit(($pageindex - 1) * $pagesize, $pagesize)
            ->field('topicid,title,cover,categoryid,link,comments_count,likes_count,collects_count,view_count,create_time,userid,is_hot')
            ->select();

        $total = TopicModel::where('type', 'in', $type)
            ->where($map)
            ->count();
        $result['list'] = $list;
        $result['total'] = $total;
        return $result;
    }

    public function loadData($topic_id){
        $result = TopicModel::get($topic_id);
        return $result;
    }

    public function listDataByPager($categoryid, $type, $pagesize, $pageindex = 1)
    {
        $list = TopicModel::where('status', '1')
            ->where('type', 'in', $type)
            ->where('categoryid', $categoryid)
            ->order('is_hot desc,create_time desc')
            ->paginate($pagesize);
        $total = TopicModel::where('status', '1')
            ->where('type', 'in', $type)
            ->where('categoryid', $categoryid)
            ->count();
        $result['list'] = $list;
        $result['total'] = $total;
        return $result;
    }
}