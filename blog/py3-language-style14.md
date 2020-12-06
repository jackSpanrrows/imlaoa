<!--
author: 老A在Coding
date: 2019-02-21
title: Python语言规范之True/False的求值
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之True/False的求值
-->

## True/False的求值

```Tip```
```
尽可能使用隐式false
```

## 定义:
 
    Python在布尔上下文中会将某些值求值为false. 按简单的直觉来讲, 就是所有的”空”值都被认为是false. 
    因此0， None, [], {}, “” 都被认为是false.


## 优点:
    使用Python布尔值的条件语句更易读也更不易犯错. 大部分情况下, 也更快.

## 缺点:
```
对C/C++开发人员来说, 可能看起来有点怪.

```

## 结论:
```
尽可能使用隐式的false, 例如: 使用 if foo: 而不是 if foo != []: . 不过还是有一些注意事项需要你铭记在心:
```
    1. 永远不要用==或者!=来比较单件, 比如None. 使用is或者is not.

    2. 注意: 当你写下 if x: 时, 你其实表示的是 if x is not None . 
       例如: 当你要测试一个默认值是None的变量或参数是否被设为其它值. 这个值在布尔语义下可能是false!

    3. 永远不要用==将一个布尔量与false相比较. 使用 if not x: 代替. 
       如果你需要区分false和None, 你应该用像 if not x and x is not None: 这样的语句.

    4. 对于序列(字符串, 列表, 元组), 要注意空序列是false. 
       因此 if not seq: 或者 if seq: 比 if len(seq): 或 if not len(seq): 要更好.

    5. 处理整数时, 使用隐式false可能会得不偿失(即不小心将None当做0来处理). 
       你可以将一个已知是整型(且不是len()的返回结果)的值与0比较.

```
Yes: if not users:
         print 'no users'

     if foo == 0:
         self.handle_zero()

     if i % 10 == 0:
         self.handle_multiple_of_ten()
```

```
No:  if len(users) == 0:
         print 'no users'

     if foo is not None and not foo:
         self.handle_zero()

     if not i % 10:
         self.handle_multiple_of_ten()
```
    6. 注意‘0’(字符串)会被当做true.


上一篇 [Python语言规范之属性(properties)](http://www.imlaoa.com/blog/py3-language-style13.html)

下一篇 [Python语言规范之过时的语言特性](http://www.imlaoa.com/blog/py3-language-style15.html)
