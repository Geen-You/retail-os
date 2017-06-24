<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 16:18
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['create_time','delete_time','update_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}