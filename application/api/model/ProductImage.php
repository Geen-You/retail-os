<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 15:55
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden  = ['img_id','delete_time','product_id'];
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}