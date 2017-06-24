<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/1
 * Time: 16:52
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends Model
{

    protected $hidden = ['delete_time','update_time'];
    public function items(){
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id){
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }

}