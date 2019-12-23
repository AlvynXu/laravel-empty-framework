<?php
/**
 * Created by PhpStorm.
 * User: alvyn
 * Date: 2019/4/3
 * Time: 19:36
 */

namespace App\Enums;

/**
 * Error Code
 * Code Number must be five digits
 * Array => [Code Number, Error Message]
 */
class ErrorCode
{

    //TODO System Error
    const SYSTEM_ERROR                  = ['99999', '系统错误，请稍后重试'];
    const PARAMS_ERROR                  = ['99998', '参数错误'];
    const UPLOAD_ERROR                  = ['99997', '上传失败'];
    const SEND_MSN_ERROR                = ['99996', '短信发送失败'];
    const NULL_DATA                     = ['99995', '空数据'];
    const DATA_EXISTS                   = ['99994', '数据已存在无需再次添加'];

    const ACCOUNT_EXCEPTION             = ['80001', "您的账号异常，操作失败"];
    const USER_NOT_LOGIN                = ['80002', "未登录，请先登陆"];
    const TOKEN_EXPIRED                 = ['80003', "TOKEN过期"];

    const UPDATE_ERROR                  = ['70002', '修改失败'];
    const INSERT_ERROR                  = ['70001', '添加失败'];

    //TODO Crm Error
    const UNDEFINED_ADMIN               = ['10001', '账号有误，请重新输入'];
    const PASSWORD_ERROR                = ['10002', '密码错误，请重新输入'];
    const OLD_PASSWORD_ERROR            = ['10003', '原密码有误，请重新输入'];
    const ADMIN_CONFIRM_PASSWORD_ERROR  = ['10004', '重复密码填写有误，请重新输入'];
    const STORE_NOT_EXISTS              = ['10005', '未找到此商户'];
    const STORE_STATION_NOT_EXISTS      = ['10006', '未找到该工位'];
    const STATION_STORE_NOT_MATCH       = ['10007', '工位跟商户不匹配'];

    //TODO Mini Program Error
    const USER_NOT_EXIST                = ['20001', '账号有误，请重新输入'];
    const USER_PASSWORD_ERROR           = ['20002', '密码错误，请重新输入'];
    const USER_CONFIRM_PASSWORD_ERROR   = ['20003', '重复密码填写有误，请重新输入'];
    const ERROR_SMS_CAPTCHA             = ['20004', '验证码错误，请重新输入'];
    const ERROR_EXTRA                   = ['20005', '附件格式有误'];
    const USERNAME_CHANGE_ONCE          = ['20006', '您已修改过一次趣车邦号'];
    const THE_SAME_USERNAME             = ['20007', '趣车邦号已被别人注册，请重新输入'];
    const PHONE_EXISTS                  = ['20008', '该手机号已被绑定'];
    const USER_PHONE_NOT_NULL           = ['20009', '该账号已绑定手机号'];
    const OVERDUE_VIP                   = ['20010', '会员已过期'];
    const VIP_TYPE_ERROR                = ['20011', '会员卡类型有误'];

    const ACTIVE_CODE_EXISTS            = ['21001', '已获取抽奖吗，获得更多获奖吗请点击按钮获取'];

    const TOPIC_ERROR                   = ['30001', '话题已被删除'];

    const MINA_AUTH_ERROR               = ['40001', '小程序认证失败'];

    const APPOINTMENT_ERROR             = ['50001', '预约失败'];
    const TIME_IS_APPOINTMENT           = ['50002', '时间已被预约，请重新选择时间段'];
    const NONE_APPOINTMENT              = ['50003', '无此预约记录'];
    const IS_APPOINTMENT                = ['50004', '已有未完成的预约'];
    const APPOINTMENT_TIMES_END         = ['50005', '洗车次数已用完'];
    const OVERDUE_APPOINTMENT_TIME      = ['50006', '预约已过期'];
    const SIGN_ERROR                    = ['50007', '签名有误'];
    const CANCELLATION_ERROR            = ['50008', '核销失败，请重新核销'];
    const KM_ERROR                      = ['50009', '距上次保养公里数不足5000km，核销失败'];
    const CANCELLATION_TIME_ERROR       = ['50010', '距上次保养不足半年，核销失败'];
    const CANCELLATION_WASH_TIME_ERROR  = ['50011', '距上次洗车不足1个月，核销失败'];
    const CANCELLATION_CARNUM_ERROR     = ['50012', '车牌号有误'];
    const NULL_CAR_IMAGE                = ['50013', '未上传车身照片'];
    const DRIVER_DETAIL_IS_EXAMINE      = ['50014', '车辆信息审核中，通过后预约'];
    const STORE_CLOSE_SERVICE           = ['50015', '该商户已关闭服务项目'];
    const DRIVER_IS_NULL                = ['50016', '请先上传车辆信息'];
    const DRIVER_IS_NOT_PASS            = ['50017', '车辆信息认证不通过，请重新认证'];
    const SAME_MONTH_APPOINTMENT        = ['50018', '当月洗车次数已用完，是否继续执行'];
    const CARE_NOT_ENOUGH_5000          = ['50019', '距上次保养不到5000km, 将无法享受会员权益，是否继续执行'];
    const CARE_NOT_ENOUGH_10000         = ['50020', '距上次保养不到10000km, 将无法享受会员权益，是否继续执行'];

    const PAY_INIT_ERROR                = ['60001', '支付初始化异常'];

    const ORDER_ERROR                   = ['61002', '该订单不存在'];

    const NEWS_ERROR                    = ['30001', '新闻读取失败'];


    /**
     * 获取数据错误提示
     * @param string $name
     * @return mixed
     */
    public static function getConstant(string $name)
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstant($name);
    }

}