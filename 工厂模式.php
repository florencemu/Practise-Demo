/*工厂模式是一种类，它具有为您创建对象的某些方法。您可以使用工厂类创建对象，而不直接使用new。这样，如果您想要更改所创建的对象类型，只需更改该工厂即可。使用该工厂的所有代码会自动更改。*/
<?php
/*IUser接口定义用户对象应执行什么操作*/
interface IUser
{
    function getName();
}

/*User为IUser的实现*/ 
class User implements IUser
{
    public function __construct($id) {
 
    }
 
    public function getName() {
        return "Jack";
    }
}
/*UserFactory工厂类创建 IUser 对象*/
class UserFactory
{
    public static function Create($id) {
        return new User($id);
    }
}
 
$uo = UserFactory::Create(1);
echo($uo->getName() . "
");

?>
