<?php
/**
 * Created by PhpStorm.
 * User: alvyn
 * Date: 2019/4/3
 * Time: 18:29
 */

namespace App\Http\Services;

class BaseService
{

    public function __construct()
    {

    }

    /**
     * @return int
     * 获取用户ID
     */
    public function getUid()
    {
        return ($user = auth('api')->user()) ? $user->ID : 0;
    }

}