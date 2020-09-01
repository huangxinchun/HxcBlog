<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/9/1
 * Time: 9:36
 */

class node
{
    public $data = '';
    public $right = null;
    public $left = null;

    public function __construct($data = '')
    {
        $this->data = $data;
    }
}

//二叉排序树
class tree
{
    public $tree = null;

    public function __construct()
    {
        $this->tree = new node();
    }

    //插入节点
    public function insertNode($data)
    {
        $node = $this->tree;
        //空二叉树
        if ($this->tree->data == '') {
            $this->tree->data = $data;
            return;
        }
        while ($node->data) {
            //判断值
            if ($data < $node->data) {
                //判断左
                if (!empty($node->left)) {
                    $node = $node->left;
                } else {
                    $node->left = new node($data);
                    echo $data."左插入成功~";
                    break;
                }

            }
            if ($data > $node->data) {
                //判断右
                if (!empty($node->right)) {
                    $node = $node->right;
                } else {
                    $node->right = new node($data);
                    echo $data."右插入成功~";
                    break;
                }
            }
            var_dump($node);
        }
        return $data;

    }
    //前序遍历节点
    public function front($tree)
    {
        if($tree == null) {
            return ;
        }
        echo $tree->data;
        $this->front($tree->left);
        $this->front($tree->right);

    }

    //中序遍历

    //删除节点
}

$tree = new tree();
var_dump($tree->insertNode(6));
var_dump($tree->insertNode(7));
var_dump($tree->insertNode(9));
var_dump($tree->insertNode(5));
var_dump($tree->insertNode(3));
var_dump($tree->insertNode(4));
var_dump($tree->tree);
$tree->front($tree->tree);
