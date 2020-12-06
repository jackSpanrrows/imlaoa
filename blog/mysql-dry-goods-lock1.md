<!--
author: 老A在Coding
date: 2020-12-5
title: [理论干货]MySQL锁粒度
tags: MySQL,干货,锁粒度
category: MySQL,锁粒度
status: publish
summary: MySQL锁粒度
-->

##### 今天跟大家聊一聊锁的概念性问题，什么是锁，锁又分为几种，几种锁又有什么区别呢？

1、概念

    读锁是共享的，或者说是相互不阻塞的。多个客户在同一时刻可以同时读
    
    取同一个资源，而互不干扰。写锁则是排他的，也就是说一个写锁会阻塞
    
    其它的写锁和读锁，这是出于安全策略的考虑，只有这样，才能确保在给
    
    定的时间里， 只有一个用户能执行写入，并防止其它用户读取正在写入
    的同一资源。
    
    在实际的数据库系统中，每时每刻都在发生锁定，当某个用户在修改某一部分数据时，MySQL 
    
    会通过锁定防止其它用户读取同一数据。大多数时候，MySQL 锁的内部管理是透明的。
    

2、锁粒度

    一种提高共享资源并发性的方式就是让锁定对象更有选择性。尽管只锁定需要修改的部分数据，而不是所
    
    有的资源。更理想的方式是，只对会修改的数据片进行精确的锁定。任何时候，在给定的资源上，锁定的
    
    数据量越少，则系统的并发程度越高，只要相互之间不发生冲突即可。
    
    问题是加锁也需要消耗资源。锁的各种操作，包括获得锁、检查锁是否已经解除、释放锁等，都会增加系
    
    统的开销。如果系统花费大量的时间来管理锁，而不是存取数据，那么系统的性能可能会因此受到影响。
    
    所谓的锁策略，就是在锁的开销和数据的安全性之间寻求平衡，这种平衡当然也会影响到性能。大多数商
    
    业数据库系统没有提供更多的选择，一般都是在表上施加行级锁（row-level lock），并以各种负责
    
    的方式来实现，以便在锁比较多的情况下尽可能的提供更好的性能。
    
    而 MySQL 则提供了多重选择。每种 MySQL 存储引擎都可以实现自己的锁策略和锁粒度。在存储引擎
    
    的设计中，锁管理是个非常重要的决定。将锁粒度固定在某个级别，可以为某些特定的应用场景提供更好
    
    的性能，但同时却会失去对另外一些应用场景的良好支持。好在 MySQL 支持多个存储引擎的架构，所以
    
    不需要单一的通用解决方案。
 
 
 
上一篇 [MySQL逻辑架构](http://www.imlaoa.com/blog/mysql-dry-goods-logic.html)

下一篇 [[理论干货]锁策略](http://www.imlaoa.com/blog/mysql-dry-goods-lock2.html)