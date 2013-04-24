<img src="{#STATIC_DIR#}/images/headerphoto.jpg" width="820" height="120" alt="headerphoto" class="no-border" />
<div id="sidebar" >
  <h1>宗旨</h1>
  <p style="text-indent:2em;">为了更好的学生，为了更好的未来...当代教师之义不容辞!</p>
  <p class="align-right">- xxx 2012.04</p>
  <h1>功能导航</h1>
  <ul class="sidemenu">
    <li><a href="index.php">首页</a></li>
  {foreach from=$navs item=nav}
    <li><a href="{$nav.url}">{$nav.meta}</a></li>
  {/foreach}
    <li><a href="logout.php">退出</a></li>
  </ul>
  <h1>友情链接</h1>
  <ul class="sidemenu">
    <li><a href="#">友情链接1</a></li>
    <li><a href="#">友情链接2</a></li>
    <li><a href="#">友情链接3</a></li>
    <li><a href="#">友情链接4</a></li>
    <li><a href="#">友情链接5</a></li>
  </ul>
  <div style="height:50px;">&nbsp;</div>
</div>
