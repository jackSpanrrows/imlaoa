<!--
author: 老A在Coding
date: 2019-02-12 
title: Python语言规范之全局变量
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之全局变量
-->

## 全局变量

```Tip```
```
避免全局变量
```

## 定义:
```
定义在模块级的变量.
```

## 优点:
```
偶尔有用.
```

## 缺点:
```
导入时可能改变模块行为, 因为导入模块时会对模块级变量赋值.
```

## 结论:
```
避免使用全局变量, 用类变量来代替. 但也有一些例外:
```

```
1.脚本的默认选项.

2.模块级常量. 例如:　PI = 3.14159. 常量应该全大写, 用下划线连接.

3.有时候用全局变量来缓存值或者作为函数返回值很有用.

4.如果需要, 全局变量应该仅在模块内部可用, 并通过模块级的公共函数来访问.
```

上一篇 [Python语言规范之异常](http://www.imlaoa.com/blog/py3-language-style4.html)

下一篇 [Python语言规范之嵌套/局部/内部类或函数](http://www.imlaoa.com/blog/py3-language-style6.html)
