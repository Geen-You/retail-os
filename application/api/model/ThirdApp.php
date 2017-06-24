<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/23
 * Time: 17:44
 */

namespace app\api\model;


class ThirdApp extends BaseModel
{
    public static function check($ac,$se){
        $app = self::where('app_id','=',$ac)
            ->where('app_secret','=',$se)->find();
        return $app;
    }
}