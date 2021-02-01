<!--
author: 老A在Coding
date: 2021-2-1
title: MySQL中的事务
tags: MySQL
category: MySQL,事务
status: publish
summary: MySQL 事务
-->

###```MySQL中的事务```
```MySQL``` 提供了两种事务型的存储引擎：```InnoDB``` 和 ```NDB Cluster```。另外还有一些第三方存储引擎也支持事务，比较知名的包括 ```XtraDB``` 和 ```PBXT```。

#### 自动提交(```AUTOCOMMIT```)

```MySQL``` 默认采用自动提交(```AUTOCOMMIT```) 模式。也就是说，如果不是显式地开始一个事务，则每个查询都被当做一个事务执行提交操作。在当前连接中，可以通过设置 ```AUTOCOMMIT` ``变量来启用或者禁用自动提交模式：
![avatar](http://static.imlaoa.com/imlaoa/auto_commit.png)

1 或者 ```ON``` 表示启用，```0``` 或者 ```OFF``` 表示禁用。当 ```AUTOCOMMIT=0``` 时，所有的查询都是在一个事务中，直到显式地执行 ```COMMIT``` 提交或者 ```ROLLBACK``` 回滚，该事务结束，同时又开始了另一个新事务。修改 ```AUTOCOMMIT``` 对非事务型的表，比如 ```MyISAM``` 或者内存表，不会有任何影响。对这类表来说，没有 ```COMMIT``` 或者 ```ROLLBACK``` 的概念，也就是说是相当于一只处于 ```AUTOCOMMIT``` 启用的模式。


MySQL 可以通过执行 SET TRANSACTION ISOLATION LEVEL 命令来设置隔离级别。新的隔离级别会在下一个事务开始的时候生效。可以在配置文件中设置整个数据库的隔离级别，也可以只改变当前会话的隔离级别：
![avatar](http://static.imlaoa.com/imlaoa/set_session_command.png)

```MySQL``` 能够识别所有的 4 个 ```ANSI``` 隔离级别，```InnoDB``` 引擎也支持所有的隔离级别。

#### 在事务中混合使用存储引擎
```MySQL``` 服务器层不管理事务，事务是由下层的存储引擎实现的。所以在同一个事务中，使用多种存储引擎是不可靠的。

如果在事务中混合使用了事务型和非事务型的表（例如 ```InnoDB``` 和 ```MyISAM``` 表），在正常提交的情况下不会有什么问题。

但如果该事务需要回滚，非事务型的表上的变更就无法撤销，这会导致数据库处于不一致的状态，这种情况很难修复，事务的最终结果将无法确定。所以，为每张表选择合适的存储引擎非常重要。

#### 隐式和显式锁定
```InnoDB``` 采用的是两阶段锁定协议（```two-phase locking protocol```）。在事务执行过程中，随时都可以执行锁定，锁只有在执行 COMMIT 或者 ROLLBACK 的时候才会释放，并且所有的锁是在同一时刻被释放。前面描述的锁定都是隐式锁定，InnoDB 会根据隔离级别在需要的时候自动加锁。

    另外，InnoDB 也支持通过特定的语句进行显式锁定，这些语句不属于 SQL 范畴：
    1、 SELECT ... LOCK IN SHARE MODE
    2、 SELECT ... FOR UPDATE
   
```MySQL``` 也支持 ```LOCK TABLES``` 和 ```UNLOCK TABLES``` 语句，这是在服务器层实现的，和存储引擎无关。它们有自己的用途，但并不能替代事务处理。如果应用需要用到事务，还是应该选择事务型存储引擎。

上一篇 [MySQL事务浅谈4之死锁](http://www.imlaoa.com/blog/mysql-dry-dead-lock.html)

