<?php
  public function actionRedis(){
    $redis = \Yii::$app->redis;
    // $redis->lpush('mytest',1);
    $order = $this->build_order();
    // echo $order;die;
    // echo $redis->llen('mytest');
    $reg = $redis->lpop('mytest');
    if (!$reg) {
      echo "笨蛋！已经被抢光啦！";
      return false;
    }
    $redis->close();
    $model = new Highly();
    $model->order_id = $order;
    $model->goods_name = '秒杀商品';
    $model->buy_time = date('Y-m-d H:i:s',time());
    $model->mircrotime = microtime(true);
 
    if($model->save()===false){
      echo '未能成功抢购！';
    }else{
      echo '恭喜你，订单<b>'.$order.'</b>抢购成功';
    }
  }
  // 给redis添加商品
  public function actionInsertgoods(){
    $count = yii::$app->request->get('count',0);
    if (empty($count)) {
      echo '大兄弟，你还没告诉我需要上架多少商品呢!';
      return false;
    }
    $redis = \Yii::$app->redis;
    for ($i=0; $i < $count; $i++) { 
      $redis->lpush('mytest',1);
    }
    echo '成功添加了'.$redis->llen('mytest').'件商品。';
    $redis->close();
 
  }
