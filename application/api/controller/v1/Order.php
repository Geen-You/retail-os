<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/15
 * Time: 10:49
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostivelnt;
use app\api\validate\OrderPlace;
use app\api\service\Order as OrderService;
use app\api\validate\PagingParameter;
use app\api\model\Order as OrderModel;
use app\api\service\Token as TokenService;
use app\lib\exception\OrderException;
use app\lib\exception\SuccessMessage;


class Order extends BaseController
{
    //用户在选择商品后，先api提交包含他所选的商品的相关信息
    //api在收到信息后，需要检查订单相关商品的库存量
    //有库存，把订单数据存入数据库  下单成功，返回客户端消息，告诉客户可以支付了
    //调用支付接口，进行支付
    //再次检查库存量
    //服务器这边就可以调用支付接口支付
    //微信返回支付结果
    //成功：也需要检查库存量
    //成功：库存扣除：失败：返回支付失败结果
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
        'checkPrimaryScope' => ['only' => 'getDetail,getSumaryByUser']
    ];

    //获取订单简要信息
    public function getSummaryByUser($page=1,$size=15){
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
       $pagingeOrders = OrderModel::getSumaryByUser($uid,$page,$size);
       if ($pagingeOrders->isEmpty()){
           return [
               'data' => [],
               'current_page' => $pagingeOrders->currentPage()
           ];
       }
       $data = $pagingeOrders->hidden(['snap_items','snap_address','prepay_id'])->toArray();
        return [
            'data' => $data,
            'current_page' => $pagingeOrders->getCurrentPage()
        ];
    }

    //获取订单详细信息
    public function getDetail($id){
        (new IDMustBePostivelnt())->goCheck();
        $orderDetail = OrderModel::get($id);
        if (!$orderDetail){
            throw new OrderException();
        }
        return $orderDetail->hidden(['prepay_id']);
    }

    public function placeOrder(){
       (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();

        $order = new OrderService();
        $status = $order->place($uid, $products);
        return $status;
    }

    /**
     * 获取全部订单简要信息（分页）
     * @param int $page
     * @param int $size
     * @return array
     * @throws \app\lib\exception\ParameterException
     */
    public function getSummary($page=1, $size = 20){
        (new PagingParameter())->goCheck();
        $pagingOrders = OrderModel::getSummaryByPage($page, $size);
        if ($pagingOrders->isEmpty())
        {
            return [
                'current_page' => $pagingOrders->currentPage(),
                'data' => []
            ];
        }
        $data = $pagingOrders->hidden(['snap_items', 'snap_address'])
            ->toArray();
        return [
            'current_page' => $pagingOrders->currentPage(),
            'data' => $data
        ];
    }

    public function delivery($id){
        (new IDMustBePostivelnt())->goCheck();
        $order = new OrderService();
        $success = $order->delivery($id);
        if($success){
            return new SuccessMessage();
        }
    }
}