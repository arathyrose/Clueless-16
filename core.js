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

}
function call_HOME(){
  //EXCECuTE PHP
  clean_HOME();
}
function toggle_HOME_2(){

}
$("document").ready(function(){
  random_movements();
  call_HOME();
});
