<!--
author: 老A在Coding
date: 2019-02-11 
title: Python语言规范之异常
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之异常
-->

#### 新年好，Jack在这里给技术界的各位大佬拜年了，即日起，博客持续更新内容，欢迎大家的品鉴！

## 异常

```Tip```
```
允许使用异常, 但必须小心
```

## 定义:
```
异常是一种跳出代码块的正常控制流来处理错误或者其它异常条件的方式.
```

## 优点:
```
正常操作代码的控制流不会和错误处理代码混在一起. 当某种条件发生时, 它也允许控制流跳过多个框架. 

例如, 一步跳出N个嵌套的函数, 而不必继续执行错误的代码.
```

## 缺点:
```
可能会导致让人困惑的控制流. 调用库时容易错过错误情况.
```

## 结论:
    异常必须遵守特定条件:
1.像这样触发异常: ```raise MyException("Error message")``` 或者 ```raise MyException``` . 不要使用两个参数的形式
```( raise MyException, "Error message" )```或者过时的字符串异常```( raise "Error message" )``` .

2.模块或包应该定义自己的特定域的异常基类, 这个基类应该从内建的```Exception```类继承. 模块的异常基类应该叫做```”Error”```.

```
class Error(Exception):
    pass
```

3.永远不要使用 ```except: ```语句来捕获所有异常, 也不要捕获 ```Exception ```或者 ```StandardError``` , 除非你打算重新触发该异常, 或者你已经在当前线程的最外层(记得还是要打印一条错误消息). 在异常这方面, ```Python```非常宽容, ```except: ```真的会捕获包括 Python 语法错误在内的任何错误. 使用 ```except:``` 很容易隐藏真正的bug.

4.尽量减少```try/except```块中的代码量. ```try```块的体积越大, 期望之外的异常就越容易被触发. 这种情况下, ```try/except```块将隐藏真正的错误.

5.使用 ```finally``` 子句来执行那些无论try块中有没有异常都应该被执行的代码. 这对于清理资源常常很有用, 例如关闭文件.

6.当捕获异常时, 使用 ```as``` 而不要用逗号. 例如

```
try:
    raise Error
except Error as error:
    pass
```

上一篇 [Python语言规范之包](http://www.imlaoa.com/blog/py3-language-style3.html)

下一篇 [Python语言规范之全局变量](http://www.imlaoa.com/blog/py3-language-style5.html)
