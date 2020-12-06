<!--
author: 老A在Coding
date: 2019-02-13 
title: Python语言规范之嵌套/局部/内部类或函数
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之嵌套/局部/内部类或函数
-->

## 嵌套/局部/内部类或函数

```Tip```
```
鼓励使用嵌套/本地/内部类或函数
```

## 定义:
```
类可以定义在方法, 函数或者类中. 函数可以定义在方法或函数中. 封闭区间中定义的变量对嵌套函数是只读的.
```

## 优点:
```
允许定义仅用于有效范围的工具类和函数.
```

## 缺点:
```
嵌套类或局部类的实例不能序列化(pickled).
```

## 结论:
```
推荐使用.
```

上一篇 [Python语言规范之全局变量](http://www.imlaoa.com/blog/py3-language-style5.html)

下一篇 [Python语言规范之列表推导](http://www.imlaoa.com/blog/py3-language-style7.html)
