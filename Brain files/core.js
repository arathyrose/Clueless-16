var client_window_height=900;
var client_window_width=1400;
var main_color="#FFFF00";
var background_color="#000";
var scroll_over=true;
var mobile_mode=0;
function gototathva(){
  window.location.href="http://www.tathva.org";
}
function update_colors(){
  document.getElementById('content').style.color=main_color;
    document.getElementById('background').style.color=main_color;
    main_color="rgb("+((Date.now()%50)+205)+","+((Date.now()%50)+205)+",0)";
}
var toggle=0;
function scroll_down(){
  move_background_up();

}
function scroll_up(){
  move_background_down();
}
function toggle_HOME_2(){
  if(toggle==1){
    scroll_up();
  }
  if(toggle==0){
    scroll_down();
  }
}
function callsidebar(){
  var filterVal = 'blur(4px)';
  $('#page_data').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
  $("#tathva_sidebar").fadeIn();
  $("#sidebar").animate({
      left:"0px"
  },500,function(){});
}
function closesidebar(){
  var filterVal = 'blur(0px)';

  $('#page_data').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
$("#tathva_sidebar").fadeOut();
  $("#sidebar").animate({
      left:"-"+client_window_width+"px"
  },500,function(){});
}

function initsidebar(){
  document.getElementById("sidebar").style.position="fixed";
  document.getElementById("sidebar").style.left="-500px";
  document.getElementById("sidebar").style.top="0px";
  document.getElementById("sidebar").style.width=client_window_width/5+"px";
  document.getElementById("sidebar").style.height=client_window_height+"px";
  document.getElementById("sidebar").style.backgroundColor="#ff0";
  document.getElementById("sidebar").style.color="#000";
  document.getElementById("sidebar_trigger_content").style.position="fixed";
  document.getElementById("sidebar_trigger_content").style.top=client_window_height/8;
  document.getElementById("sidebar_trigger_content").style.left=client_window_width/25;
  document.getElementById("sidebar_trigger_content").style.width=client_window_width/30;
  document.getElementById("sidebar_trigger_content").style.height=client_window_height/18;
  document.getElementById("sidebar_trigger_sidebar").style.marginTop=client_window_height/8;
  document.getElementById("sidebar_trigger_sidebar").style.marginLeft=client_window_width/20;
  document.getElementById("sidebar_trigger_sidebar").style.width=client_window_width/30;
  document.getElementById("sidebar_trigger_sidebar").style.height=client_window_height/18;
  document.getElementById("sidebar_trigger_sidebar").style.marginBottom=client_window_height/18;
  for(var i=0;i<=5;i++){
    document.getElementById("link"+i).style.fontSize=client_window_height/40;
    document.getElementById("link"+i).style.marginTop=client_window_height/50;
    document.getElementById("link"+i).style.marginLeft=client_window_width/20;
  }
  document.getElementById("tathva_sidebar").style.position="fixed";
  document.getElementById("tathva_sidebar").style.display="none";
  document.getElementById("tathva_sidebar").style.left="10px";
  document.getElementById("tathva_sidebar").style.bottom="10px";
  document.getElementById("tathva_sidebar").style.width=client_window_width/10+"px";
  document.getElementById("tathva_sidebar").style.height=client_window_height/7+"px";
}


$("document").ready(function(){
  mobile_mode=1;
  if(navigator.userAgent.search("Mobile")==-1){
    mobile_mode=0;
  }
  if(mobile_mode==1){
    alert("MOBILE");
  }

  background_init();
    update_colors();
  if(mobile_mode==0){
  setInterval(function(){update_colors();},1000/60);
  }
});
