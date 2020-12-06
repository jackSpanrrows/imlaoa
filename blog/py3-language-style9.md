<!--
author: Jack.Spanrrows
date: 2019-02-16
title: Python语言规范之生成器
tags: Python3,风格指南,生成器
category: Python3,python
status: publish
summary: Python语言规范之生成器
-->

## 生成器

```Tip```
```
按需使用生成器.
```

## 定义:
```  
所谓生成器函数, 就是每当它执行一次生成(yield)语句, 它就返回一个迭代器, 这个迭代器生成一个值. 
生成值后, 生成器函数的运行状态将被挂起, 直到下一次生成.

```

## 优点:
    简化代码, 因为每次调用时, 局部变量和控制流的状态都会被保存. 比起一次创建一系列值的函数, 生成器使用的内存更少.


## 缺点:
```
没有.
```

## 结论:
```
鼓励使用.注意在生成器函数的文档字符串中使用 "Yields:" 而不是" Returns:".
```

上一篇 [Python语言规范之默认迭代器和操作符](https://www.imlaoa.com/blog/py3-language-style8.html)

下一篇 [Python语言规范之Lambda函数](https://www.imlaoa.com/blog/py3-language-style10.html)
