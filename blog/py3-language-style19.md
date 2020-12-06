<!--
author: 老A在Coding
date: 2019-02-25
title: Python语言规范之威力过大的特性
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之威力过大的特性
-->

## 威力过大的特性

```Tip```
```
避免使用这些特性
```

## 定义
```Python```是一种异常灵活的语言, 它为你提供了很多花哨的特性, 诸如元类(```metaclasses```), 字节码访问, 任意编译(```on-the-fly compilation```), 动态继承, 对象父类重定义(```object reparenting```), 导入黑客(```import hacks```), 反射, 系统内修改(```modification of system internals```), 等等.

## 优点
    强大的语言特性, 能让你的代码更紧凑.

## 缺点
使用这些很”酷”的特性十分诱人, 但不是绝对必要. 使用奇技淫巧的代码将更加难以阅读和调试. 开始可能还好(对原作者而言), 但当你回顾代码, 它们可能会比那些稍长一点但是很直接的代码更加难以理解.
## 结论
    在你的代码中避免这些特性.

上一篇 [Python语言规范之线程](http://www.imlaoa.com/blog/py3-language-style18.html)

下一篇 [Python安装模块那点破事](http://www.imlaoa.com/blog/py3-module-install.html)

