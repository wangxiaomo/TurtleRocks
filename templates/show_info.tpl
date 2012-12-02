<!doctype html>
<html lang="en">
<head>
  <title>{$student.name|escape} 的简历</title>
  <meta charset="utf-8" />
{literal}
  <style type="text/css">
* { 
  margin:0; padding:0;
  font-family:"宋体";font-size:12px;line-height:16px;color:#28b4e2;text-decoration:none;
}
a:hover {text-decoration:underline}
img { border: 1px solid #808A87; }
ul { list-style-type: none; margin-top:-15px; margin-bottom:-30px;}
li { margin-top:-25px;margin-bottom:0px; padding-left:20px;}
#page {
  width:780px;
  margin:25px auto;
}
#left {
  float:right;
  width:60%;
  text-align: right;
  padding-right: 100px;
}
#right {
  float:left;
  margin-top:20px;
  width:200px;
  border-right: 1px solid #EEE;
}
#code div {
  margin-top:20px;
  color:black;
  word-break: break-all;
  text-align:left;
  font-size:18pt;
  line-height: 27px;
}
#code .right-status {
  text-align: right;
  font-size: 9pt;
  color: red;
}
#user_info {
  margin-top:20px;
}
  </style>
{/literal}
</head>
<body>
<div id="page">
  <div id="left">
    <div>
    
    </div>
    <div id="code">
      <div class="right-status">
个人信息尽可能的丰富些.方便企业了解你.会得到意想不到的效果哦!!!
      </div>
      <div>
{$student.extra}
      </div>
    </div>
  </div>
  <div id="right">
    <div id="infobox">
      {if $student.pic_path}
          <img src="{$student.pic_path}" width=120 height=160/>
        {else}
          <img src="../upload/students/default.jpg" width=120 height=160/>
      {/if}
      <div id="user_info">
        姓名:{$student.name}
        <br />
        性别:
        {if $student.gender==1}
            男
          {else}
            女
        {/if}
        <br />
        身份证:{$student.id_num}
        <br />
        年级:{$student.grade}
        <br />
        专业:{$student.major}
        <br />
        联系方式:{$student.contact_num}
      </div>
      <div id="user_intro">
        <pre>



家庭关系:
{foreach from=$student.family item=family}
    <ul>
      <li>姓名:{$family.name}</li>
      <li>关系:{$family.relationship}</li>
      <li>联系方式:{$family.contact_num}</li>
    </ul>
{foreachelse}
    暂无信息
{/foreach}

        </pre> 
      </div>
    </div>
  </div>
</div>
</body>
</html>