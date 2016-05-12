var client_window_height=900;
var client_window_width=1400;
var main_color="#BFFF00";
var background_color="#000";
var scroll_over=true;
function clean_HOME(){
  //SET COLORS
/*  document.getElementById("Heading").style.color=main_color;
  document.getElementById("tathva_man").style.color=main_color;
  document.getElementById("tathva").style.color=main_color;
  document.getElementById("cpr").style.color=main_color;
  document.getElementById("HOME_2").style.color=main_color;*/
  //SET POSITIONS
  document.getElementById("Heading").style.fontSize=client_window_height/4;
  document.getElementById("Heading").style.marginTop=client_window_height/8;
  document.getElementById("Heading").style.marginLeft=client_window_width/20;
  document.getElementById("tathva_man").style.width=client_window_width/10;
  document.getElementById("tathva_man").style.height=client_window_height/7;
  document.getElementById("tathva").style.left=client_window_width/30;
  document.getElementById("cpr").style.left=client_window_width/2.7;
  document.getElementById("HOME_2").style.top=client_window_height*3;
  document.getElementById("HOME2_Text").style.fontSize=client_window_height/10;
  document.getElementById("HOME2_Text2").style.fontSize=client_window_height/15;
  document.getElementById("HOME2_Text").style.marginLeft=client_window_width/10;
  document.getElementById("HOME2_Text2").style.marginLeft=client_window_width/6;
  document.getElementById("HOME2_Text2").style.marginTop=client_window_height/15;
  document.getElementById("HOME2_Text2").style.marginBottom=client_window_height/15;
  document.getElementById("fb_button").style.marginLeft=client_window_width*2/3;
}

function update_colors(){
  document.getElementById('main_page').style.color=main_color;
    document.getElementById('background').style.color=main_color;

    main_color="rgb("+((Date.now()%70)+180)+","+((Date.now()%70)+180)+","+((Date.now()%70)+70)+")";
}




function call_HOME(){
  //EXCECuTE PHP
  clean_HOME();

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
$("document").ready(function(){
  random_movements();
  update_colors();
  setInterval(function(){update_colors();},1000/60);
  call_HOME();
});
