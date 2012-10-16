
$(function(){
  $('.btn-reset').click(function(){
    $('#consumer').val('');
    $('#password').val('');
  });
  $('.btn-ok').click(function(){
    if($('#consumer').val() && $('#password').val()){
      $('form').submit();
    }else{
      alert('账号密码不能为空');
    }
  });
});
