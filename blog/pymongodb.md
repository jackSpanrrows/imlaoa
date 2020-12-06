<!--
author: Jack.Spanrrows
date: 2018-02-12 
title: MongoDB-python的API手记
tags: Python,MongoDB
category: Python3,MongoDB
status: publish
summary: MongoDB-python的API手记
-->

#####----------------------------------python调用MongoDB--------------------------------------

#####1.这里服务器环境是Debian8(ubuntu同下)，使用apt安装mongo

```
sudo apt-get install mongodb
```

##### 2.安装python的mongo的模块

```
sudo pip3.5 install pymongo
```


```

如有不知道的命令可以使用 mongod --help 查看帮助手册

Options:

General options:
  -h [ --help ]                    show this usage information
  --version                        show version information
  -f [ --config ] arg              configuration file specifying additional 
                                   options
  -v [ --verbose ] [=arg(=v)]      be more verbose (include multiple times for 
                                   more verbosity e.g. -vvvvv)
  --quiet                          quieter output
  --port arg                       specify port number - 27017 by default
  --bind_ip arg                    comma separated list of ip addresses to 
                                   listen on - all local ips by default
  --maxConns arg                   max number of simultaneous connections - 
                                   1000000 by default
  --logpath arg                    log file to send write to instead of stdout 
                                   - has to be a file, not directory
  --syslog                         log to system's syslog facility instead of 
                                   file or stdout
  --syslogFacility arg             syslog facility used for monogdb syslog 
                                   message
  --logappend                      append to logpath instead of over-writing
  --timeStampFormat arg            Desired format for timestamps in log 
                                   messages. One of ctime, iso8601-utc or 
                                   iso8601-local
  --pidfilepath arg                full path to pidfile (if not set, no pidfile
                                   is created)
  --keyFile arg                    private key for cluster authentication
  --setParameter arg               Set a configurable parameter
  --httpinterface                  enable http interface
  --clusterAuthMode arg            Authentication mode used for cluster 
                                   authentication. Alternatives are 
                                   (keyFile|sendKeyFile|sendX509|x509)
  --nounixsocket                   disable listening on unix sockets
  --unixSocketPrefix arg           alternative directory for UNIX domain 
                                   sockets (defaults to /tmp)
  --fork                           fork server process
  --auth                           run with security
  --noauth                         run without security
  --ipv6                           enable IPv6 support (disabled by default)
  --jsonp                          allow JSONP access via http (has security 
                                   implications)
  --rest                           turn on simple rest api
  --slowms arg (=100)              value of slow for profile and console log
  --profile arg                    0=off 1=slow, 2=all
  --cpu                            periodically show cpu and iowait utilization
  --sysinfo                        print some diagnostic system information
  --dbpath arg                     directory for datafiles - defaults to 
                                   /data/db
  --directoryperdb                 each database will be stored in a separate 
                                   directory
  --noIndexBuildRetry              don't retry any index builds that were 
                                   interrupted by shutdown
  --noprealloc                     disable data file preallocation - will often
                                   hurt performance
  --nssize arg (=16)               .ns file size (in MB) for new databases
  --quota                          limits each database to a certain number of 
                                   files (8 default)
  --quotaFiles arg                 number of files allowed per db, implies 
                                   --quota
  --smallfiles                     use a smaller default file size
  --syncdelay arg (=60)            seconds between disk syncs (0=never, but not
                                   recommended)
  --upgrade                        upgrade db if needed
  --repair                         run repair on all dbs
  --repairpath arg                 root directory for repair files - defaults 
                                   to dbpath
  --noscripting                    disable scripting engine
  --notablescan                    do not allow table scans
  --journal                        enable journaling
  --nojournal                      disable journaling (journaling is on by 
                                   default for 64 bit)
  --journalOptions arg             journal diagnostic options
  --journalCommitInterval arg      how often to group/batch commit (ms)
  --shutdown                       kill a running server (for init scripts)

Replication options:
  --oplogSize arg                  size to use (in MB) for replication op log. 
                                   default is 5% of disk space (i.e. large is 
                                   good)

Master/slave options (old; use replica sets instead):
  --master                         master mode
  --slave                          slave mode
  --source arg                     when slave: specify master as <server:port>
  --only arg                       when slave: specify a single database to 
                                   replicate
  --slavedelay arg                 specify delay (in seconds) to be used when 
                                   applying master ops to slave
  --autoresync                     automatically resync if slave data is stale

Replica set options:
  --replSet arg                    arg is <setname>[/<optionalseedhostlist>]
  --replIndexPrefetch arg          specify index prefetching behavior (if 
                                   secondary) [none|_id_only|all]

Sharding options:
  --configsvr                      declare this is a config db of a cluster; 
                                   default port 27019; default dir 
                                   /data/configdb
  --shardsvr                       declare this is a shard db of a cluster; 
                                   default port 27018

SSL options:
  --sslOnNormalPorts               use ssl on configured ports
  --sslMode arg                    set the SSL operation mode 
                                   (disabled|allowSSL|preferSSL|requireSSL)
  --sslPEMKeyFile arg              PEM file for ssl
  --sslPEMKeyPassword arg          PEM file password
  --sslClusterFile arg             Key file for internal SSL authentication
  --sslClusterPassword arg         Internal authentication key file password
  --sslCAFile arg                  Certificate Authority file for SSL
  --sslCRLFile arg                 Certificate Revocation List file for SSL
  --sslWeakCertificateValidation   allow client to connect without presenting a
                                   certificate
  --sslAllowInvalidHostnames       Allow server certificates to provide 
                                   non-matching hostnames
  --sslAllowInvalidCertificates    allow connections to servers with invalid 
                                   certificates
  --sslFIPSMode                    activate FIPS 140-2 mode at startup

Unix下启动mongo
mongod --dbpath .
进入Mongo方法：
mongo
```

####3.测试python驱动

```
#coding=utf-8

"""
测试python驱动
"""

#引用对应的包
import pymongo

#创建一个mongo客户端对象
client = pymongo.MongoClient("127.0.0.1",27017)
#获得mongoDB中的数据库对象
db = client.test_database
#在数据库中创建一个集合
collection = db.test_collectionTwo

#创建一条要加入数据库中的数据信息,json格式
post_data = {"username":"xiaohao","pwd":"123456",}

#进行数据的添加操作,inserted_id返回添加后的id编号信息
post_data_id = collection.insert_one(post_data).inserted_id

#展示一下插入的数据信息
print collection.find_one()

#打印当前数据库中所有集合的民称
print db.collection_names()

#打印当前集合中数据的信息
for item in collection.find():
    print item

#打印当前集合中数据的个数
print collection.count()

#进行find查询，并打印查询到的数据的条数
print collection.find({"username":"xiaohao"}).count()



```

#### 4.Aggregation Examples：mongoDB聚合练习

```
#coding=utf-8

'''
进行聚合aggregation 练习
'''

#引包
import pymongo

client = pymongo.MongoClient("127.0.0.1",27017)

db = client.aggregation_database

collection = db.aggregation_collection

collection.insert_many([
    {"username":"xiaohao01","pwd":"111"},
    {"username":"xiaohao02","pwd":"222"},
    {"username":"xiaohao03","pwd":"333"}
])


# for item in collection.find():
#     print item

#python中不含有son语法，需要使用son

from bson.son import SON

pipeline = [
    {"$unwind":"$pwd"},
    {"$group":{"_id":"pwd","count":{"$sum":1}}},
    {"$sort":SON([("count",-1),("_id",-1)])}
]

result = list(collection.aggregate(pipeline))

print result

```
