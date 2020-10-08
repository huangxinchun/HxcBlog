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

    public $data = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     *
     * 前序插入 先插入根。再左结点，再右结点
     * author hxc
     * @param $data
     */
    public function frontInsert(&$tree)
    {
        $data = $this->handlerData();
        if (empty($data)) {
            return $data;
        }
        //为#退出
        if ($data == '#') {
//            $tree = new node($data);
            return ;
        }
        $tree = new node($data);
        $this->frontInsert($tree->left);
        $this->frontInsert($tree->right);
        return $tree;
    }

    //

    /**
     * 数据处理
     * author hxc
     * @return array|string
     */
    public function handlerData()
    {
        $arr = $this->data;
        if (count($arr) == 0) {
            echo "插入完成";
            return "";
        }

        $data = $arr[0];
        unset($arr[0]);

        $this->data = array_values($arr);

        return $data;
    }

    /**
     * 前序遍历
     */
    public function frontGet($tree)
    {
        if ($tree == null) {
            return ;
        }
        echo $tree->data;
        $this->frontGet($tree->left);
        $this->frontGet($tree->right);
    }

    /**
     * 求树的深度
     * https://blog.csdn.net/u011583316/article/details/90318888
     */
    public function getDeep($tree)
    {
        if ($tree != null) {
            $left_deep = $this->getDeep($tree->left);
            $right_deep = $this->getDeep($tree->right);
            $number = $left_deep > $right_deep ? $left_deep + 1 : $right_deep + 1;
            return $number;
        }
        return null;
    }

    /**
     *
     * 判断是否平衡树
     * 二叉树中任意结点的左右子树的深度相差不超过1
     */
    public function isBanlanced($tree)
    {

        if($tree == null) {
            return true;
        }
        $left_deep = $this->getDeep($tree->left);
        $right_deep = $this->getDeep($tree->right);
        echo "\r\n";
        if (abs($left_deep - $right_deep) > 1) {
            return false;
        }
        return $this->isBanlanced($tree->left) && $this->isBanlanced($tree->right);
    }


}

//$data = ['A', 'B', 'C', "#", "D", "#", "#", "F"];
//$data = ['A', 'B', "#", "#", "D", "#", "#"];
$data = ['A', 'B', "C", "#", "#", "D", "#", "#", "E", "#", "F", "G"];

$tree = new treeInsert($data);

//插入
$data = $tree->frontInsert($tree->tree);
//$data = $tree->middleInsert($tree->tree);

$tree->frontGet($data);
var_dump(null + 1);
echo "\r\n";
print_r($tree->tree);
echo $tree->getDeep($tree->tree);
echo "\r\n";
var_dump($tree->isBanlanced($tree->tree));
exit;
