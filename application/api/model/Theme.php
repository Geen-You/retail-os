<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 8:42
 */

namespace app\api\model;


use app\lib\exception\ThemeException;

class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }
    public function products(){
        //多对多 第二个参数是中间表名
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    public static function getThemeWithProduct($id){
        $theme = self::with('products,topicImg,headImg')
            ->find($id);
        return $theme;
    }
}