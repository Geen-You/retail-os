<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 14:28
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductMode;
use app\api\validate\Count;
use app\api\validate\IDMustBePostivelnt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products = ProductMode::getMostRecent($count);
        if ($products->isEmpty()){
            throw new ProductException();
        }
        //临时隐藏属性,已在数据库文件里修改了默认返回类型
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id){
        (new IDMustBePostivelnt())->goCheck();
        //默认以下返回的是数组，在数据库配置文件修改返回类型，变成对象
        $products = ProductMode::getProductsByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getOne($id){
        (new IDMustBePostivelnt())->goCheck();
        $product = ProductMode::getProductDetail($id);
        if (!$product){
            throw new ProductException();
        }
        return $product;
    }
}