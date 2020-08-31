<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/8/28
 * Time: 13:35
 * 队列是一种特殊的线性表，它只允许在表的前端，可以称之为front，进行删除操作；而在表的后端，可以称之为rear进行插入操作。队列和堆栈一样，是一种操作受限制的线性表，和堆栈不同之处在于：队列是遵循“先进先出”原则，而堆栈遵循的是“先进后出”原则。队列进行插入操作的端称为队尾，进行删除操作的称为队头，只允许在队尾进行插入操作，在队头进行删除操作。
 * https://www.cnblogs.com/be-thebest/p/9983672.html
 */

class queue
{
    public $data = [];
    public $front = 0;
    public $rear = 0;
    public $maxsize = 5;
}

class queueList
{
    public $queue;

    public function __construct()
    {
        $this->queue = new queue();
    }

    //入队列
    public function pushQueue($data)
    {
        //判断队满
        if ($this->isFull()) {
            echo "队列满了";
            return false;
        }
        if ($this->isEmpty()) {
            $this->queue->data[$this->queue->front++] = $data;
        } else {

            for ($n = 0; $n < $this->queue->front; $n++) {
                $this->queue->data[$this->queue->front - $n] = $this->queue->data[$this->queue->front - ($n + 1)];
            }
            //集体往后移一位
            $this->queue->data[$this->queue->rear] = $data;
            $this->queue->front++;
        }
        return $data;

    }
    //出队列
    public function popQueue()
    {
        if ($this->isEmpty()) {
            return false;
        }
        $response = $this->queue->data[$this->queue->front - 1];
        unset($this->queue->data[$this->queue->front - 1]);
        $this->queue->front--;
        return $response;
    }

    //是否空队列
    public function isEmpty()
    {
        if ($this->queue->front == $this->queue->rear) {
            return true;
        }
        return false;
    }

    //队列個數
    public function countQueue()
    {
        return count($this->queue->data);
    }

    //判断队满
    public function isFull()
    {
        if (($this->queue->front -  $this->queue->rear) == $this->queue->maxsize) {
            return true;
        }
        return false;
    }
}

$queue = new queueList();

var_dump($queue->pushQueue("1"));
var_dump($queue->pushQueue("2"));
var_dump($queue->pushQueue("3"));
var_dump($queue->pushQueue("4"));
var_dump($queue->pushQueue("5"));
var_dump($queue->pushQueue("6"));
var_dump($queue->queue->data);
var_dump($queue->popQueue());
var_dump($queue->popQueue());
var_dump($queue->popQueue());
var_dump($queue->popQueue());
var_dump($queue->queue->data);
