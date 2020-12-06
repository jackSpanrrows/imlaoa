<!--
author: Jack.Spanrrows
date: 2019-02-22 
title: Python语言规范之过时的语言特性
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之过时的语言特性
-->

## 过时的语言特性

```Tip```
```
尽可能使用字符串方法取代字符串模块. 使用函数调用语法取代apply(). 
使用列表推导, for循环取代filter(), map()以及reduce().
```

## 定义:
 
    当前版本的Python提供了大家通常更喜欢的替代品.



## 结论:
```
我们不使用不支持这些特性的Python版本, 所以没理由不用新的方式.
```

```
Yes: words = foo.split(':')

     [x[1] for x in my_list if x[2] == 5]

     map(math.sqrt, data)    # Ok. No inlined lambda expression.

     fn(*args, **kwargs)
```
```
No:  words = string.split(foo, ':')

     map(lambda x: x[1], filter(lambda x: x[2] == 5, my_list))

     apply(fn, args, kwargs)
```


上一篇 [Python语言规范之True/False的求值](https://www.imlaoa.com/blog/py3-language-style14.html)

下一篇 [Python语言规范之词法作用域(Lexical Scoping)](https://www.imlaoa.com/blog/py3-language-style16.html)
