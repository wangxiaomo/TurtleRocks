# TurtleRocks #

+ 目录结构

  - downloads 乱七八糟的一些文件，比如说下载下来的库文件之类的。
  - utils 一些辅助脚本等，比如初始化数据库之类的。
  - static 存放一些 js,css 类文件.
  - libs 存放库文件。
  - configs 存放 Smarty 配置文件
  - templates 存放模板文件
  - templates\_c 存放模板编译好的文件（可以忽略）
  - cache 存放 Smarty 缓存文件（可以忽略）
  - src 存放核心 php 文件

+ 部分核心库调用方式

  - Smarty

      Smarty 库文件位于 libs/Smarty 下，调用脚本为 libs/smarty.php，通过配置变量，然后实例化
      MySmarty 就初始化好 Smarty 了。示例：

            <?php
            require('./libs/smarty.php');
            $smarty = new MySmarty;
            $smarty->assign('name', 'xiaomo');
            $smarty->display('index.tpl');
            ?>

  - DB

      DB 库文件位于 libs/DB 下，调用脚本是 libs/db.php，通过配置变量，然后实例化 DB 就初始化好
      DB 了。DB 采用的是 PHPLIB db\_mysql.inc，所以详细调用过程请参见 PHPLIB MANUAL。示例：

            <?php
            require('./libs/db.php');
            $db = new DB;
            $db->connect();
            $query = 'SELECT * FROM table';
            $db->query($query);
            while($db->next_record()){
              echo $db->f('name');
              echo $db->f('gender');
            }
            $db->free();
            ?>

+ static js and css

  js 主要使用 Jquery lastest.css 使用 less 来编写，之后进行编译。

+ 保证 cache 和 templates\_c 有写权限*important*

+ dbname: turtlerock. dbuser: turtlerock. dbpass: turtlerock

+ Life Goes On.Go Go DolphinQ.

后续
-----------------

+ LoginPage 在 IE 下定位有问题
+ 修改部分页面样式 
+ 用户 Upload 头像 Done
+ 填充真实数据 Done

Update 2012/11/14 00:26
------------------

+ 添加了 wysihtml5 editor
+ 就是不想往页面加 paginator 啊.好烦...

Update 2012/12/10 16:11
------------------

+ Fix IE6 Tricks.
