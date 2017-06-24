<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/23
 * Time: 17:42
 */

namespace app\api\service;


use app\api\model\ThirdApp;
use app\lib\exception\TokenException;

class AppToken extends Token
{
    public function get($ac,$se){
         $app = ThirdApp::check($ac,$se);
         if (!$app){
             throw new TokenException([
                 'msg' => '授权失败',
                 'errorCode' => 10004
             ]);
         }else{
             $scope = $app->scope;
             $uid = $app->id;
             $values = [
                 'scope' => $scope,
                 'uid' => $uid
             ];
             $token = $this->saveToChache($values);
             return $token;
         }
    }

    private function saveToChache($values){
        $token = self::generateToken();
        $expire_in = config('setting.token_expire_in');
        $result = cache($token,json_encode($values),$expire_in);
        if (!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $token;
    }
}