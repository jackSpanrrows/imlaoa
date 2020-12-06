<!--
author: Jack.Spanrrows
date: 2019-02-19 
title: Python语言规范之默认参数值
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之默认参数值
-->

## 默认参数值

```Tip```
```
适用于大部分情况.
```

## 定义:
 
    你可以在函数参数列表的最后指定变量的值, 例如, def foo(a, b = 0): . 如果调用foo时只带一个参数, 则b被设为0.
    如果带两个参数, 则b的值等于第二个参数.


## 优点:
    你经常会碰到一些使用大量默认值的函数, 但偶尔(比较少见)你想要覆盖这些默认值. 默认参数值提供了一种简单的方法来完成  
    这件事,你不需要为这些罕见的例外定义大量函数. 同时, Python也不支持重载方法和函数, 默认参数是一种”仿造”重载行为
    的简单方式.



## 缺点:
```
默认参数只在模块加载时求值一次. 如果参数是列表或字典之类的可变类型, 这可能会导致问题. 
如果函数修改了对象(例如向列表追加项), 默认值就被修改了.

```

## 结论:
```
鼓励使用, 不过有如下注意事项:

不要在函数或方法定义中使用可变对象作为默认值.
```

```
Yes: def foo(a, b=None):
         if b is None:
             b = []
```
```
No:  def foo(a, b=[]):
         ...
No:  def foo(a, b=time.time()):  # The time the module was loaded???
         ...
No:  def foo(a, b=FLAGS.my_thing):  # sys.argv has not yet been parsed...
```


上一篇 [Python语言规范之条件表达式](https://www.imlaoa.com/blog/py3-language-style11.html)

下一篇 [Python语言规范之属性(properties)](https://www.imlaoa.com/blog/py3-language-style13.html)
