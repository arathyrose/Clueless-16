
function clean_AWAY(){
  var filterVal = 'blur(4px)';
  $('#background').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
  document.getElementById("AWAY_Heading").style.fontSize=client_window_height/10;
  document.getElementById("AWAY_Heading").style.marginTop=client_window_height/15;
  document.getElementById("AWAY_Heading").style.marginBottom=client_window_height/10;
  document.getElementById("AWAY_Heading").style.marginLeft=client_window_width/10;
  document.getElementById("AWAY_Heading").style.textAlign="center";
  $(".row").css("margin-top","20px");
  $(".row").css("border-style","solid").css("border-color",main_color).css("border-width","1px");
  $(".row").css("height","200px");
  $(".row").css("margin-left",client_window_width/10+"px");
  $(".row").css("margin-right",client_window_width/10+"px");
  $(".row_photo").css("height","200px");
  $(".row_photo").css("width","200px");
  $(".row_photo").css("display","inline");
  $(".row_text").css("position","relative");
  $(".row_text").css("top","-180px");
  $(".row_text").css("left","250px");
  $(".row_slno").css("font-size","40px");
  $(".row_name").css("font-size","50px");
  $(".row_name").css("margin-left","30px");
  $(".row_college").css("font-size","45px");
  $(".row_college").css("margin-left","30px");
  $(".row_showlevel").css("font-size","30px");
  $(".row_showlevel").css("margin-left","30px");
  $(".row_level").css("font-size","30px");
  $(".row_level").css("margin-left","30px");
  initsidebar();
}
