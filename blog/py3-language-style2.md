<!--
author: 老A在Coding
date: 2019-01-29 
title: Python语言规范之导入
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之导入
-->

## 导入
```Tip```
```
仅对包和模块使用导入
```

## 定义:
```
模块间共享代码的重用机制.
```

## 优点:
```
命名空间管理约定十分简单. 每个标识符的源都用一种一致的方式指示. x.Obj表示Obj对象定义在模块x中.
```

## 缺点:
```
模块名仍可能冲突. 有些模块名太长, 不太方便.
```

## 结论:

使用 ```import x``` 来导入包和模块.

使用 ```from x import y``` , 其中```x```是包前缀, ```y```是不带前缀的模块名.

使用 ```from x import y as z```, 如果两个要导入的模块都叫做 ```y``` 或者 ```y``` 太长了.

例如, 模块 ```sound.effects.echo``` 可以用如下方式导入:

```
from sound.effects import echo
...
echo.EchoFilter(input, output, delay=0.7, atten=4)
```
导入时不要使用相对名称. 即使模块在同一个包中, 也要使用完整包名. 这能帮助你避免无意间导入一个包两次.


上一篇 [Python语言规范之Lint](http://www.imlaoa.com/blog/py3-language-style1.html)

下一篇 [Python语言规范之包](http://www.imlaoa.com/blog/py3-language-style3.html)
