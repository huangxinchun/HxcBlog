<?php
/**
 * 栈 top bottom
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/8/27
 * Time: 14:09
 * 栈的属性有top、最大存储数、和存储容器
 * https://www.cnblogs.com/firstForEver/p/5252277.html
 */

class stack  {
    public $data = [];
    public $top = 0;
    public $max = 5;
}

class stackList {
    public $stack;

    public function __construct()
    {
        $this->stack = new stack();
    }
    //入栈
    public function push($data)
    {
        if ($this->stack->top >= $this->stack->max) {
            echo "不能超过容量";
            return false;
        }
        $this->stack->data[++$this->stack->top] = $data;

        return $data;
    }

    //出栈
    public function pop()
    {
        if ($this->stack->top == 0) {
            echo "空栈";
            return false;
        }

        $response = $this->stack->data[$this->stack->top];
        unset($this->stack->data[$this->stack->top--]);
        return $response;
    }

    //是否空栈
    public function isEmpty()
    {
        if ($this->stack->top == 0) {
            return false;
        }
        return true;
    }

    /**
     * 栈长度
     * author hxc
     * @return int
     */
    public function length()
    {
        return count($this->stack->data);
    }
}

$stack = new stackList();
var_dump($stack->push("11"));
var_dump($stack->push("22"));
var_dump($stack->push("33"));
var_dump($stack->push("44"));
var_dump($stack->push("55"));
var_dump($stack->pop());
var_dump($stack->pop());
var_dump($stack->stack);