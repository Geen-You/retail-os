<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/15
 * Time: 16:56
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['use_id','delete_time','update_time'];
    protected $autoWriteTimestamp = true;

    public function getSnapItemsAttr($value){
        if ($value){
            return null;
        }
        return json_decode($value);
    }
    public static function getSumaryByUser($uid,$page=1,$size=15){
        $paginate = self::where('user_id','=',$uid)
            ->order('create_time desc')
            ->paginate($size,true,['page' => $page]);
        return $paginate;
    }

    public static function getSummaryByPage($page=1, $size=20){
        $pagingData = self::order('create_time desc')
            ->paginate($size, true, ['page' => $page]);
        return $pagingData ;
    }

    public function products()
    {
        return $this->belongsToMany('Product', 'order_product', 'product_id', 'order_id');
    }
}