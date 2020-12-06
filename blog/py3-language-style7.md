<!--
author: Jack.Spanrrows
date: 2019-02-14 
title: Python语言规范之列表推导
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之列表推导
-->

## 列表推导(List Comprehensions)

```Tip```
```
可以在简单情况下使用
```

## 定义:
```  
列表推导(list comprehensions)与生成器表达式(generator expression)提供了一种简洁高效的方式来创建
列表和迭代器,而不必借助map(), filter(), 或者lambda.
```

## 优点:
    简单的列表推导可以比其它的列表创建方法更加清晰简单. 生成器表达式可以十分高效, 因为它们避免了创建整个列表.


## 缺点:
```
复杂的列表推导或者生成器表达式可能难以阅读.
```

## 结论:
```
适用于简单情况. 每个部分应该单独置于一行: 映射表达式, for语句, 过滤器表达式. 
禁止多重for语句或过滤器表达式. 复杂情况下还是使用循环.
```
```
Yes:
  result = []
  for x in range(10):
      for y in range(5):
          if x * y > 10:
              result.append((x, y))

  for x in xrange(5):
      for y in xrange(5):
          if x != y:
              for z in xrange(5):
                  if y != z:
                      yield (x, y, z)

  return ((x, complicated_transform(x))
          for x in long_generator_function(parameter)
          if x is not None)

  squares = [x * x for x in range(10)]

  eat(jelly_bean for jelly_bean in jelly_beans
      if jelly_bean.color == 'black')
```
```
No:
  result = [(x, y) for x in range(10) for y in range(5) if x * y > 10]

  return ((x, y, z)
          for x in xrange(5)
          for y in xrange(5)
          if x != y
          for z in xrange(5)
          if y != z)
```

上一篇 [Python语言规范之嵌套/局部/内部类或函数](https://www.imlaoa.com/blog/py3-language-style6.html)

下一篇 [Python语言规范之默认迭代器和操作符](https://www.imlaoa.com/blog/py3-language-style8.html)
