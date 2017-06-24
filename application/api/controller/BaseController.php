<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/15
 * Time: 11:43
 */

namespace app\api\controller;


use think\Controller;
use  app\api\service\Token as TokenService;

class BaseController extends Controller
{
    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }

}