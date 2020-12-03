<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/12/3
 * Time: 16:35
 */
class Constructor {
    protected static $container = [];

    public static function bind($name, callable $re) {
        static::$container[]
    }
}