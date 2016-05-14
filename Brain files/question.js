
function clean_QUESTION(){
  var filterVal = 'blur(4px)';
  $('#background').css('filter',filterVal).css('webkitFilter',filterVal).css('mozFilter',filterVal).css('oFilter',filterVal).css('msFilter',filterVal) .css('transition', 'all 2s ease-out').css('-webkit-transition', 'all 2s ease-out').css('-moz-transition', 'all 2s ease-out').css('-o-transition', 'all 2s ease-out');
/*  <div id='level'>Level 1</div>
  <img id='q_image' src='name.jpg'>
  <div id='answer_box' contenteditable='true'>Answer here</div>
  <div id='Submit_button' onclick='check_answer()'>Submit</div>
*/
  $("#level").css("font-size",client_window_height/15+"px").css('margin-top',client_window_height/15).css('margin-bottom',client_window_height/25);
  $("#q_image").css("height",client_window_height/2+"px");
  document.getElementById("answer_box").style.marginTop=client_window_height/25;
  document.getElementById("answer_box").style.fontSize=client_window_height/20;
  document.getElementById("answer_box").style.padding = "5px";
  document.getElementById("answer_box").style.backgroundColor=background_color;
  document.getElementById("answer_box").style.borderColor=main_color;
  document.getElementById("answer_box").style.borderStyle="solid";
  document.getElementById("answer_box").style.borderWidth="1px";
  document.getElementById("answer_box").style.width=client_window_width*2/4;
  document.getElementById("Submit_button").style.marginTop=client_window_height/25;
  document.getElementById("Submit_button").style.fontSize=client_window_height/20;
  document.getElementById("Submit_button").style.borderColor=main_color;
  document.getElementById("Submit_button").style.borderStyle="solid";
  document.getElementById("Submit_button").style.borderWidth="1px";
  document.getElementById("Submit_button").style.width=client_window_width/5;
  document.getElementById("Submit_button").style.textAlign="center";
  document.getElementById("Submit_button").style.padding = "10px";
  initsidebar();
}
