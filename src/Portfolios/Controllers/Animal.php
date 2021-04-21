<?php
// lop truu tuong Animal
namespace Portfolios\Controllers;
abstract class Animal
{
    protected $name;
    abstract  function  __construct();
    abstract function run($a1231);  // phuong thuc truu tuong voi khai báo với tu khoa abstract và không có thân hàm
    abstract function walk();  // phuong thuc truu tuong voi khai báo với tu khoa abstract và không có thân hàm
}

// lớp Dog kế thừa từ lớp trừu tượng Animal
class Dog extends Animal
{
    public function run ($sdkajhwk) //phương thức này được override lại và viết thân hàm cho nó
    {
        echo "Con chó chạy bằng 4 chân";
    }

    function walk()
    {
        // TODO: Implement walk() method.
    }
}

// lớp Person kế thừa từ lớp trừu tượng Animal
class Person extends Animal
{
    public function run () //phương thức này được override lại và viết thân hàm cho nó
    {
        echo "Con người chạy bằng 2 chân";
    }
}