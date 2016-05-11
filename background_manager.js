function random_movements(){
  console.log("STARTED CREATING");
  var background=$('#background');
  var height=background.height();
  //AFTER GETTING THE HEIGHT, DECIDE NUMBER OF HORIZONTAL BANDS
  var no_of_bands=height/100;
  console.log("Height is "+height);
  console.log("Number of Band="+no_of_bands);
  for(var i=0;i<no_of_bands-1;i++){
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
    console.log(i+":dir="+random_dir+"||left="+random_left+"||font_size="+random_font_size);
    var band=$("<div id='random_bar_"+i+"' class='random_bar' speed="+random_speed+" dir="+random_dir+" style='margin-left:"+random_left+"px; height='"+random_height+"px'>"+random_text+"</div>");
    $('#background').append(band);
    document.getElementById("random_bar_"+i).style.fontSize=random_font_size+"px";
    document.getElementById("random_bar_"+i).style.marginBottom=random_height+"px";
  }
  for(var i=0;i<10;i++){
  setInterval(function(){
    continue_movements();
  },1000/60);
}
}
function continue_movements(){
  console.log("MOVING");
  var background=$('#background');
  var height=background.height();
  var no_of_bands=height/100;
  for(var i=0;i<no_of_bands-1;i++){
    var dir=$("#random_bar_"+i).attr("dir");
    var spd=$("#random_bar_"+i).attr("speed");
    var cur_left=document.getElementById("random_bar_"+i).style.marginLeft;
    console.log("Got cur_left as "+cur_left);
    cur_left=parseInt(cur_left);
    console.log("Read spd:"+spd+" and dir:"+dir+" and "+cur_left);
    if(dir==0){
      cur_left+=1;
      if(cur_left>1500){
        cur_left=$("#random_bar_"+i).width()*-1+Math.floor(Math.random()*900);
      }
    }
    else{
      cur_left-=1;
      if(cur_left<-1000){
        cur_left=1500+Math.floor(Math.random()*900);
      }
    }
    console.log("CHANGING "+i+":"+cur_left);
      document.getElementById("random_bar_"+i).style.marginLeft=cur_left+"px";
  }
}
