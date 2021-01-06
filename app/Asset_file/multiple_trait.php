<?php
trait custom
{
    public function hello()
    {
        echo "hello";
    }
}
trait custom2
{
    public function hello()
    {
        echo "hello2";
    }
}
trait custom3
{
    public function hello()
    {
        echo "hello3";
    }
}
class inheritsCustom
{
    use custom, custom2, custom3 {
        custom2::hello insteadof custom, custom3;
    }
}
$obj = new inheritsCustom();
$obj->hello();

/* Output :hello2 */