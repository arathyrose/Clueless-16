var client_window_height=900;
var client_window_width=1400;
function clean_HOME(){
  document.getElementById("Heading").style.fontSize=client_window_height/4;
  document.getElementById("Heading").style.marginTop=client_window_height/8;
  document.getElementById("Heading").style.marginLeft=client_window_width/20;
  document.getElementById("tathva_man").style.width=client_window_width/10;
  document.getElementById("tathva_man").style.height=client_window_height/7;
  document.getElementById("tathva").style.left=client_window_width/30;
  document.getElementById("cpr").style.left=client_window_width/2.7;
  document.getElementById("HOME_2").style.top=client_window_height;
  document.getElementById("HOME2_Text").style.fontSize=client_window_height/10;
  document.getElementById("HOME2_Text2").style.fontSize=client_window_height/15;
  document.getElementById("HOME2_Text").style.marginLeft=client_window_width/10;
  document.getElementById("HOME2_Text2").style.marginLeft=client_window_width/6;
  document.getElementById("HOME2_Text2").style.marginTop=client_window_height/15;
  document.getElementById("HOME2_Text2").style.marginBottom=client_window_height/15;
  document.getElementById("fb_button").style.marginLeft=client_window_width*2/3;
}
function call_HOME(){
  //EXCECuTE PHP
  clean_HOME();
}
var toggle=0;
function toggle_HOME_2(){
  if(toggle==0){
    move_background_up();
    $("#Heading").animate({
          marginTop:"-500px"
    },2000,function(){});
    $( "#tathva" ).animate({
       left: (((client_window_width*24)/30)-10)+"px"
     }, 2000, function() {
    });
    $( "#tathva_man" ).animate({
       left: (((client_window_width*23)/30)-10)+"px"
     }, 2000, function() {
    });
    $( "#HOME_2" ).animate({
       top: "100px"
     }, 2000, function() {
    });
  }
  if(toggle==1){
    move_background_down();
    $("#Heading").animate({
        marginTop:(client_window_height/8)+"px"
    },2000,function(){});
    $( "#tathva" ).animate({
       left: client_window_width/30+"px"
     }, 2000, function() {
    });
    $( "#tathva_man" ).animate({
       left: client_window_width/40+"px"
     }, 2000, function() {
    });
    $( "#HOME_2" ).animate({
       top: client_window_height+"px"
     }, 2000, function() {
    });
  }
}
$("document").ready(function(){
  random_movements();
  call_HOME();
});
