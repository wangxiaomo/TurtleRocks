var paginator = function(page_config){
  current = page_config.current && parseInt(page_config.current);
  total = page_config.total && parseInt(page_config.total);
  prev_text = page_config.prev_text || '前页';
  next_text = page_config.next_text || '后页';
  winglen = page_config.winglen && parseInt(page_config.winglen) || 4;

  if(total<=1){ return ""; }
  if(current>total){ current = total; }
  var paginated_html = [];
  paginated_html.push('<div class="paginator"><span class="prev">');
  if(current != 1){
    paginated_html.push('<link rel="prev" href="#" /><a href="#">&lt;' + prev_text + '</a>');
  }else{
    paginated_html.push('&lt;' + prev_text);
  }
  paginated_html.push('</span>');
  var page = function(p){
    return '<a href="#">' + p + '</a>';
  };

  break1 = current > winglen*2+2;
  break2 = total-current > winglen*2+1;
  start = break1 && Math.min(current-winglen, total-winglen*2) || 1;
  end = break2 && Math.max(current+winglen, winglen*2+1) || total;

  if(break1){
    paginated_html.push(page(1));
    paginated_html.push(page(2));
    paginated_html.push('<span class="break">...</span>');
  }
  for(var i=start;i<end+1;i++){
    if(i == current){
      paginated_html.push('<span class="thispage">' + i + '</span>');
    }else{
      paginated_html.push(page(i));
    }
  }
  if(break2){
    paginated_html.push('<span class="break">...</span>');
    paginated_html.push(page(total-1));
    paginated_html.push(page(total));
  }
  paginated_html.push('<span class="next">');
  if(current != total){
    paginated_html.push('<link rel="next" href="#" />');
    paginated_html.push('<a href="#">' + next_text + '&gt;</a>');
  }else{
    paginated_html.push(next_text + '&gt;');
  }
  paginated_html.push('</div>');
  return paginated_html.join('');
};
