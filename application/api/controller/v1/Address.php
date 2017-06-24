<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 17:29
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\UserAddress;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;

class Address extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];
    /**
     * 获取用户地址信息
     * @return UserAddress
     * @throws UserException
     */
    public function getUserAddress(){
        $uid = TokenService::getCurrentUid();
        $userAddress = UserAddress::where('user_id', $uid)
            ->find();
        if(!$userAddress){
            throw new UserException([
                'msg' => '用户地址不存在',
                'errorCode' => 60001
            ]);
        }
       return $userAddress;
    }

    /**
     * 更新或者创建用户收获地址
     */
    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate->goCheck();
        /**
         * 1 根据token获取uid
         * 2 根据uid查找用户数据，判断用户是否存在，不存在抛出异常
         * 3 获取用户从客户端提交过了的地址信息
         * 4 根据是否已经存在地址来判断是添加还是更新地址
         */
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if (!$user){
            throw new UserException();
        }
        $dataArray = $validate->getDataByRule(input('post.'));
        $userAddress = $user->address();
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return json(new SuccessMessage(),201);
    }
}