/*有一种工厂模式的变体使用工厂方法。类中的这些公共静态方法构造该类型的对象。如果创建此类型的对象非常重要，此方法非常有用。*/

<?php
/*一个接口IUser*/
interface IUser
{
    function getName();
}
/*实现IUser接口的User类*/
class User implements IUser
{
/*两个创建对象的静态方法*/
    public static function Load($id) {
        return new User($id);
    }
 
    public static function Create() {
        return new User(null);
    }
 
    public function __construct($id) {
 
    }
 
    public function getName() {
        return "Jack";
    }
}
 
$uo = User::Load(1);
echo($uo->getName() . "
");
?>
