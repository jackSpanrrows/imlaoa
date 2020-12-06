<!--
author: Jack.Spanrrows
date: 2019-02-17 
title: Python语言规范之Lambda函数
tags: Python3,风格指南,Lambda
category: Python3,python
status: publish
summary: Python语言规范之Lambda函数
-->

## Lambda函数

```Tip```
```
适用于单行函数
```

## 定义:
```  
与语句相反, lambda在一个表达式中定义匿名函数. 常用于为 map() 和 filter() 之类的高阶函数定义回调函数或者操作符.
```

## 优点:
    方便.


## 缺点:
```
比本地函数更难阅读和调试. 没有函数名意味着堆栈跟踪更难理解. 

由于lambda函数通常只包含一个表达式, 因此其表达能力有限.
```

## 结论:
```
适用于单行函数. 如果代码超过60-80个字符, 最好还是定义成常规(嵌套)函数.

对于常见的操作符，例如乘法操作符，使用 operator 模块中的函数以代替lambda函数. 

例如, 推荐使用 operator.mul , 而不是 lambda x, y: x * y .
```


上一篇 [Python语言规范之嵌套/局部/内部类或函数](https://www.imlaoa.com/blog/py3-language-style9.html)

下一篇 [Python语言规范之条件表达式](https://www.imlaoa.com/blog/py3-language-style11.html)
