<?php

namespace App\Facades;

use Illuminate\Support\Facades\Redis as PRedis;

class Redis
{
    private $redis;
    private $time = 60;
    private static $hash_key = 'a0172b9659ace7e872b9d2500dd58a56aa98b668';

    public function __construct($client = '')
    {
        $this->redis = $client != '' ? PRedis::connection($client) : PRedis::connection();
    }

    public function setDefaultTime($time)
    {
        $this->time = $time;
    }

    public function set($key, $data, $time = '')
    {
        if ($time == '') $time = $this->time;
        if (gettype($data) != 'string') $data = json_encode($data);
        return PRedis::setex($key, $time, $data);
    }

    public function get($key)
    {
        return PRedis::get($key);
    }

    /**
     * 累加数据
     * @param $name string [store,blog,user,comment]
     * @param $id   string|int
     * @param $number
     * @return int
     */
    public function addNumber($name, $id, $number)
    {
        return PRedis::hincrby($name, $id, (INT)$number);
    }

    public function getNumber($name,$id){
        return PRedis::hget($name,$id);
    }

    public function addNearBlog($city,$data,$type=''){
        $key = 'ddx_near_blog_'.urlencode($city);
        if($type == 'new'){
            $result = PRedis::lpush($key, $data);
        }else{
            $result = PRedis::rpush($key, $data);
        }
        PRedis::expire($key, 60*60*24*2);
        return $result;
    }

    public function getNearBlog($city,int $page,int $count = 10){
        return PRedis::lrange('ddx_near_blog_'.urlencode($city), ((INT)$page-1)*(INT)$count, (INT)$page*(INT)$count);
    }

    public function getFirstNearBlog($city){
        return PRedis::lindex('ddx_near_blog_'.urlencode($city), 0);
    }

    public function getLastNearBlog($city){
        return PRedis::lindex('ddx_near_blog_'.urlencode($city), ((INT)PRedis::llen('ddx_near_blog_'.urlencode($city)) -1 ));
    }


    public function getLine($redis_key){
        
    }

    public function lineCount($redis_key){
        return PRedis::zcard($redis_key);
    }

    public function setLine($redis_key,$key,$value){
        return PRedis::zadd($redis_key,$key,$value);
    }

    public function removeLine($redis_key,$value){
        return PRedis::zrem($redis_key,$value);
    }
}