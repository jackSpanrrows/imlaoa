<!--
author: 老A在Coding
date: 2019-02-23 
title: Python语言规范之词法作用域(Lexical Scoping)
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之词法作用域(Lexical Scoping)
-->

## 词法作用域(Lexical Scoping)

```Tip```
```
推荐使用
```

## 定义:
嵌套的Python函数可以引用外层函数中定义的变量, 但是不能够对它们赋值. 变量绑定的解析是使用词法作用域, 也就是基于静态的程序文本. 对一个块中的某个名称的任何赋值都会导致Python将对该名称的全部引用当做局部变量, 甚至是赋值前的处理. 如果碰到global声明, 该名称就会被视作全局变量.

一个使用这个特性的例子:
```
def get_adder(summand1):
    """Returns a function that adds numbers to a given number."""
    def adder(summand2):
        return summand1 + summand2

    return adder
```

## 优点:
通常可以带来更加清晰, 优雅的代码. 尤其会让有经验的```Lisp```和```Scheme```(还有```Haskell```, ```ML```等)程序员感到欣慰.



## 缺点:

可能导致让人迷惑的bug. 例如下面这个依据 PEP-0227 的例子:
```
i = 4
def foo(x):
    def bar():
        print i,
    # ...
    # A bunch of code here
    # ...
    for i in x:  # Ah, i *is* local to Foo, so this is what Bar sees
        print i,
    bar()
```
因此 ```foo([1, 2, 3])``` 会打印``` 1 2 3 3 ```, 不是 ```1 2 3 4 ```.

(译者注: ```x```是一个列表, ```for```循环其实是将```x```中的值依次赋给```i.```这样对```i```的赋值就隐式的发生了, 整个```foo函数```体中的i都会被当做局部变量, 包括```bar()```中的那个. 这一点与```C++```之类的静态语言还是有很大差别的.)



## 结论:
```鼓励使用.```

上一篇 [Python语言规范之过时的语言特性](http://www.imlaoa.com/blog/py3-language-style15.html)

下一篇 [Python语言规范之函数与方法装饰器](http://www.imlaoa.com/blog/py3-language-style17.html)
