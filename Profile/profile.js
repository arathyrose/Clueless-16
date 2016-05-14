
function clean_PROFILE(){
  var filterVal = 'blur(4px)';
  $('#background').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
  document.getElementById("Heading").style.fontSize=client_window_height/8;
  document.getElementById("Heading").style.marginTop=client_window_height/15;
  document.getElementById("Heading").style.marginBottom=client_window_height/15;
  document.getElementById("Heading").style.marginLeft=client_window_width/10;
  for(var i=1;i<=3;i++){
    document.getElementById("line"+i).style.fontSize=client_window_height/40;
    document.getElementById("line"+i).style.marginTop=client_window_height/50;
    document.getElementById("line"+i).style.marginLeft=client_window_width/8;
  }
  initsidebar();
}
