function background_init(){
  console.log("STARTED CREATING");
  document.body.style.backgroundColor=background_color;
  var background=$('#background');
  var height=background.height();
  //AFTER GETTING THE HEIGHT, DECIDE NUMBER OF HORIZONTAL BANDS
  var no_of_bands=height/100;
  console.log("Height is "+height);
  console.log("Number of Band="+no_of_bands);
  for(var i=0;i<no_of_bands;i++){
    var random_dir=Math.floor(Math.random()*2);
    var random_left=Math.floor(Math.random()*client_window_height);
    var random_font_size=Math.floor(Math.random()*9000)/100;
    var random_height=100-random_font_size;
    var random_speed=Math.floor(Math.random()*3);
    if(random_speed==0){
      random_speed=1;
    }
    var random_text;
    if(Math.floor(Math.random()*2)==0){
      random_text="Clueless '16";
    }
    else{
      random_text="tathva '16";
    }
    //console.log(i+":dir="+random_dir+"||left="+random_left+"||font_size="+random_font_size);
    var band=$("<div id='random_bar_"+i+"' class='random_bar' speed="+random_speed+" dir="+random_dir+" style='margin-left:"+random_left+"px; height='"+random_height+"px'>"+random_text+"</div>");
    $('#background').append(band);
    document.getElementById("random_bar_"+i).style.fontSize=random_font_size+"px";
    document.getElementById("random_bar_"+i).style.marginBottom=random_height+"px";
  }
  //COLORING
  document.getElementById("background").style.height=client_window_height+"px";
  document.getElementById("background").style.width=client_window_width+"px";
  document.getElementById("background").style.backgroundImage="url('bg.jpg')";
  //MOVEmENT

    setInterval(function(){
      continue_movements();
    },1000/60);
  
}
function continue_movements(){
  //console.log("MOVING");
  var background=$('#background');
  var height=background.height();
  var no_of_bands=height/100;
  for(var i=0;i<no_of_bands;i++){
    var dir=$("#random_bar_"+i).attr("dir");
    var spd=Math.floor(2/Math.floor(document.getElementById("random_bar_"+i).style.fontSize.replace("px","")/20));
    if(spd==0){
      spd=1;
    }
    var cur_left=document.getElementById("random_bar_"+i).style.marginLeft;
//    console.log("Got cur_left as "+cur_left);
    cur_left=parseInt(cur_left);
  //  console.log("Read spd:"+spd+" and dir:"+dir+" and "+cur_left);
    if(dir==0){
      cur_left+=spd;
      if(cur_left>1500){
        var random_font_size=Math.floor(Math.random()*9000)/100;
        var random_height=100-random_font_size;
        document.getElementById("random_bar_"+i).style.fontSize=random_font_size+"px";
        document.getElementById("random_bar_"+i).style.marginBottom=random_height+"px";
        cur_left=$("#random_bar_"+i).width()*-2+Math.floor(Math.random()*900);
      }
    }
    else{
      cur_left-=spd;
      if(cur_left<-1000){

        var random_font_size=Math.floor(Math.random()*9000)/100;
        var random_height=100-random_font_size;
        document.getElementById("random_bar_"+i).style.fontSize=random_font_size+"px";
        document.getElementById("random_bar_"+i).style.marginBottom=random_height+"px";
        cur_left=1500+Math.floor(Math.random()*900);
      }
    }
  //  console.log("CHANGING "+i+":"+cur_left);
      document.getElementById("random_bar_"+i).style.marginLeft=cur_left+"px";
  }
}
function move_background_up(){
  if(mobile_mode==0){
    var filterVal = 'blur(4px)';
    $('#background').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
  }
  $( "#background" ).animate({
     opacity: 1,
     top: "-50px",
     filter: filterVal
   }, 500, function() {
     $("#Heading").animate({
           marginTop:"-500px"
     },1000,function(){});
     $( "#tathva" ).animate({
        left: (((client_window_width*24)/30)-10)+"px"
      }, 1000, function() {
     });
     $( "#tathva_man" ).animate({
        left: (((client_window_width*23)/30)-10)+"px"
      }, 1000, function() {
     });
     $( "#HOME_2" ).animate({
        top: "100px"
      }, 1000, function() {
     });
     sroll_over=true;
     toggle=1;
   });
}

function move_background_down(){
  if(mobile_mode==0){
    var filterVal = 'blur(0px)';
    $('#background').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
  }
  $( "#background" ).animate({
     opacity: 1,
     top: "0px"
   }, 500, function() {
     sroll_over=true;
     toggle=0;
     $("#Heading").animate({
         marginTop:(client_window_height/8)+"px"
     },1000,function(){});
     $( "#tathva" ).animate({
        left: client_window_width/30+"px"
      }, 1000, function() {
     });
     $( "#tathva_man" ).animate({
        left: client_window_width/40+"px"
      }, 1000, function() {
     });
     $( "#HOME_2" ).animate({
        top: (client_window_height*3)+"px"
      }, 1000, function() {
     });
   });
}
