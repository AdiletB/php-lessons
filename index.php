<?php

use Test\TestClass;

include_once "db_helpers.php";
include_once "models/BaseTag.php";
include_once "autoload.php";

 class BaseClass
{
    static $name = "Kek";
    static function getName()
    {
        return static::$name;
    }
}
class Child extends BaseClass
{

    public function Foo()
    {

        echo "woof";
    }
}
interface IBook{
     public function getName() : string;
}
interface IMagazine extends IBook {
     public function getNumber();
}
class Book implements IBook {

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }
}
class Magazine implements IMagazine {

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function getNumber()
    {
        // TODO: Implement getNumber() method.
    }
}
class Vector implements ArrayAccess, Iterator
{

    protected $data = [];
    protected $position = 0;

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }
    public function offsetUnset($offset)
    {
        unset($offset);
    }
    public function toArray(){
        return $this->data;
    }

    public function current()
    {
        return $this->offsetGet($this->key());
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        $keys = array_keys($this->data);
        return $keys[$this->position];
    }

    public function valid()
    {
        return $this->offsetExists($this->key());
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
class IntVector extends Vector
{
    public function offsetSet($offset, $value)
    {
        if(!is_int($value))
            die("Argument error");

        parent::offsetSet($offset, $value);
    }
}
//методы классов выше приоритетом методов трейта, а свойства переопределить нельзя, если он видит одинаковые названия но разные значения. если значения пустые тоже нельзя
function getBookName(IBook $book){
     return $book->getName();
}
trait CanFly
{
    public function Fly(){}
    public function __construct()
    {
    }
}
class Eagle
{
    use CanFly{
        __construct as CanFlyConstruct;
    }
    public function __construct()
    {
        $this->CanFlyConstruct();
    }
}