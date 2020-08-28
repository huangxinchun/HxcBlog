<?php
/**
 * 栈 top bottom
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/8/27
 * Time: 14:09
 */

class stack  {
    public $data = [];
    public $top = null;
    public $bottom = null;
}

class stackList {
    public $stack;

    public function __construct()
    {
        $this->stack = new stack();
    }
    //入栈
    public function push($data) {
        if ($this->stack->bottom == null) {
            $this->stack->data[0] = $data;
            $this->stack->top = $this->stack->bottom = $this->stack->data[0];
        } else {
            $this->stack->top = $this->stack->data[$this->length()] = $data;
        }

        return $data;
    }

    //出栈
    public function pop() {
        if ($this->stack->bottom == null) {
            return false;
        }
        $response = $this->stack->data[$this->length()-1];
        unset($this->stack->data[$this->length()-1]);
        return $response;
    }

    //是否空栈
    public function isEmpty() {
        if ($this->stack->bottom == null) {
            return false;
        }
        return true;
    }

    /**
     * 栈长度
     * author hxc
     * @return int
     */
    public function length() {
        return count($this->stack->data);
    }
}

$stack = new stackList();
var_dump($stack->push("11"));
var_dump($stack->push("22"));
var_dump($stack->push("33"));
var_dump($stack->stack->bottom);
var_dump($stack->stack);
