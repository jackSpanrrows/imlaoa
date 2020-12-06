<!--
author: 老A在Coding
date: 2020-11-15
title: Python安装模块那点破事
tags: Python3,模块
category: Python3,python
status: publish
summary: Python安装模块那点破事
-->


今天终于空下来给大家分享我的心得了，这几天忙的不可开交一直抽不出时间琢磨文章

给大家分享，今天我来跟大家聊一聊Python安装模块那点事。


  我们都知道Python经历了多灾多难的2时代又进入了高速发展的3版本时代，

版本的差异导致了很多兼容性的问题发生，比如2时代的print ""

就可以打印数据，到了3时代就必须是print()打印了，当然这跟今天的主题没多

大关系，我们还是言归正传，来聊一聊安装模块。


##### python2时代的模块大致分为4种方式:


```
1) 是将文件复制到$python_dir/Lib 下
2) 使用 Python setup.py install 方式
3) 使用easy_install 安装方式
4) 就是最常用的 pip安装方式了 方便快捷
```

我们再来聊一聊Python3模块的几种安装方式，老A亲身体会过从python2.7-3.8的版本迭代带来的安装模块的便捷，在python2版本的时候大家最常用的肯定是 pip install  module 安装方式，但是到了 3.5 以上版本，那就简单了，把需要的模块以及版本号放到requirements.txt文件里，如下例子：
```
BeautifulSoup==3.2.0
Django==1.3
Fabric==1.2.0
Jinja2==2.5.5
PyYAML==3.09
Pygments==1.4
SQLAlchemy==0.7.1
South==0.7.3
amqplib==0.6.1
anyjson==0.3
...
```
那么我们的安装方式就是这样的
```
pip install -r /path/to/requirements.txt
```
就是如此简单直接等着安装就行了，我给大家截图看看我安装的示例
![avatar](http://static.imlaoa.com/imlaoa/py3_install1.png)

这里要提醒下大家安装之前一定要确认自己的python版本号和pip版本号是不是一致，避免出现多个版本共存情况下安装到其它版本里去了。如下图所示
![avatar](http://static.imlaoa.com/imlaoa/py3_install3.png)

下面开始安装了如下图所示
![avatar](http://static.imlaoa.com/imlaoa/py3_install4.png)
到这里安装便完成了。

感谢大家来看老A分享的技术心得，如果你觉得还可以的话麻烦帮忙分享下，老A在这里祝各位周末愉快。

上一篇 [Python语言规范之威力过大的特性](http://www.imlaoa.com/blog/py3-language-style19.html)

下一篇 [[理论干货]MySQL逻辑架构](http://www.imlaoa.com/blog/mysql-dry-goods-logic.html)