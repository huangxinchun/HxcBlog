<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/8/26
 * Time: 10:15
 */

class node {
    public $data;
    public $next = null;

    public function __construct($value)
    {
        $this->data = $value;
    }

    /**
     * 更新方法
     * author hxc
     * @param $value
     */
    public function update($value)
    {
        $this->data = $value;
    }

}


class link
{
    //头结点
    public $header = null;
    public $nimei = 11;

    public function __construct()
    {
        $this->header = new node('header');
    }

    /**
     * 在index插入结点
     * author hxc
     * @param $data
     * @param $index
     * @return bool
     */
    public function insertIndex($data, $index)
    {
        $node = new node($data);

        if ($index < 0 || $index > $this->length()) {
            return false;
        }
        $index_data = $this->header;

        for ($n = 0; $n < $index; $n++) {
            if ($index_data->next == null) {
                $index_data->next = $node;
                return $data;
            }
            $index_data = $index_data->next;
        }
        $node->next = $index_data->next;
        $index_data->next = $node;

        return $data;
    }

    //在某个item后插入结点
    public function insertItem($data, $item)
    {
        $node = new node($data);

        $index_data = $this->header;
        //
        for ($n = 0; $n < $this->length(); $n++) {
            if(empty($index_data->next)) {
                continue;
            }
            $index_data = $index_data->next;
            if($index_data->data == $item) {
                break;
            }
        }
        $node->next = $index_data->next;
        $index_data->next = $node;
        return $data;
    }

    //删除结点
    public function detele($index)
    {
        $index_data = $this->header;
        if ($index < 0 || $index > $this->length()) {
            return false;
        }
        for ($n = 0; $n < $index; $n++) {
            if($index_data->next == null) {
                break;
            }
            $index_data = $index_data->next;
        }
        $next = $index_data->next;
        //干掉
        $index_data->next = $next->next;
        return $index;
    }

    //获取某个结点
    public function getNode($index)
    {
        $index_data = $this->header;

        if ($index < 0 || $index > $this->length()) {
            return false;
        }
        for ($n = 0; $n < $index; $n++) {
            $index_data = $index_data->next;
        }

        return $index_data->data;
    }

    //获取长度
    public function length()
    {
        $count = 1;
        $next = $this->header;
        if ($next->next == null) {
            return $count;
        }
        while ($next->next != null) {
            $next = $next->next;
            $count++;
        }
        return $count;
    }

    /**
     * 遍历该链表
     * author hxc
     */
    public function forLink()
    {
        $link_data = $this->header;
        for ($n = 0; $n < $this->length(); $n++) {
            echo "--$n--".$link_data->data."\r\n";
            $link_data = $link_data->next;
        }
    }
}

//test
$link = new link();

//插入
var_dump($link->insertIndex("11", 0));
var_dump($link->insertIndex("22", 1));
var_dump($link->insertIndex("33", 2));
var_dump($link->insertItem(44, 22));
//var_dump($link->detele(2));
var_dump($link->getNode(2));
$link->forLink();