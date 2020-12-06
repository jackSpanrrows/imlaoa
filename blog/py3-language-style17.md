<!--
author: Jack.Spanrrows
date: 2019-02-24
title: Python语言规范之函数与方法装饰器
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之函数与方法装饰器
-->

## 函数与方法装饰器

```Tip```
```
如果好处很显然, 就明智而谨慎的使用装饰器
```

## 定义:
 
[用于函数及方法的装饰器](https://docs.python.org/release/2.4.3/whatsnew/node6.html) (也就是@标记). 
最常见的装饰器是```@classmethod```和```@staticmethod```, 用于将常规函数转换成类方法或静态方法. 
不过, 装饰器语法也允许用户自定义装饰器. 特别地, 对于某个函数```my_decorator```, 下面的两段代码是等效的:

```
class C(object):
   @my_decorator
   def method(self):
       # method body ...
```

```
class C(object):
    def method(self):
        # method body ...
    method = my_decorator(method)
```
## 优点:
    优雅的在函数上指定一些转换. 该转换可能减少一些重复代码, 保持已有函数不变(enforce invariants), 等.



## 缺点:

    装饰器可以在函数的参数或返回值上执行任何操作, 这可能导致让人惊异的隐藏行为.
    而且, 装饰器在导入时执行. 从装饰器代码的失败中恢复更加不可能.


## 结论:
如果好处很显然, 就明智而谨慎的使用```装饰器```. ```装饰器```应该遵守和函数一样的导入和命名规则. 装饰器的```python```文档应该清晰的说明该函数是一个```装饰器```. 请为```装饰器```编写```单元测试```.

避免装饰器自身对外界的依赖(即不要依赖于文件, ```socket```, ```数据库连接```等), 因为装饰器运行时这些资源可能不可用(由 ```pydoc``` 或其它工具导入). 应该保证一个用有效参数调用的装饰器在所有情况下都是成功的.

装饰器是一种特殊形式的”顶级代码”. 参考后面关于 Main 的话题.

上一篇 [Python语言规范之词法作用域(Lexical Scoping)](https://www.imlaoa.com/blog/py3-language-style16.html)

下一篇 [Python语言规范之线程](https://www.imlaoa.com/blog/py3-language-style18.html)
