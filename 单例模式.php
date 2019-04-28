/*
三私一公  公共静态方法作为返回对象的接口，私有化静态属性用于存放唯一一个单例对象。私有化构造方法，私有化克隆方法保证只存在一个单例

单例模式有两种方法可以获得新的对象，一个是克隆 另外就是序列化反序列化
*/


<?php

class GetJxSetByInfoIdHandler{
	private static $news;//申请一个私有的静态成员变量来保存该类的唯一实例
	private function __construct(){}//声明私有的构造方法，防止类外部创建对象
	public static function instance(){
		if(!(self::$news instanceof self)){//声明一个静态公共方法，供外部获取唯一实例
			self::$new = new self;		
	}
		return self::$new;
}
	private function __clone(){}//声明私有的克隆方法，防止对象被克隆
	public function __sleep(){
	return [];//防止对象通过序列化被克隆
}

}
