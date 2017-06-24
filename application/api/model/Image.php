<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/6
 * Time: 16:57
 */

namespace app\api\model;


use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }

}