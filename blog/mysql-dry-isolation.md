<!--
author: 老A在Coding
date: 2020-12-28
title: MySQL事务浅谈3之隔离级别
tags: MySQL
category: MySQL,MySQL隔离级别
status: publish
summary: MySQL 隔离级别
-->

大家好，我是老A，今天我们抽时间来了解下隔离级别。

隔离性其实比想象的要复杂。在 SQL 标准中定义了四种隔离级别，每一种级别都规定了一个事务中所作的修改，

哪些在事务内和事务间是可见的，哪些是不可见的。较低级别的隔离通常可以执行更高的并发，系统的开销也更低。

    READ UNCOMMITTED(未提交读)
```
在 READ UNCOMMITTED 级别，事务中的修改，即使没有提交，对其它事务也都是可见的。

事务可以读取未提交的数据，这也被称为脏读 (Dirty Read)。这个级别会导致很多问题，从性能上来说，

READ UNCOMMITTED 不会比其它的级别好太多，但却缺乏其它级别的很多好处，除非真的有非常必要的理由，

在实际应用中一般很少使用。
```
    READ COMMITTIED(可提交读)
```
大多数数据库系统的默认隔离级别都是 READ COMMITTED(但MySQL不是)。READ COMMITTED

满足前面提到的隔离性的简单定义：一个事务开始时，只能 "看见" 已经提交的事务所作的修改。

换句话说，一个事务从开始直到提交之前，所作的任何修改对其他事务都是不可见的。

这个级别有时候也叫做不可重复读 (nonrepeatable read)，因为两次执行同样的查询，

可能会得到不一样的结果。
```

    REPLEATABLE READ(可重复性)
```
REPLEATABLE READ 解决了脏读的问题。该级别保证了在同一个事务中多次读取同样记录的结果是一致的。但是理论上，

可重复读隔离级别还是无法解决另外一个幻读 (Phantom Read)的问题。

所谓幻读，指的是当某个事务在读取某个范围内的记录时，另外一个事务又在该范围内插入了新的记录，当之前的事务再次读取

该范围的记录时，会产生幻行(Phantom Row)。

InnoDB 和 XtraDB 存储引擎通过多版本并发控制 (MVCC,Multiversion Concurrency Control) 解决了幻读的问题。
```
    SERIALIZABLE(可串行化)
```
SERIALIZABLE 是最高的隔离级别。它通过强制事务串行执行，避免了前面说的幻读的问题。
   
简单来说，SERIALIZABLE 会在读取的每一行数据上都加锁，所以可能导致大量的超时和锁争用的问题

。实际应用中也很少用到这个隔离级别，只有在非常需要确保数据的一致性而且可以接受没有并发的

情况下，才考虑该级别
```

下图是几种隔离级别的比较。
![avatar](http://static.imlaoa.com/imlaoa/mysql-dry-isolation.png)


上一篇 [MySQL事务浅谈2之四大特性](http://www.imlaoa.com/blog/mysql-dry-four-features.html)

下一篇 [MySQL事务浅谈4之死锁](http://www.imlaoa.com/blog/mysql-dry-dead-lock.html)