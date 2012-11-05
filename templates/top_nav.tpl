{config_load file="main.conf"}
<div id="header">
  <h1 id="logo">山西省<span class="green">经贸</span>学校</h1>
  <h2 id="slogan">为了更好的学生，为了更好的未来...</h2>
  <form method="post" class="searchform">
    <p>
      <input type="text" name="search_query" class="textbox" />
      <input type="submit" name="search" class="button" value="Search" />
    </p>
  </form>
  <span class="right">欢迎回来，{$smarty.cookies.consumer|default:'user'} <a href="logout.php">Logout</a></span>
</div>
