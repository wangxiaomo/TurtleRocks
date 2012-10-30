$(function(){
  $('#submit').click(function(e){
    e.preventDefault();
    $('form').submit();
  });
  $('#reset').click(function(e){
    e.preventDefault();
    window.location.reload();
    return false;
  });
});
