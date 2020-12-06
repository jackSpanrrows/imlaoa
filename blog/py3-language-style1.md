<!--
author: Jack.Spanrrows
date: 2019-01-28 
title: Python语言规范之Lint
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之Lint
-->

## Lint
```Tip```
```
对你的代码运行pylint
```
## 定义:
```pylint是一个在Python源代码中查找bug的工具. 对于C和C++这样的不那么动态的(译者注: 原文是less dynamic)语言, 这些bug通常由编译器来捕获. 由于Python的动态特性, 有些警告可能不对. 不过伪告警应该很少.```
## 优点:
```
可以捕获容易忽视的错误, 例如输入错误, 使用未赋值的变量等.
```

## 缺点:
```
确保对你的代码运行 pylint.抑制不准确的警告,以便能够将其他警告暴露出来。
```
你可以通过设置一个行注释来抑制警告. 例如:

```dict = 'something awful'  # Bad Idea... pylint: disable=redefined-builtin```

```pylint``` 警告是以一个数字编号(如 ```C0112``` )和一个符号名(如 ```empty-docstring``` )来标识的. 在编写新代码或更新已有代码时对告警进行抑制, 推荐使用符号名来标识.

如果警告的符号名不够见名知意，那么请对其增加一个详细解释。

采用这种抑制方式的好处是我们可以轻松查找抑制并回顾它们.

你可以使用命令 ```pylint --list-msgs``` 来获取 ```pylint``` 告警列表. 你可以使用命令 ```pylint --help-msg=C6409``` , 以获取关于特定消息的更多信息.

相比较于之前使用的 ```pylint: disable-msg``` , 本文推荐使用 ```pylint: disable``` .

要抑制”参数未使用”告警, 你可以用”_”作为参数标识符, 或者在参数名前加”unused_”. 遇到不能改变参数名的情况, 你可以通过在函数开头”提到”它们来消除告警. 例如:

```
def foo(a, unused_b, unused_c, d=None, e=None):
    _ = d, e
    return a
```

下一篇 [Python语言规范之导入](https://www.imlaoa.com/blog/py3-language-style2.html)
