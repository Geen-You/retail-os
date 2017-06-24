<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/17
 * Time: 10:11
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostivelnt;
use app\api\service\Pay as PayService;
class Pay extends BaseController
{

    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];
    //请求预订单
    public function getPreOrder($id=''){
        (new IDMustBePostivelnt())->goCheck();
        $pay = new PayService($id);
        $pay->pay();
    }


    public function receiveNotify(){
        //1，检查库存量，超卖。
        //2. 更新status状态
        //3. 减库存
        $notify = new WxNotify();
        $notify->Handle(false);//$notify->NotifyProcess()不能直接这样调用，这样需要传递$data
    }
    //转发调试
//    public function receiveNotify(){
//        //1，检查库存量，超卖。
//        //2. 更新status状态
//        //3. 减库存
////        $notify = new WxNotify();
////        $notify->Handle();//$notify->NotifyProcess()不能直接这样调用，这样需要传递$data
//        $xmlData = file_get_contents('php://input');
//        $result = curl_post_raw('http://z.cn/api/v1/pay/re_notifyXDEBUG_SESSION_START=12472',$xmlData);
//
//    }
}