<!--
author: 老A在Coding
date: 2020-12-19
title: MySQL事务浅谈之事务正解
tags: MySQL
category: MySQL,MySQL事务
status: publish
summary: MySQL 事务
-->


[理论干货]MySQL事务浅谈之事务正解

    大家好，我是老A，今天抽时间来跟大家聊一聊事务以及事务的特性。

那么什么是MySQL事务呢？事务就是一组原子性的SQL查询，或者说一个独立

的工作单元。如果数据库引擎能够成功地对数据库应用该组查询的全部语句，

那么就执行该组语句。如果其中有任何一条语句因为崩溃或其它原因无法执行，

那么所有的语句都不会执行。也就是说，事务内的语句，要么全部执行成功，

要么全部执行失败。

那么生活中什么样的事情比较接近于我们MySQL中的事务呢？最常见的莫过于

银行存取款事件了，假设一个银行的数据库有2张表：支票(checking)表和

储蓄(savings)表。现在从用户 Jane 的支票账户转移 200 

美元到她的储蓄账户，那么需要至少三个步骤：

    1. 检查支票账户的余额高于 200 美元

    2. 从支票账户余额中减去 200 美元

    3. 在储蓄账户余额中增加 200 美元

上述三个步骤的操作必须打包在一个事务中完成，任何一个步骤发生失败，则必须回滚所有的步骤。

实际运用中我们可以使用相关命令来开启事务，操作语句以及回滚等操作。先查询下当前这个用户两张表里的数据是什么？如下图所示：

![avatar](http://static.imlaoa.com/imlaoa/affaires2.png)

那么现在我们开启一个事务来进行转账，事务 SQL 的样本如下：

![avatar](http://static.imlaoa.com/imlaoa/affairs2.png)

当然单纯的事务概念不仅于此。试想一下，如果执行到第四条语句服务器崩溃

了，会发生什么？用户可能会损失 200 美元。再加入，在执行到第三条语句

和第四条语句之间时，另外一个进程要删除支票账户的所有余额，那么结果可

能就是银行在不知道这个逻辑的情况下白白给了 Jane 200 美元。

所以运行良好的事务处理系统，必须具备 ACID 严格的测试，否则就是空谈。

    ACID 表示事务的原子性（atomicity）、一致性（consistency）
    
    、隔离性（isolation）和持久性（durability）。
    
如下图
    
![avatar](http://static.imlaoa.com/imlaoa/mysql-dry-affaires3.png)

我会在接下来的一篇文章中来讲讲事务的这四大特性。

上一篇 [[理论干货]锁策略](http://www.imlaoa.com/blog/mysql-dry-goods-lock2.html)

下一篇 [MySQL事务2浅谈之四大特性](http://www.imlaoa.com/blog/mysql-dry-four-features.html)
