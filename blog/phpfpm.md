<!--
author: 老A在Coding
date: 2017-10-06 
title: FastCgi与PHP-fpm之间是个什么样的关系
tags: php,FastCgi
category: PHP
status: publish
summary: FastCgi与PHP-fpm之间是个什么样的关系
-->



```
CGI is an interface which tells the webserver how to pass data back and forth to and from an 
application.More specifically, it describes how request information is passed in environment 
variables (such as request type, remote IP address), how the reqeust body is passed in via 
standard input,and how the response is passed out via standard output.
```

首先，```CGI```是干嘛的？```CGI```是为了保证```web server```传递过来的数据是标准格式的，方便```CGI```程序的编写者。

```web server```（比如说```nginx```）只是内容的分发者。比如，如果请求```/index.html```，那么```web server```会去文件系统中找到这个文件，发送给浏览器，这里分发的是静态数据。好了，如果现在请求的是```/index.php```，根据配置文件，```nginx```知道这个不是静态文件，需要去找```PHP```解析器来处理，那么他会把这个请求简单处理后交给```PHP```解析器。```Nginx```会传哪些数据给PHP解析器呢？```url```要有吧，查询字符串也得有吧，```POST```数据也要有，```HTTP header```不能少吧，好的，```CGI```就是规定要传哪些数据、以什么样的格式传递给后方处理这个请求的协议。仔细想想，你在```PHP```代码中使用的用户从哪里来的。

当```web server```收到```/index.php```这个请求后，会启动对应的```CGI```程序，这里就是```PHP```的解析器。接下来```PHP```解析器会解析```php.ini```文件，初始化执行环境，然后处理请求，再以规定CGI规定的格式返回处理后的结果，退出进程。```web server```再把结果返回给浏览器。
好了，```CGI```是个协议，跟进程什么的没关系。那```fastcgi```又是什么呢？```Fastcgi```是用来提高```CGI```程序性能的。

提高性能，那么```CGI```程序的性能问题在哪呢？"```PHP```解析器会解析```php.ini```文件，初始化执行环境"，就是这里了。标准的CGI对每个请求都会执行这些步骤（不闲累啊！启动进程很累的说！），所以处理每个时间的时间会比较长。这明显不合理嘛！那么Fastcgi是怎么做的呢？首先，```Fastcgi```会先启一个```master```，解析配置文件，初始化执行环境，然后再启动多个```worker```。当请求过来时，```master```会传递给一个```worker```，然后立即可以接受下一个请求。这样就避免了重复的劳动，效率自然是高。而且当```worker```不够用时，```master```可以根据配置预先启动几个```worker```等着；当然空闲```worker```太多时，也会停掉一些，这样就提高了性能，也节约了资源。这就是```fastcgi```的对进程的管理。

那```PHP-FPM```又是什么呢？是一个实现了```Fastcgi```的程序，被```PHP```官方收了。

大家都知道，```PHP```的解释器是```php-cgi。php-cgi```只是个```CGI```程序，他自己本身只能解析请求，返回结果，不会进程管理（皇上，臣妾真的做不到啊！）所以就出现了一些能够调度```php-cgi```进程的程序，比如说由```lighthttpd```分离出来的```spawn-fcgi```。好了```PHP-FPM```也是这么个东东，在长时间的发展后，逐渐得到了大家的认可（要知道，前几年大家可是抱怨```PHP-FPM```稳定性太差的），也越来越流行。

网上有的说，```fastcgi```是一个协议，```php-fpm```实现了这个协议

有的说，```php-fpm```是```fastcgi```进程的管理器，用来管理```fastcgi```进程的


对。```php-fpm```的管理对象是```php-cgi```。但不能说```php-fpm```是```fastcgi```进程的管理器，因为前面说了```fastcgi```是个协议，似乎没有这么个进程存在，就算存在```php-fpm```也管理不了他（至少目前是）。 有的说，```php-fpm```是```php```内核的一个补丁

以前是对的。因为最开始的时候```php-fpm```没有包含在PHP内核里面，要使用这个功能，需要找到与源码版本相同的```php-fpm```对内核打补丁，然后再编译。后来```PHP```内核集成了```PHP-FPM```之后就方便多了，使用```--enalbe-fpm```这个编译参数即可。
有的说，修改了```php.ini```配置文件后，没办法平滑重启，所以就诞生了```php-fpm```


是的，修改```php.ini```之后，```php-cgi```进程的确是没办法平滑重启的。```php-fpm```对此的处理机制是新的```worker```用新的配置，已经存在的```worker```处理完手上的活就可以歇着了，通过这种机制来平滑过度。

还有的说：```PHP-CGI```是```PHP```自带的```FastCGI```管理器，那这样的话干吗又弄个```php-fpm```出来

不对。```php-cgi```只是解释```PHP```脚本的程序而已。

```FASTCGI：WEB服务器与处理程序之间通信的一种协议，是CGI的改进方案。```

```CGI```程序反复加载是```CGI```性能低下的主要原因，如果CGI程序保持在内存中并接受```FastCGI```进程管理器调度，则可以提供良好的性能、伸缩性、```Fail-Over```特性等。

```FASTCGI```是常驻型的```CGI```，它可以一直运行，在请求到达时，不会花费时间去```fork```一个进程来处理。

```FastCGI```是语言无关的、可伸缩架构的```CGI```开放扩展，将```CGI```解释器进程保持在内存中，以此获得较高的性能。

一般情况下，```FastCGI```的整个工作流程是这样的：

    1、Web Server启动时载入FastCGI进程管理器（IIS ISAPI或Apache Module)

    2、FastCGI进程管理器自身初始化，启动多个CGI解释器进程(可见多个php-cgi)并等待WebServer的连接。

    3、当客户端请求到达Web Server时，FastCGI进程管理器选择并连接到一个CGI解释器。 
    
       Web server将CGI环境变量和标准输入发送到FastCGI子进程php-cgi。

    4、FastCGI子进程完成处理后将标准输出和错误信息从同一连接返回Web Server。当FastCGI子进程关闭连接时，

    请求便告处理完成。

```FastCGI```子进程接着等待并处理来自```FastCGI```进程管理器(运行在```Web Server```中)的下一个连接。在```CGI```模式中，```php-cgi```在此便退出了。

```Fastcgi```是```CGI```的升级版，一种语言无关的协议，用来沟通程序(如```PHP, Python, Java```)和```Web```服务器(```Apache2, Nginx```), 理论上任何语言编写的程序都可以通过```Fastcgi```来提供```Web```服务。

```Fastcgi```的特点是会在一个进程中依次完成多个请求，以达到提高效率的目的，大多数```Fastcgi```实现都会维护一个进程池。

而```PHP-fpm```就是针对于```PHP```的，```Fastcgi```的一种实现，他负责管理一个进程池，来处理来自```Web```服务器的请求。目前，```PHP-fpm```是内置于```PHP```的。

但是```PHP-fpm```仅仅是个```PHP Fastcgi ```进程管理器”, 它仍会调用PHP解释器本身来处理请求，```PHP```解释器(在```Windows```下)就是```php-cgi.exe```.


