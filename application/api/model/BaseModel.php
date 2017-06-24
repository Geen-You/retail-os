<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/6
 * Time: 21:04
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
  public function prefixImgUrl($value,$data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}