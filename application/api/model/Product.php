<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 8:41
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['main_img_id','from','delete_time','update_time','create_time','pivot','category_id'];

    public function getMainImgUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }

    public function imgs(){
       return $this->hasMany('ProductImage','product_id','id');
    }

    public function properties(){
        return $this->hasMany('ProductProperty','product_id','id');
    }

    public static function getMostRecent($count){
        $products = self::limit($count)->order('update_time desc,create_time desc')->select();
        return $products;
    }

    public static function getProductsByCategoryID($categroyID){
        $products = self::where('category_id','=',$categroyID)->select();
        return $products;
    }

    public static function getProductDetail($id){//对关联模型里的属性排序
        $products = self::with([
            'imgs' => function($query){
                $query->with('imgUrl')->order('order','asc');
            }
        ])
            ->with(['properties'])->find($id);
        return $products;
    }
}