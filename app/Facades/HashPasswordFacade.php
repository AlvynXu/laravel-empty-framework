<?php
/**
 * Created by PhpStorm.
 * User: alvyn
 * Date: 2019/7/6
 * Time: 20:13
 */
namespace App\Facades;
class HashPasswordFacade
{
    // blowfish
    private static $algo = '$2a';
    // cost parameter
    private static $cost = '$10';

    // mainly for internal use
    public static function unique_salt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }

    // this will be used to generate a hash
    public static function hash($password)
    {

        /**
         * UpdateBy : alvyn
         * UpdateTime : 2018/02/27
         * UpdateReason : add default password
         */
        if (!isset($password) || $password == '') {
            $tmpArr = [
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                '1', '2', '3', '4', '5', '6', '7', '8', '9'
            ];
            $password = '';
            for ($i = 0; $i < 6; $i++) {
                $password .= $tmpArr[rand(0, 58)];
            }
        }

        return crypt($password, self::$algo .
            self::$cost .
            '$' . self::unique_salt());
    }

    // this will be used to compare a password against a hash
    public static function check_password($hash, $password)
    {
        $full_salt = substr($hash, 0, 29);
        $new_hash = crypt($password, $full_salt);

        return ($hash === $new_hash);
    }
}