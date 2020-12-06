<!--
author: 老A在Coding
date: 2019-01-30 
title: Python语言规范之包
tags: Python3,风格指南
category: Python3,python
status: publish
summary: Python语言规范之包
-->

## 包

```Tip```
```
使用模块的全路径名来导入每个模块
```

## 定义:
```
避免模块名冲突. 查找包更容易.
```

## 优点:
```
避免模块名冲突. 查找包更容易.
```

## 缺点:
```
部署代码变难, 因为你必须复制包层次.
```
## 结论:

```所有的新代码都应该用完整包名来导入每个模块.```

```
应该像下面这样导入:


# Reference in code with complete name.
import sound.effects.echo

# Reference in code with just module name (preferred).
from sound.effects import echo
```

上一篇 [Python语言规范之导入](http://www.imlaoa.com/blog/py3-language-style2.html)

下一篇 [Python语言规范之异常](http://www.imlaoa.com/blog/py3-language-style4.html)
