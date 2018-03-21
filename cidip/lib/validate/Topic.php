<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2
 * Time: 17:57
 */
namespace cidip\lib\validate;
use think\Validate;

class Topic extends Validate
{
    // 验证规则
    protected $rule = [
        'title' => 'require|max:50',
        'cover' => 'require',
    ];
    protected $message = [
        'title.require' => '标题不能为空',
        'title.max' => '最大不超过50字',
        'cover' => '封面图片未上传',
    ];
    protected $scene = [
        'add' => ['title','cover'],
        'edit' => ['title'],
    ];
}