<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 13:02
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function generateToken(){
        //32随机字符串
        $randChars = getRandChar(32);
      //三组字符串MD5加密
        $timestamp =$_SERVER['REQUEST_TIME_FLOAT'];
        $salt = config('securt.token_salt');
        return md5($randChars.$timestamp.$salt);
    }

    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if (!$vars){
            throw new TokenException();
        }else{
            if (!is_array($vars)){//如果缓存不是默认的文件系统，那返回的就是数组，不用转换
                $vars = json_decode($vars,true);
            }
            if (array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的Token变量并不存在');
            }

        }
    }

    /**
     * 根据token获取uid
     */
    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
//用户和cms都可以访问的权限
    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar('scope');
        if ($scope){
            if ($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    //只有用户才能访问的权限
    public static function needExclusiveScope(){
        $scope = self::getCurrentTokenVar('scope');
        if ($scope){
            if ($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    public static function isValidOperate($checkedUID){
        if (!$checkedUID){
            throw new Exception('检测UID是必须传入一个被检测的UID');
        }
        $currentOperateUID = self::getCurrentUid();

        if ($checkedUID == $currentOperateUID){
            return true;
        }
        return false;

    }

    public static function verifyToken($token){
        $exist = Cache::get($token);
        if($exist){
            return true;
        }else{
            return false;
        }
    }
}