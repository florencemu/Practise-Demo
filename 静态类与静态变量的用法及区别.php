
<?php
Class Person{
    // 定义静态成员属性
    public static $country = "中国";
    // 定义静态成员方法
    public static function myCountry() {
        // 内部访问静态成员属性
        echo "我是".self::$country."人<br />";/*类内部访问静态成员属性/方法*/
    }
}


class Student extends Person {
    function study() {
        echo "我是". parent::$country."人<br />";/*子类访问父类内部静态成员属性/方法*/
    }
}


// 输出成员属性值
echo Person::$country."<br />";  // 输出：中国 
/*外部访问静态成员属性/方法*/
$p1 = new Person();
//echo $p1->country;   // 错误写法
// 访问静态成员方法
Person::myCountry();   // 输出：我是中国人
// 静态方法也可通过对象访问：
$p1->myCountry();
  
// 子类中输出成员属性值
echo Student::$country."<br />"; // 输出：中国
$t1 = new Student();
$t1->study();    // 输出：我是中国人
?>

