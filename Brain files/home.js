function clean_HOME(){
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
    setTimeout(function(){
      scroll_down();
    },4000);

}
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
