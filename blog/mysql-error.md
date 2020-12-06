<!--
author: 老A在Coding
date: 2018-08-06 
title: [原创][MySQL] specified key was too long max key length is 767bytes
tags: MySQL specified 767bytes
category: MySQL
status: publish
summary: [原创][MySQL] specified key was too long max key length is 767bytes
-->

```
[原创]
1. 问题描述 (当前mysql版本为5.6.3以下)
mysql导入dump文件发生错误，错误提示[specified key was too long max key length is 767bytes]

  查阅相关资料,发现导致这种问题发生的原因有以下几点：

  1).数据库表采用utf8mb4编码，其中varchar(255)的column进行了唯一键索引,而mysql默认情况下

  单个列的索引不能超过767位(不同版本可能存在差异)

  2).表引擎选用的InnoDB,定义索引长度过长导致,为什么说过长呢，我给大家算算哈！已知不超过最大长度为767,

  已知utf8一个长度占用3个字节而utf8mb4一个长度占4个字节，所以这里可以计算767/4=191.75,而767/3=255从结果

  可以看出utf8mb4最大的长度应该取值在192以内,而utf8长度在255以内,所以找到原因就很好解决此问题了
```
```
2.解决建议:

　1.使用InnoDB引擎;

  2.启用innodb_large_prefix选项,将约束项扩展至3072byte;

  3.重新创建数据库及表
```
```    
my.cnf配置：
    
default-storage-engine=INNODB

innodb_large_prefix=on
```

```
即选择字符编码utf8mb4不超过191个长度而utf8不超过255 个长度

所以定义类型的时候要定义好长度因此字符集为 utf8mb4 时，将 所建立字段索引前缀长度控制在 768 以内即可成功

创建索引
```