{literal}
<head>
<style type="text/css">
* { margin:0; padding: 0;}
.resume {
  width: 780px;
  margin: 20px auto;
}
table {
  width: 100%;
}
table.outer {
  width:780px;
}
table.mix td {
  width: 70px;
}
table.outer thead td {
  text-align:center;
  font-size: 25pt;
}
table.family-table thead td {
  text-align:center;
  font-size:12pt;
  border:none;
}
table.family-table td {
  width: 100px;
}
td {
  border:1px solid grey;
}
tr.extra {
  height:200px;
}
</style>
{/literal}
</head>
<div class="resume">
  <table class="outer">
    <thead>
      <tr>
        <td colspan=3>个人简历</td>
      </tr>
    </thead>
    <tr>
      <td colspan=2>
        <table class="info">
          <tr><td>姓名</td><td>{$student.name}</td></tr>
          <tr><td>性别</td><td>
          {if $student.gender==1}
            男
          {else}
            女
          {/if}
          </td></tr>
          <tr><td>身份证</td><td>{$student.id_num}</td></tr>
        </table>
      </td>
      <td>
        {if $student.pic_path}
          <img src="{$student.pic_path}"/>
        {else}
          <img src="../upload/students/default.jpg"/>
        {/if}
      </td>
    </tr>
    <tr>
      <td colspan=3>
        <table class="mix">
          <tr>
            <td>年级</td><td>{$student.grade}</td>
            <td>专业</td><td>{$student.major}</td>
            <td>联系方式</td><td>{$student.contact_num}</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr class="family">
      <td colspan=3>
      <table class="family-table">
        <thead>
          <tr><td colspan=4>家庭成员</td></tr>
        </thead>
        {foreach from=$student.family item=family}
          <tr>
            <td>{$family.id}</td>
            <td>{$family.name}</td>
            <td>{$family.relationship}</td>
            <td>{$family.contact_num}</td>
          </tr>
        {/foreach}
      </table>
      </td>
    </tr>
    <tr class="extra">
      <td colspan=3>{$student.extra}</td>
    </tr>
  </table>
</div>
