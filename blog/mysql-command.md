<!--
author: 老A在Coding
date: 2019-01-26 
title: MySQL常用命令行参数查询
tags: mysql
category: MySQL
status: publish
summary: MySQL常用命令行参数查询
-->

```show status like '%Handler_read_rnd%';```
```
+-----------------------+-------+
| Variable_name         | Value |
+-----------------------+-------+
| Handler_read_rnd      | 0     |
| Handler_read_rnd_next | 54    |
+-----------------------+-------+
2 rows in set (0.01 sec)
```

```show status like '%Created_tmp%';```

```
+-------------------------+-------+
| Variable_name           | Value |
+-------------------------+-------+
| Created_tmp_disk_tables | 0     |
| Created_tmp_files       | 6     |
| Created_tmp_tables      | 5     |
+-------------------------+-------+
```
```show status like '%Threads_created%';```
```
+-----------------+-------+
| Variable_name   | Value |
+-----------------+-------+
| Threads_created | 6     |
+-----------------+-------+
1 row in set (0.01 sec)
```

```SHOW STATUS LIKE 'key_read%';```

```
+-------------------+-------+
| Variable_name     | Value |
+-------------------+-------+
| Key_read_requests | 0     |
| Key_reads         | 0     |
+-------------------+-------+
2 rows in set (0.02 sec)
```

```show variables like '%key_buffer_size%';```
```
+-----------------+------------+
| Variable_name   | Value      |
+-----------------+------------+
| key_buffer_size | 2147483648 |
+-----------------+------------+
1 row in set (0.00 sec)
```

```show status like '%Qcache%';```
```
+-------------------------+----------+
| Variable_name           | Value    |
+-------------------------+----------+
| Qcache_free_blocks      | 1        |
| Qcache_free_memory      | 52273208 |
| Qcache_hits             | 88       |
| Qcache_inserts          | 191      |
| Qcache_lowmem_prunes    | 0        |
| Qcache_not_cached       | 259      |
| Qcache_queries_in_cache | 117      |
| Qcache_total_blocks     | 247      |
+-------------------------+----------+
8 rows in set (0.00 sec)
```

```show variables like "wait_timeout";```
```
+---------------+-------+
| Variable_name | Value |
+---------------+-------+
| wait_timeout  | 28800 |
+---------------+-------+
1 row in set (0.19 sec)
```
```show variables like "open_files_limit%";```
```
+------------------+---------+
| Variable_name    | Value   |
+------------------+---------+
| open_files_limit | 1048576 |
+------------------+---------+
1 row in set (0.00 sec)
```

```show variables like "thread_%";```
```
+-------------------+---------------------------+
| Variable_name     | Value                     |
+-------------------+---------------------------+
| thread_cache_size | 9                         |
| thread_handling   | one-thread-per-connection |
| thread_stack      | 262144                    |
+-------------------+---------------------------+
3 rows in set (0.00 sec)

```
```show variables like"innodb_additional_mem_pool_size";```

```show variables like "innodb_thread_concurrency";```
```
+---------------------------+-------+
| Variable_name             | Value |
+---------------------------+-------+
| innodb_thread_concurrency | 0     |
+---------------------------+-------+
1 row in set (0.00 sec)

```
```show status like '%Qcache%';```
```
+-------------------------+---------+
| Variable_name           | Value   |
+-------------------------+---------+
| Qcache_free_blocks      | 1       |
| Qcache_free_memory      | 1031832 |
| Qcache_hits             | 0       |
| Qcache_inserts          | 0       |
| Qcache_lowmem_prunes    | 0       |
| Qcache_not_cached       | 2       |
| Qcache_queries_in_cache | 0       |
| Qcache_total_blocks     | 1       |
+-------------------------+---------+
8 rows in set (0.03 sec)

```
``` SELECT @@max_heap_table_size;```
```
+-----------------------+
| @@max_heap_table_size |
+-----------------------+
|              16777216 |
+-----------------------+
1 row in set (0.00 sec)
```

``` show variables like "%slow%";```
```
+---------------------------+--------------------------------------+
| Variable_name             | Value                                |
+---------------------------+--------------------------------------+
| log_slow_admin_statements | OFF                                  |
| log_slow_slave_statements | OFF                                  |
| slow_launch_time          | 2                                    |
| slow_query_log            | OFF                                  |
| slow_query_log_file       | /var/lib/mysql/1a5c68703afe-slow.log |
+---------------------------+--------------------------------------+
5 rows in set (0.01 sec)
```