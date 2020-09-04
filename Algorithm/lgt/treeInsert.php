<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/9/3
 * Time: 14:32
 * 二叉树插入 方法
 */

class node
{
    public $data = '';
    public $right = null;
    public $left = null;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

}

/**
 * Class treeInsert
 */
class treeInsert
{

    public $tree = null;

    /**
     *
     * 前序插入 先插入根。再左结点，再右结点
     * author hxc
     * @param $data
     */
    public function frontInsert($data)
    {
        //空树
        if ($this->tree == null) {
            $this->tree = new node($data);
        }
        //
        if ($this->tree->left ) {

        }


    }
    //中序插入

    //后序插入
}