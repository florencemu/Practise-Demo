<?php
 2 //优化方案1：将库存字段number字段设为unsigned，当库存为0时，因为字段不能为负数，将会返回false
 3 include('./mysql.php');
 4 $username = 'wang'.rand(0,1000);
 5 //生成唯一订单
 6 function build_order_no(){
 7   return date('ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
 8 }
 9 //记录日志
10 function insertLog($event,$type=0,$username){
11     global $conn;
12     $sql="insert into ih_log(event,type,usernma)
13     values('$event','$type','$username')";
14     return mysqli_query($conn,$sql);
15 }
16 function insertOrder($order_sn,$user_id,$goods_id,$sku_id,$price,$username,$number)
17 {
18       global $conn;
19       $sql="insert into ih_order(order_sn,user_id,goods_id,sku_id,price,username,number)
20       values('$order_sn','$user_id','$goods_id','$sku_id','$price','$username','$number')";
21      return  mysqli_query($conn,$sql);
22 }
23 //模拟下单操作
24 //库存是否大于0
25 $sql="select number from ih_store where goods_id='$goods_id' and sku_id='$sku_id' ";
26 $rs=mysqli_query($conn,$sql);
27 $row = $rs->fetch_assoc();
28   if($row['number']>0){//高并发下会导致超卖
29       if($row['number']<$number){
30         return insertLog('库存不够',3,$username);
31       }
32       $order_sn=build_order_no();
33       //库存减少
34       $sql="update ih_store set number=number-{$number} where sku_id='$sku_id' and number>0";
35       $store_rs=mysqli_query($conn,$sql);
36       if($store_rs){
37           //生成订单
38           insertOrder($order_sn,$user_id,$goods_id,$sku_id,$price,$username,$number);
39           insertLog('库存减少成功',1,$username);
40       }else{
41           insertLog('库存减少失败',2,$username);
42       }
43   }else{
44       insertLog('库存不够',3,$username);
45   }
46 ?>

复制代码
