{config_load file="main.conf"}
<!DOCTYPE html>
<html lang="en">
<head>
{include file="header.tpl"}
<link href="{#STATIC_DIR#}/less/login.less" rel="stylesheet/less" type="text/css">
<script type="text/javascript" src="{#STATIC_DIR#}/js/libs/less.min.js"></script>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <h1><a href="#">经贸学校实习管理</a></h1>
    </div>
    <div class="content rounded">
      <header class="hero">
        <hgroup>
          <h1>使用账号密码登陆</h1>
        </hgroup>
      </header>
      <div id="ds_container">
        <form method="POST">
          <table cellpadding="0" cellspacing="0" border="0" width="273">
            <tbody>
              <tr valign="top">
                <td align="left">
                  <label for="consumer"><span>账号:</span></label>
                </td>
                <td align="left">
                  <input type="text" id="consumer" name="consumer" placeholder="账号..." />
                </td>
              </tr>
              <tr valign="top">
                <td align="left">
                  <label for="password"><span>密码:</span></label>
                </td>
                <td align="left">
                  <input type="password" id="password" name="password" placeholder="密码..." />
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <font color="red">{$err_msg}</font>
      <div class="my-btn-group">
        <button type="button" class="btn btn-large btn-reset"><span>重置</span></button>
        <button type="button" class="btn btn-large btn-primary btn-ok"><span>登陆</span></button>
      </div>
    </div>
    <div class="login_footer">
      {include file="footer.tpl"}
    </div>
  </div>
</body>
<script type="text/javascript" src="{#STATIC_DIR#}/js/login.js"></script>
</html>
