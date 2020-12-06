<!--
author: Jack.Spanrrows
date: 2019-01-25 
title: Python日期格式化知识
tags: Python3,datetime
category: Python3,python
status: publish
summary: Python日期格式化知识
-->

最近在开发Python项目中经常会使用datetime模块，对日期进行转换，现在抽点时间整理了下日期模块的一些常用知识。
Python 中能用很多方式处理日期和时间，转换日期格式是一个常见的功能。
Python 提供了一个 time 和 calendar 模块可以用于格式化日期和时间。时间间隔是以秒为单位的浮点小数。
每个时间戳都以自从格林威治时间1970年01月01日00时00分00秒起经过了多长时间来表示。

##### 1、基本方法
获取当前日期：```time.time()```

获取元组形式的时间戳：```time.local(time.time())```

格式化日期的函数(基于元组的形式进行格式化)：

```（1）time.asctime(time.local(time.time()))```

```（2）time.strftime(format[,t])```

将格式字符串转换为时间戳：

```time.strptime(str,fmt='%a %b %d %H:%M:%S %Y')```

延迟执行：```time.sleep([secs])```，单位为秒

##### 2、格式化符号
python中时间日期格式化符号：

```
%y 两位数的年份表示（00-99）

%Y 四位数的年份表示（000-9999）

%m 月份（01-12）

%d 月内中的一天（0-31）

%H 24小时制小时数（0-23）

%I 12小时制小时数（01-12） 

%M 分钟数（00=59）

%S 秒（00-59）

%a 本地简化星期名称

%A 本地完整星期名称

%b 本地简化的月份名称

%B 本地完整的月份名称

%c 本地相应的日期表示和时间表示

%j 年内的一天（001-366）

%p 本地A.M.或P.M.的等价符

%U 一年中的星期数（00-53）星期天为星期的开始

%w 星期（0-6），星期天为星期的开始

%W 一年中的星期数（00-53）星期一为星期的开始

%x 本地相应的日期表示

%X 本地相应的时间表示

%Z 当前时区的名称

%% %号本身 

```


##### 常用方法
###### 3.1、将字符串的时间转换为时间戳
###### 方法

```
import time 
t = "2017-11-24 17:30:00"
#将其转换为时间数组 
timeStruct = time.strptime(t, "%Y-%m-%d %H:%M:%S") 
#转换为时间戳: 
timeStamp = int(time.mktime(timeStruct)) 
print(timeStamp)

```

运行结果:```1511515800```

###### 3.2、时间戳转换为指定格式日期

```
timeStamp = 1511515800
localTime = time.localtime(timeStamp) 
strTime = time.strftime("%Y-%m-%d %H:%M:%S", localTime) 
print(strTime)
```

运行结果:```2017-11-24 17:30:00```

###### 3.3、格式切换

把-分割格式2017-11-24 17:30:00  转换为斜杠分割格式


```
import time 
t = "2017-11-24 17:30:00"
#先转换为时间数组,然后转换为其他格式 
timeStruct = time.strptime(t, "%Y-%m-%d %H:%M:%S") 
strTime = time.strftime("%Y/%m/%d %H:%M:%S", timeStruct) 
print(strTime)
```
运行结果:```2017/11/24 17:30:00```

###### 3.4、获取当前时间并转换为指定日期格式

```
import time 
#获得当前时间时间戳 
now = int(time.time()) 
#转换为其他日期格式,如:"%Y-%m-%d %H:%M:%S" 
timeStruct = time.localtime(now) 
strTime = time.strftime("%Y-%m-%d %H:%M:%S", timeStruct) 
print(strTime)
```

运行结果: ```2017-11-24 18:36:57```


###### 3.5、获得三天前的时间的方法
```
import time 
import datetime 
#先获得时间数组格式的日期 
threeDayAgo = (datetime.datetime.now() - datetime.timedelta(days = 3)) 
#转换为时间戳: 
timeStamp = int(time.mktime(threeDayAgo.timetuple())) 
#转换为其他字符串格式: 
strTime = threeDayAgo.strftime("%Y-%m-%d %H:%M:%S") 
print(strTime)
```

运行结果: ```2017-11-21 18:42:52```

注: ```timedelta()的参数有:days,hours,seconds,microseconds```


###### 3.6、`使用datetime模块来获取当前的日期和时间
```
import datetime 
i = datetime.datetime.now() 
print ("当前的日期和时间是 %s" % i) 
print ("ISO格式的日期和时间是 %s" % i.isoformat() ) 
print ("当前的年份是 %s" %i.year) 
print ("当前的月份是 %s" %i.month) 
print ("当前的日期是 %s" %i.day) 
print ("dd/mm/yyyy 格式是  %s/%s/%s" % (i.day, i.month, i.year) ) 
print ("当前小时是 %s" %i.hour) 
print ("当前分钟是 %s" %i.minute) 
print ("当前秒是  %s" %i.second)
```