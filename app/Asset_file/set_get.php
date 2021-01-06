<?php
class A
{
    private $a = 'private';
    protected $b = 'protected';
    public $c = 'public';
    static $d = 'static';
    public function __construct()
    {
        $this->e = 'constructed';
    }
    public function __set($property, $value)
    {
        echo ' set ' . $property . '=' . $value . "</br>";
        $this->$property = $value;
    }
    public function __get($property)
    {
        echo ' get ' . $property . "</br>";
        $this->$property = 'dynamic'; // invokes __set() !!
        return $this->$property;
    }
}

class B extends A
{
    public function constructMe()
    {
        $this->e = 'constructed2';
    }
}

class C extends B
{
    public function __construct()
    {
        parent::constructMe();
    }
}

$cc = new C();
$cc->d;

echo " ----------------- </br>";

echo " \n";
$a = new A();
$b = new B();
echo " \n" . "</br>";
echo ' B:c=' . $b->c;
echo " \n" . "</br>";
echo ' B:d=' . $b->d;
echo " \n" . "</br>";

$c = new C();
echo " \n" . "</br>";

print_r($a);

echo "Part \n" . "</br>";

print_r($b);

echo "Part \n" . "</br>";

print_r($c);

echo "Part \n" . "</br>";

print_r(A::$d);
echo "Part \n" . "</br>";

print_r(B::$d);
echo "Part \n" . "</br>";

print_r(C::$d);
echo "Part \n" . "</br>";

echo 'A class: ' . "</br>";
$R = new reflectionclass('A');
print_r($R->getdefaultproperties());
print_r($R->getstaticproperties());

echo 'B class: ' . "</br>";
$R = new reflectionclass('B');
print_r($R->getdefaultproperties());
print_r($R->getstaticproperties());