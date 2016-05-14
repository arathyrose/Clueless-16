var client_window_height=900;
var client_window_width=1400;
var main_color="#BFFF00";
var background_color="#000";
var scroll_over=true;

function update_colors(){
  document.getElementById('content').style.color=main_color;
    document.getElementById('background').style.color=main_color;

    main_color="rgb("+((Date.now()%70)+190)+","+((Date.now()%70)+190)+","+((Date.now()%70)+0)+")";
}
var toggle=0;
function scroll_down(){
  move_background_up();
}
function scroll_up(){
  move_background_down();
}
$("document").ready(function(){
  random_movements();
  update_colors();
  setInterval(function(){update_colors();},1000/60);
});
