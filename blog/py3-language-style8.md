<!--
author: 老A在Coding
date: 2019-02-15 
title: Python语言规范之默认迭代器和操作符
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之默认迭代器和操作符
-->

## 默认迭代器和操作符

```Tip```
```
如果类型支持, 就使用默认迭代器和操作符. 比如列表, 字典及文件等.
```

## 定义:
```  
容器类型, 像字典和列表, 定义了默认的迭代器和关系测试操作符(in和not in)
```

## 优点:
    默认操作符和迭代器简单高效, 它们直接表达了操作, 没有额外的方法调用. 使用默认操作符的函数是通用的. 
   
    它可以用于支持该操作的任何类型.


## 缺点:
```
你没法通过阅读方法名来区分对象的类型(例如, has_key()意味着字典). 不过这也是优点.
```

## 结论:
```
如果类型支持, 就使用默认迭代器和操作符, 例如列表, 字典和文件. 内建类型也定义了迭代器方法. 
优先考虑这些方法, 而不是那些返回列表的方法. 当然，这样遍历容器时，你将不能修改容器.
```
```
Yes:  for key in adict: ...
      if key not in adict: ...
      if obj in alist: ...
      for line in afile: ...
      for k, v in dict.iteritems(): ...
```
```
No:   for key in adict.keys(): ...
      if not adict.has_key(key): ...
      for line in afile.readlines(): ...
```

上一篇 [Python语言规范之列表推导](http://www.imlaoa.com/blog/py3-language-style7.html)

下一篇 [Python语言规范之生成器](http://www.imlaoa.com/blog/py3-language-style9.html)
