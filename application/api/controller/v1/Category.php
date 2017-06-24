<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 16:18
 */

namespace app\api\controller\v1;
use\app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
        $catetories = CategoryModel::all([],'img');
        if ($catetories->isEmpty()){
            throw new CategoryException();
        }
        return$catetories;
    }
}