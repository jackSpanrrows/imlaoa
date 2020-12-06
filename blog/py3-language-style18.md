<!--
author: Jack.Spanrrows
date: 2019-02-25
title: Python语言规范之线程
tags: Python3,风格指南,线程
category: Python3,python
status: publish
summary: Python语言规范之线程
-->

## 线程

```Tip```
```
不要依赖内建类型的原子性.
```

虽然```Python```的内建类型例如字典看上去拥有原子操作, 但是在某些情形下它们仍然不是原子的(即: 如果```__hash__```或```__eq__```被实现为```Python```方法)且它们的原子性是靠不住的. 你也不能指望原子变量赋值(因为这个反过来依赖字典).

优先使用```Queue```模块的 ```Queue``` 数据类型作为线程间的数据通信方式. 另外, 使用```threading```模块及其锁原语(```locking primitives```). 了解条件变量的合适使用方式, 这样你就可以使用 ```threading.Condition``` 来取代低级别的锁了.



上一篇 [Python语言规范之函数与方法装饰器](https://www.imlaoa.com/blog/py3-language-style17.html)

下一篇 [Python语言规范之威力过大的特性](https://www.imlaoa.com/blog/py3-language-style19.html)
