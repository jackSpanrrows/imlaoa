<!--
author: Jack.Spanrrows
date: 2018-02-12 
title: Yii1框架调用缓存使用方法
tags: Yii Yii1
category: Yii1
status: publish
summary: Yii1框架调用缓存使用方法
-->
```
Yii的自带缓存都继承CCache 类, 在使用上基本没有区别
缓存基础类 CCache 提供了两个最常用的方法：set() 和 get()。
要在缓存中存储变量 $value，我们选择一个唯一 ID 并调用 set() 来存储它：
```
> Yii::app()->cache->set($id, $value);

```
被缓存的数据会一直保留在缓存中，直到因一些缓存策略而被删除（比如缓存空间满了，删除最旧的数据）。
要改变这一行为，我们还可以在调用 set() 时加一个过期参数，这样数据过一段时间就会自动从缓存中清除。
```

```
在缓存中保留该值最多 30 秒
```

>Yii::app()->cache->set($id, $value, 30);

```
当我们稍后需要访问该变量时（不管是不是同一 Web 请求），我们调用 get() （传入 ID）来从缓存中获取它。
如果返回值为 false，说明该缓存不可用，需要我们重新生成它。
```

>$value=Yii::app()->cache->get($id);<br/>
if($value===false)<br/>
{<br/>
    // 因为在缓存中没找到，重新生成 $value  <br/>
    // 再缓存一下以备下次使用<br/>
    // Yii::app()->cache->set($id,$value);<br/>
}<br/>

```
为一个要缓存的变量选择 ID 时，确保该ID在应用中是唯一的。不必保证ID在跨应用的情况下保证唯一，
因为缓存组件有足够的智能来区分不同应用的缓存 ID。要从缓存中删除一个缓存值，调用 delete()；
要清空所有缓存，调用 flush()。调用 flush() 时要非常小心，因为它会把其它应用的缓存也清空。
```

######提示: 因为 CCache 实现了 ArrayAccess 接口，可以像数组一样使用缓存组件。例如：

```
$cache=Yii::app()->cache;
$cache['var1']=$value1;  // 相当于: $cache->set('var1',$value1);
$value2=$cache['var2'];  // 相当于: $value2=$cache->get('var2');
要使用这些缓存也很简单,只要服务器支持, 然后通进简单的修改配置文件即可使用
一. Memcache 的使用
1. 编辑配置文件config/main.php 添加memcache配置
array(
    'components'=>array(
        'memcache'=>array(
            'class'=>' system.caching.CMemCache',
            'servers'=>array(
                array(
                    'host'=>'server1',
                    'port'=>11211,
                    'weight'=>60,
                ),
                array(
                    'host'=>'server2',
                    'port'=>11211,
                    'weight'=>40,
                ),
            ),
        ),
    ),
)
```

#####2. 在框架中的使用
>Yii::app()->memcache ->set($key, $value, $expire);<br/>
>Yii::app()->memcache ->get($key);<br/>
>Yii::app()->memcache ->deleteValue($key);<br/>

####二. 数据库缓存的使用

#####1. 编辑配置文件config/main.php 添加dbcache配置
```
return array(
    ......
    'components'=>array(
        ......
        'dbcache'=>array(
            'class'=>' system.caching.CDbCache',
        ),
        'db'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString'=>'sqlite:/wwwroot/blog/protected/data/blog.db',
            'schemaCachingDuration'=>3600,
        ),
    ),
);

```

#####2. 在框架中的使用
```
Yii::app()->dbcache ->set($key, $value, $expire);
Yii::app()->dbcache ->get($key);
三. 文件缓存的使用
1. 编辑配置文件config/main.php 添加dbcache配置
// application components
'components'=>array(
       'filecache'=>array(
         'class'=>'system.caching.CFileCache',    
         //我们使用CFileCache实现缓存,缓存文件存放在runtime文件夹中
         'directoryLevel'=>'2',   //缓存文件的目录深度
       ),
),
Yii::app()->filecache ->set($key, $value, $expire);
Yii::app()->filecache ->get($key);
```

####四.APC使用

#####编辑配置文件config/main.php 添加dbcache配置
```
'components'=>array(
       'class' => 'system.caching.CApcCache',
),
```