<?php
/**
 * Created by PhpStorm.
 * User: hxc
 * Date: 2020/11/26
 * Time: 13:38
 */

class Point
{
    public $x;

    public $y;

    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;

        $this->y = $y;
    }
}
class Circle
{
    public $radius; //半径

    public $center; //圆心点

    const PI = 3.14;

    public function __construct(Point $point, $radius = 1)
    {
        $this->center = $point;
        $this->radius = $radius;
    }

    /**
     * 打印圆点的坐标
     * author hxc
     */
    public function printCenter()
    {
        printf('center coordinate is (%d, %d)', $this->center->x, $this->center->y);
    }

    /**
     * 计算圆形的面积
     * author hxc
     * @return float|int
     */
    public function area()
    {
        return self::PI * pow($this->radius, 2);
    }
}

$reflectionClass = new reflectionClass(Circle::class);
var_dump($reflectionClass->getConstants());
var_dump($reflectionClass);

var_dump($reflectionClass->getProperties());

exit;