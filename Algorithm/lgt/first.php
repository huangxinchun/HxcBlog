<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/8/25
 * Time: 10:33
 */

class linearSeq {
    //存储数组
    public $_cache = [];

    public function __construct()
    {

    }

    /**
     * 插入数据
     * author hxc
     * @param $value
     * @param $index
     * @return bool
     */
    public function insert($value, $index)
    {
        $length = $this->length();
        if($index < 0 || $index > $length) {
            return false;
        }

        //移动位置
        for ($n = $length; $n > $index; $n--) {
            $this->_cache[$n] = $this->_cache[$n - 1];
        }
        $this->_cache[$index] = $value;
        return true;
    }

    /**
     * 删除数据
     * author hxc
     * @param $index
     * @return bool
     */
    public function detele($index)
    {
        $length = $this->length();

        if ($index < 0 || $index > $length -1) {
            return false;
        }
        $val = $this->_cache[$index];
        //删除位置
        for ($n = $index; $n < $length -1; $n++) {
            $this->_cache[$n] = $this->_cache[$n+1];
        }
        unset($this->_cache[$length-1]);
        return $val;
    }

    /**
     * 数组长度
     * author hxc
     * @return int
     */
    public function length()
    {
        return count($this->_cache);
    }

    /**
     * 是否为空
     * author hxc
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->_cache);
    }

    /**
     * 头部插入
     */
    public function lPush($value)
    {
        return $this->insert($value, 0);
    }

    /**
     * 尾部插入
     */
    public function rPush($value)
    {
        return $this->insert($value, $this->length());
    }


    /**
     * 头部弹出
     * author hxc
     */
    public function lPop()
    {
        return $this->detele(0);
    }

    /**
     * 尾部弹出
     * author hxc
     */
    public function rPop()
    {
        return $this->detele($this->length() - 1);
    }

    /**
     * 合并数组
     * author hxc
     * @param $arr
     * @return bool
     */
    public function union($arr)
    {
        if(empty($arr)) {
            return false;
        }
        $arr_two_lenth = count($arr);
        for ($n = 0; $n < $arr_two_lenth; $n++) {
            $this->rPush($arr[$n]);
        }
        return true;
    }

}

$test = new linearSeq();
$test->_cache = [1,2,3,4,5,6,7];
var_dump($test->_cache);
//var_dump($test->insert("3232", 2));
//var_dump($test->insert("32", 2));
//var_dump($test->detele(6));
var_dump($test->lPush(1));
var_dump($test->_cache);
var_dump($test->rPush(1));
var_dump($test->_cache);
var_dump($test->lPop());
var_dump($test->_cache);
var_dump($test->rPop());
var_dump($test->_cache);

var_dump($test->union([2,3,4,5,6,7,8]));
var_dump($test->_cache);
exit;

