<!--
author: Jack.Spanrrows
date: 2019-02-20 
title:  Python语言规范之属性(properties)
tags: Python3,风格指南,属性
category: Python3,python
status: publish
summary: Python语言规范之属性(properties)
-->

## 属性(properties)

```Tip```
```
访问和设置数据成员时, 你通常会使用简单, 轻量级的访问和设置函数. 建议用属性（properties）来代替它们.
```

## 定义:

    一种用于包装方法调用的方式. 当运算量不大, 它是获取和设置属性(attribute)的标准方式.


## 优点:
通过消除简单的属性```(attribute)```访问时显式的```get```和```set```方法调用, 可读性提高了. 允许懒惰的计算. 用```Pythonic```的方式来维护类的接口. 就性能而言, 当直接访问变量是合理的, 添加访问方法就显得琐碎而无意义. 使用属性```(properties)```可以绕过这个问题. 将来也可以在不破坏接口的情况下将访问方法加上.



## 缺点:

属性```(properties)```是在```get```和```set```方法声明后指定, 这需要使用者在接下来的代码中注意: ```set```和```get```是用于属性```(properties)```的(```除了用@property 装饰器创建的只读属性```).必须继承自```object```类. 可能隐藏比如操作符重载之类的副作用. 继承时可能会让人困惑.

## 结论:
你通常习惯于使用访问或设置方法来访问或设置数据, 它们简单而轻量. 不过我们建议你在新的代码中使用属性. 只读属性应该用 ```@property``` 装饰器 来创建.

如果子类没有覆盖属性, 那么属性的继承可能看上去不明显. 因此使用者必须确保访问方法间接被调用, 以保证子类中的重载方法被属性调用(使用模板方法设计模式).


```
Yes: import math

     class Square(object):
         """A square with two properties: a writable area and a read-only perimeter.

         To use:
         >>> sq = Square(3)
         >>> sq.area
         9
         >>> sq.perimeter
         12
         >>> sq.area = 16
         >>> sq.side
         4
         >>> sq.perimeter
         16
         """

         def __init__(self, side):
             self.side = side

         def __get_area(self):
             """Calculates the 'area' property."""
             return self.side ** 2

         def ___get_area(self):
             """Indirect accessor for 'area' property."""
             return self.__get_area()

         def __set_area(self, area):
             """Sets the 'area' property."""
             self.side = math.sqrt(area)

         def ___set_area(self, area):
             """Indirect setter for 'area' property."""
             self._SetArea(area)

         area = property(___get_area, ___set_area,
                         doc="""Gets or sets the area of the square.""")

         @property
         def perimeter(self):
             return self.side * 4
```


上一篇 [Python语言规范之默认参数值](https://www.imlaoa.com/blog/py3-language-style12.html)

下一篇 [Python语言规范之True/False的求值](https://www.imlaoa.com/blog/py3-language-style14.html)
