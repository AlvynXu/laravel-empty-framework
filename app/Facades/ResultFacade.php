<?php
/**
 * Created by PhpStorm.
 * User: alvyn
 * Date: 2019/7/6
 * Time: 15:24
 */
namespace App\Facades;

use App\Enums\ErrorCode;
use Dotenv\Regex\Error;

class ResultFacade
{
    /**
     * 返回成功
     * @param $data
     * @param string $extra
     * @return array
     */
    public function success($data, $extra = '')
    {
        $code = 200;
        $msg = '获取数据成功';
        return ['Code' => $code, 'Msg' => $msg, 'Data' => $data, 'Extra' => $extra];
    }

    /**
     * 返回失败
     * @param $error_code
     * @param string $data
     * @param string $extra
     * @return array
     */
    public function error($error_code, $data = '', $extra = '')
    {
        return ['Code' => $error_code[0], 'Msg' => $error_code[1], 'Data' => $data, 'Extra' => $extra];
    }

    /**
     * 返回参数错误
     * @return array
     */
    public function params_error()
    {
        $result = ErrorCode::PARAMS_ERROR;
        return ['Code' => $result[0], 'Msg' => $result[1], 'Data' => [], 'Extra' => ''];
    }
}