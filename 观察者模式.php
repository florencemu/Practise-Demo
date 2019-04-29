<?php
/*测试代码创建 UserList，并将 UserListLogger 观察者添加到其中。然后添加一个消费者，并将这一更改通知 UserListLogger*/


/*IObserver列表定义要通过怎样的方法才能成为观察者*/
interface IObserver
{
    function onChanged($sender, $args);
}
/*IObservable接口定义可以被观察的对象*/
interface IObservable
{
    function addObserver($observer);
}
 
/*UserList实现IObervable接口,将本身注册为可观察*/
class UserList implements IObservable
{
    private $_observers = array();
 
    public function addCustomer($name) {
        foreach($this->_observers as $obs) {
            $obs->onChanged($this, $name);
        }
    }
 
    public function addObserver($observer ) {
        $this->_observers[] = $observer;
    }
}
/*UserListLogger实现IObserver接口*/
class UserListLogger implements IObserver
{
    public function onChanged($sender, $args) {
        echo("'$args' added to user list
");
    }
}
 
$ul = new UserList();
$ul->addObserver(new UserListLogger());
$ul->addCustomer("Jack");
