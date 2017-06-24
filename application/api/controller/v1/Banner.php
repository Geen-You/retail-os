<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/1
 * Time: 10:32
 */
namespace app\api\controller\v1;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostivelnt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**获取指定id的Banner信息
     * @param $id banner 的id号
     * @http Get
     * @url /banner/:id
     */
    public function getBanner($id){
        (new IDMustBePostivelnt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if (!$banner){
             throw new BannerMissException();
        }
        return $banner;
    }

}