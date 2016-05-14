<?php
session_start();
/*
CLUELESS '16 Engine Built for Tathva '16
----------------------------------------

This file shall act as the brain for clueless WebApp.
The website would send details to the brain and the brain sends back the data to be loaded in the '#content' div.
Few brain codes are to be followed.
1. Every brain call involves a brain instruction ID or opcode.
2. After opcode, parameters are sent to the brain.

Following are the opcodes:
1- Direct link  Parameters: DEST
2- Question mode Parameters: ANS
3- Account detail update Parameters: All basic details


DIRECT LINK:

This request is commonly called from side menu. Also called from HOME.
It recieves one parameter-DEST
DEST CODES:
1-HOME
2-QUESTION
3-RULES
4-PROFILE
5-HIGHSCORE_AWAY
6-HIGHSCORE_HOME
7-LOGIN
8-SIGNUP

At these request, the page data is sent back and written to '#content' div.
Required scripts are also sent.

For Question, Current UserId should not be null.
The level number is retrived from database, questions loaded and then data is sent to site.

For Profile again, CurrentUserId should not be null. Data is retrived from database and sent to site.

For Highscores, data is retrieved, table created and then sent to site.

QUESTION MODE:

This is called only from Question page.
Parameter- ANS

The User Database is used to get current level.
Current level answer is retrieved and checked with provided answer.
If same, the current level is updated and new question is loaded.
Else, previous question is loaded.
This data is then loaded to '#content' div.

ACCOUNT DETAIL MODE:

Used basically for Sign In and Sign Up.
For now, lets use following details for user.
1-ID (Replacalbe by facebook ID)
2-Name
3-College
4-Mobile
5-Level

2 times its called.
1. Sign Up.
 Parameters :
 TIME- 0-sign up 1-sign in
 NAME- STRING
 COLLEGE- STRING
 MOBILE- STRING
 EMAIL- STRING
 PASSWORD- STRING

 INSERT INTO USERS VALUES(NAME,COLLEGE,MOBILE,EMAIL,PASSWORD)

 After this, the QUESTION page is loaded

2. Sign In.
  Parameters:
  TIME
  EMAIL
  PASSWORD

  From here the password is checked. If yes, load QUESTION page. Else load same login page.

Apart from this an error channel is also used. The ERROR_CODE parameter displays error.Default=-1

1-Invalid User/Password
2-Duplicate User
3-Passwords Dont Match
4-Taunt_Success
5-Taunt_Fail
BRAIN MAP:

                                      -----------------------------
                                      |                           |
HOME------>Login-----Success------T---->QUESTION-----AnswerCheck--|
  ^      |                        |   |
  |      -->Sign up----------------   -->Highscores
  |                                   |
  |                                   -->Profile
  |                                   |
  |                                   -->Logout---
  |                                              |
  ------------------------------------------------

*/


//LETS START oFF
//RETRIVE opcode

$op_code=$_POST["OPCODE"];
if($op_code==1){                    ////////////TIME FOR DIRECT LINK
    $destination=$_POST["DEST"];
    if($destination==1){                ///////WARP TO HOME
      //FIRST LOGOUT
      if(session_id()){
      session_unset();
      session_destroy();
    }
      echo "<script>

            function trigger_login(){
            var dataString='OPCODE=1&ERROR_CODE=0&DEST=7';
            load(dataString);
            }
            clean_HOME();
            </script>";
      echo "  <div id=\"Heading\" style=\"font-family:'Lato';font-weight:100;\">Clueless '16</div>
      <img id=\"tathva_man\" src=\"tathva.png\" style=\"position:fixed; margin-left:10px;bottom:40px\" onclick=\"toggle_HOME_2()\">
      <div id=\"tathva\" style=\"position:fixed;left:50px;bottom:10px;font-family:'Lucida';\">tathva '16</div>
      <div id=\"cpr\" style=\"position:fixed;bottom:10px;font-family:'Lucida';\">Clueless Engine 1.0.   AJCL 2016(c)</div>
      <div id=\"HOME_2\" style=\"position:fixed\">
          <div id=\"HOME2_Text\" style=\"font-family:'Lato';font-weight:400;\">Welcome</div>
          <div id=\"HOME2_Text2\" style=\"font-family:'Lato';font-weight:100;\">Gotham awaits your call..</div>
          <div id=\"fb_button\" style=\"width:100px;height:50px;background-color:#2D6DD7;\" onclick='trigger_login()'></div>
      </div>
          ";
    }
    else if($destination==2){
      echo "<script>
            function check_answer(){
            var answer=$('#answer_box').text();
            var dataString='OPCODE=2&ERROR_CODE=0&ANS='+answer;
            load(dataString);
            }
            function jump_to_question(){
            load('OPCODE=1&ERROR_CODE=0&DEST=2');
            }
            function jump_to_highscore_A(){
              load('OPCODE=1&ERROR_CODE=0&DEST=5');
            }
            function jump_to_highscore_H(){
              load('OPCODE=1&ERROR_CODE=0&DEST=6');
                }
            function jump_to_rules(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=3');
                }
             function jump_to_profile(){
                load('OPCODE=1&ERROR_CODE=0&DEST=4');
              }
              clean_QUESTION();
             </script>";

    $level=cur_user_cur_level(); //OBTAIN FROM DATABASE
    $img_name=get_image_name($level);
             echo "<div id=\"page_data\">
                 <img id='sidebar_trigger_content' src=\"arrow_left.png"\ onclick=\"callsidebar()\">
                 <center><div id='level' style=\"font-family:'Lato';font-weight:400\">Level $level</div>
                 <img id='q_image' src='$img_name.jpg'>
                 <div id='answer_box' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Answer here</div>
                 <div id='Submit_button' onclick='check_answer()' style=\"font-family:'Lato';font-weight:400\">Submit</div></center>
               </div>
                 <div id='sidebar'>
                   <img id='sidebar_trigger_sidebar' src=\"arrow_right.png\" onclick=\"closesidebar()\">
                   <div id='link0' onclick='jump_to_question()'  style=\"font-family:'Lato';font-weight:400\">Game</div>
                   <div id='link1' onclick='jump_to_profile()'  style=\"font-family:'Lato';font-weight:400\">Profile</div>
                   <div id='link2' onclick='jump_to_rules()'  style=\"font-family:'Lato';font-weight:400\">Rules</div>
                   <div id='link3' onclick='jump_to_highscore_A()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Away</div>
                   <div id='link4' onclick='jump_to_highscore_H()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Home</div>
                   <img id='tathva_sidebar' src='tathva_black.png' onclick=\"gototathva()\">
                 </div>";
      }
      else if($destination==3){
        echo "<script>
              function jump_to_question(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=2');
              }
              function jump_to_highscore_A(){
                load('OPCODE=1&ERROR_CODE=0&DEST=5');
              }
              function jump_to_highscore_H(){
                load('OPCODE=1&ERROR_CODE=0&DEST=6');
              }
                function jump_to_rules(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=3');
                }
                function jump_to_profile(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=4');
                }
                </script>
                clean_RULES();
                ";
         echo "
         <div id=\"page_data\">
             <img id='sidebar_trigger_content' src=\"arrow_left.png\" onclick=\"callsidebar()\">
             <div id=\"Heading\" style=\"font-family:'Lato';font-weight:400\">Rules:</div>
             <div id='rule1' style=\"font-family:'Lato';font-weight:400\">1.Hello</div>
             <div id='rule2' style=\"font-family:'Lato';font-weight:400\">2.How are you?</div>
             <div id='rule3' style=\"font-family:'Lato';font-weight:400\">3.How are you?</div>
             <div id='rule4' style=\"font-family:'Lato';font-weight:400\">4.How are you?</div>
             <div id='rule5' style=\"font-family:'Lato';font-weight:400\">5.How are you?</div>
             <div id='rule6' style=\"font-family:'Lato';font-weight:400\">6.How are you?</div>
           </div>
             <div id='sidebar'>
               <img id='sidebar_trigger_sidebar' src=\"arrow_right.png\" onclick=\"closesidebar()\">
               <div id='link0' onclick='jump_to_question()'  style=\"font-family:'Lato';font-weight:400\">Game</div>
               <div id='link1' onclick='jump_to_profile()'  style=\"font-family:'Lato';font-weight:400\">Profile</div>
               <div id='link2' onclick='jump_to_rules()'  style=\"font-family:'Lato';font-weight:400\">Rules</div>
               <div id='link3' onclick='jump_to_highscore_A()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Away</div>
               <div id='link4' onclick='jump_to_highscore_H()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Home</div>
               <img id='tathva_sidebar' src='tathva_black.png' onclick=\"gototathva()\">
             </div>
              ";
       }
       else if($destination==4){
         echo "<script>
              function jump_to_question(){
                load('OPCODE=1&ERROR_CODE=0&DEST=2');
              }
              function jump_to_highscore_A(){
                load('OPCODE=1&ERROR_CODE=0&DEST=5');
              }
              function jump_to_highscore_H(){
                load('OPCODE=1&ERROR_CODE=0&DEST=6');
              }
              function jump_to_rules(){
                load('OPCODE=1&ERROR_CODE=0&DEST=3');
              }
              function jump_to_profile(){
                load('OPCODE=1&ERROR_CODE=0&DEST=4');
              }
              clean_PROFILE();
              </script>
              ";
          echo "<img id='sidebar_trigger_content' src=\"arrow_left.png"\ onclick=\"callsidebar()\">
              <div id='Profile_heading'>Profile:</div>
              <div>Name:";
          echo cur_user_name();
          echo "</div>
              <div>Level:";
          echo cur_user_cur_level();
          echo "</div>
                <div>College:";
          echo cur_user_college();
          echo "</div>
          <div id='sidebar'>
            <img id='sidebar_trigger_sidebar' src=\"arrow_right.png\" onclick=\"closesidebar()\">
            <div id='link0' onclick='jump_to_question()'  style=\"font-family:'Lato';font-weight:400\">Game</div>
            <div id='link1' onclick='jump_to_profile()'  style=\"font-family:'Lato';font-weight:400\">Profile</div>
            <div id='link2' onclick='jump_to_rules()'  style=\"font-family:'Lato';font-weight:400\">Rules</div>
            <div id='link3' onclick='jump_to_highscore_A()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Away</div>
            <div id='link4' onclick='jump_to_highscore_H()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Home</div>
            <img id='tathva_sidebar' src='tathva_black.png' onclick=\"gototathva()\">
          </div>
                ";
        }
        else if($destination==5){             //Highscore-Away
          echo "<script>
                function jump_to_question(){
                load('OPCODE=1&ERROR_CODE=0&DEST=2');
                }
                function jump_to_highscore_A(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=5');
                }
                function jump_to_highscore_H(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=6');
                }
                function jump_to_rules(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=3');
                }
                function jump_to_profile(){
                  load('OPCODE=1&ERROR_CODE=0&DEST=4');
                }
                clean_AWAY();
                </script>
                ";
          echo "
          <div id=\"page_data\">
            <img id=\"sidebar_trigger_content\" src=\"arrow_left.png\" onclick=\"callsidebar()\">
            <div id='AWAY_Heading' style=\"font-family:'Lato';font-weight:400\">HALL OF FAME - AWAY</div>
            <div id='table'>
                ";
          build_away_highscore();
          echo "
          </div>
        </div>
        <div id='sidebar'>
          <img id='sidebar_trigger_sidebar' src=\"arrow_right.png\" onclick=\"closesidebar()\">
          <div id='link0' onclick='jump_to_question()'  style=\"font-family:'Lato';font-weight:400\">Game</div>
          <div id='link1' onclick='jump_to_profile()'  style=\"font-family:'Lato';font-weight:400\">Profile</div>
          <div id='link2' onclick='jump_to_rules()'  style=\"font-family:'Lato';font-weight:400\">Rules</div>
          <div id='link3' onclick='jump_to_highscore_A()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Away</div>
          <div id='link4' onclick='jump_to_highscore_H()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Home</div>
          <img id='tathva_sidebar' src='tathva_black.png' onclick=\"gototathva()\">
        </div>
                ";
       }
       else if($destination==6){         //HIGHSCORE - HOME
    echo "<script>
    function jump_to_question(){
      load('OPCODE=1&ERROR_CODE=0&DEST=2');
    }
    function jump_to_highscore_A(){
      load('OPCODE=1&ERROR_CODE=0&DEST=5');
    }
    function jump_to_highscore_H(){
      load('OPCODE=1&ERROR_CODE=0&DEST=6');
    }
    function jump_to_rules(){
      load('OPCODE=1&ERROR_CODE=0&DEST=3');
    }
    function jump_to_profile(){
      load('OPCODE=1&ERROR_CODE=0&DEST=4');
    }
    </script>
    clean_AWAY();
    ";
    echo "
    <div id=\"page_data\">
      <img id=\"sidebar_trigger_content\" src=\"arrow_left.png\" onclick=\"callsidebar()\">
      <div id='AWAY_Heading' style=\"font-family:'Lato';font-weight:400\">HALL OF FAME - HOME</div>
      <div id='table'>
        ";
    build_home_highscore();
        echo "
        </div>
      </div>
        <div id='sidebar'>
          <img id='sidebar_trigger_sidebar' src=\"arrow_right.png\" onclick=\"closesidebar()\">
          <div id='link0' onclick='jump_to_question()'  style=\"font-family:'Lato';font-weight:400\">Game</div>
          <div id='link1' onclick='jump_to_profile()'  style=\"font-family:'Lato';font-weight:400\">Profile</div>
          <div id='link2' onclick='jump_to_rules()'  style=\"font-family:'Lato';font-weight:400\">Rules</div>
          <div id='link3' onclick='jump_to_highscore_A()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Away</div>
          <div id='link4' onclick='jump_to_highscore_H()'  style=\"font-family:'Lato';font-weight:400\">Highscore-Home</div>
          <img id='tathva_sidebar' src='tathva_black.png' onclick=\"gototathva()\">
        </div>
    ";
  }
  else if($destination==7){
    echo "
    <script>
      function log_in_trigger(){
        var email=$('#email').text();
        var password=$('#password').text();
        load('OPCODE=3&ERROR_CODE=0&TIME=1&EMAIL='+email+'&PASSWORD='+password);
      }
      function warp_to_join(){
        load('OPCODE=1&DEST=8');
      }
      clean_LOGIN();
    </script>
    ";
      echo "
      <form>
          <div id=\"Heading\" style=\"font-family:'Lato';font-weight:400\">Login</div>
          <div id='email_label' style=\"font-family:'Lato';font-weight:100\">Email:</div>
          <div id='email' style=\"font-family:'Lato';font-weight:100\" contenteditable='true'>Email</div>
          <div id='password_label' style=\"font-family:'Lato';font-weight:100\">Password:</div>
          <div id='password' style=\"font-family:'Lato';font-weight:100\" contenteditable='true'>Password</div>
          <div id='log_in_trigger' style=\"font-family:'Lato';font-weight:400\" onclick='log_in_trigger()' action='submit'>Log In</div>
          <div id='join_me_link' style=\"font-family:'Lato';font-weight:100\" onclick='warp_to_join()'>First time? Join here</div>
        </form>
      ";
  }
  else if($destination==8){
      echo "
      <form>
          <div id=\"Heading\" style=\"font-family:'Lato';font-weight:400\">Login</div>
          <div id='name_label' style=\"font-family:'Lato';font-weight:100\">Name:</div>
          <div id='name' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Name</div>
          <div id='college_label' style=\"font-family:'Lato';font-weight:100\">College:</div>
          <div id='college' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">College</div>
          <div id='email_label' style=\"font-family:'Lato';font-weight:100\">Email:</div>
          <div id='email' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Email</div>
          <div id='mobile_label' style=\"font-family:'Lato';font-weight:100\"> Mobile:</div>
          <div id='mobile' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Mobile</div>
          <div id='password_label' style=\"font-family:'Lato';font-weight:100\">Password:</div>
          <div id='password' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Password</div>
          <div id='conf_password_label' style=\"font-family:'Lato';font-weight:100\">Confirm Password:</div>
          <div id='conf_password' contenteditable='true' style=\"font-family:'Lato';font-weight:100\">Password</div>
          <div id='join_trigger' onclick='join_trigger()' style=\"font-family:'Lato';font-weight:400\">Sign Up</div>
          <div id='log_in_link' onclick='warp_to_login()' style=\"font-family:'Lato';font-weight:100\">Already a user? Login Here</div>
        </form>
      ";
      echo "
      <script>
        function join_trigger(){
          var name=$('#name').text();
          var college=$('#college').text();
          var mobile=$('#mobile').text();
          var email=$('#email').text();
          var password=$('#password').text();
          var conf_password=$('#conf_password').text();
          if(password!=conf_password){
            load('OPCODE=1&DEST=8&ERROR_CODE=3');
          }
          else{
              load('OPCODE=3&ERROR_CODE=0&TIME=0&NAME='+name+'&COLLEGE='+college+'&MOBILE='+mobile+'&EMAIL='+email+'&PASSWORD='+password);
          }
        }
        function warp_to_login(){
          load('OPCODE=1&ERROR_CODE=0&DEST=7');
        }
      </script>
      ";
  }
  else{
    echo "IR Invalid destination";
  }
}
else if($op_code==2){              //////////////////QUESTION MODE
  $answer=$_POST["ANS"];
  $cur_level=cur_user_cur_level();
  $corr_answer=retrieve_answer($cur_level);
  $yes=5;
  if($answer==$corr_answer){
      update_level();
      $yes=4;
  }
  echo "<script>load('OPCODE=1&ERROR_CODE=";
  echo $yes;
  echo "&DEST=2');</script>";
}
else if($op_code==3){              //USER DETAILS MANAGEMENT
    $type=$_POST['TIME'];
    if($type==0){               //JOIN
        $name=$_POST["NAME"];
        $college=$_POST["COLLEGE"];
        $mobile=$_POST["MOBILE"];
        $email=$_POST["EMAIL"];
        $password=$_POST["PASSWORD"];
        $check=check_if_present($email);
        if($check==1){
          echo "<script>load('OPCODE=1&ERROR_CODE=2&DEST=8');</script>";
        }
        else{
          insert_user($email,$name,$college,$mobile,$password);
          load_user($email);
          echo "<script>
            load('OPCODE=1&ERROR_CODE=0&DEST=2');
            </script>";
        }
    }
    else if($type==1){              //SIGN IN
          $email=$_POST["EMAIL"];
          $password=$_POST["PASSWORD"];
          $check=check_if_present($email);
          if($check==0){
            echo "<script>throw_error('EMEAIL NOT PRESENT');</script>";
            echo "<script>load('OPCODE=1&ERROR_CODE=1&DEST=7');</script>";
          }
          else{
            echo "<script>throw_error('EMEAIL PRESENT AUTHENTICATING');</script>";
            $check=authenticator($email,$password);
            if($check==0){
              echo "<script>load('OPCODE=1&ERROR_CODE=1&DEST=7');</script>";
            }
            else{
              load_user($email);
              echo "<script>load('OPCODE=1&ERROR_CODE=0&DEST=2');</script>";
            }
          }
    }
    else{
      echo "IR type=";
    }
}
//ERROR DISPLAY PORTION
$Error_code=$_POST["ERROR_CODE"];
//echo "'Error code recieved is "+$Error_code+"')";
if($Error_code==0){
    //echo "No errors";
}
else if($Error_code==1){
    echo "<script>throw_error('Invalid Email/Password');</script>";
}
else if($Error_code==2){
    echo "<script>throw_error('Duplicate User Account');</script>";
}
else if($Error_code==3){
    echo "<script>throw_error('Passwords dont match');</script>";
}
else if($Error_code==4){
    echo "<script>throw_error('SUCCESS');</script>";
}
else if($Error_code==5){
    echo "<script>throw_error('FAIL');</script>";
}
else{

}


//SUPPORT FUNCTIONS
function cur_user_name(){
  $email=$_SESSION['EMAIL'];
  $result=execute_MYSQL("SELECT NAME FROM USERS WHERE EMAIL='$email'");
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        return $row['NAME'];
    }
  }
}
function cur_user_cur_level(){
  $email=$_SESSION['EMAIL'];
    echo "<script>throw_error('Retriving level of $email');</script>";
  $result=execute_MYSQL("SELECT LEVEL FROM USERS WHERE EMAIL='$email'");
  if ($result->num_rows > 0) {
  	// output data of each row
  	while($row = $result->fetch_assoc()) {
  			return $row['LEVEL'];
  	}
  }
}
function cur_user_college(){
  $email=$_SESSION['EMAIL'];
  $result=execute_MYSQL("SELECT COLLEGE FROM USERS WHERE EMAIL='$email'");
  if ($result->num_rows > 0) {
  	// output data of each row
  	while($row = $result->fetch_assoc()) {
  			return $row['COLLEGE'];
  	}
  }
}
function build_home_highscore(){
  $result=execute_MYSQL("SELECT NAME,LEVEL FROM USERS WHERE COLLEGE='NITC' ORDER BY LEVEL DESC");
  $rank=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $name=$row['NAME'];
      $level=$row['LEVEL'];
      $rank=$rank+1;
      echo "<div class=\"row\">
        <img class=\"row_photo\" src=\"name.jpg\">
        <div class=\"row_text\">
          <span class=\"row_slno\" style=\"font-family:'Lato';font-weight:100\">$rank.</span>
          <span class=\"row_name\" style=\"font-family:'Lato';font-weight:400\">$name</span><br><br>
          <span class=\"row_showlevel\" style=\"font-family:'Lato';font-weight:100\">Level:</span>
          <span class=\"row_level\" style=\"font-family:'Lato';font-weight:400\">$level</span>
        </div>
      </div>";
    }
  }
}
function build_away_highscore(){
  $result=execute_MYSQL("SELECT NAME,COLLEGE,LEVEL FROM USERS ORDER BY LEVEL DESC");
  $rank=0;
  if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
      $name=$row['NAME'];
      $college=$row['COLLEGE'];
      $level=$row['LEVEL'];
      $rank=$rank+1;
      echo "<div class=\"row\">
        <img class=\"row_photo\" src=\"name.jpg\">
        <div class=\"row_text\">
          <span class=\"row_slno\" style=\"font-family:'Lato';font-weight:100\">$rank.</span>
          <span class=\"row_name\" style=\"font-family:'Lato';font-weight:400\">$name</span><br>
          <span class=\"row_college\" style=\"font-family:'Lato';font-weight:100\">$college</span><br>
          <span class=\"row_showlevel\" style=\"font-family:'Lato';font-weight:100\">Level:</span>
          <span class=\"row_level\" style=\"font-family:'Lato';font-weight:400\">$level</span>
        </div>
      </div>";
  	}
  }
}
function get_image_name($level){
  $result=execute_MYSQL("SELECT QUESTION FROM QUESTIONARE WHERE LEVEL=$level");
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        return $row['QUESTION'];
    }
  }
}
function retrieve_answer($level){
  $result=execute_MYSQL("SELECT ANSWER FROM QUESTIONARE WHERE LEVEL=$level");
  if ($result->num_rows > 0) {
  	while($row = $result->fetch_assoc()) {
  			return $row['ANSWER'];
  	}
  }
}
function update_level(){
  $cur_level=cur_user_cur_level();
  $cur_level=$cur_level+1;
  $email=$_SESSION['EMAIL'];
 $result=execute_MYSQL("UPDATE USERS SET LEVEL=$cur_level WHERE EMAIL='$email'");
}
function check_if_present($email){
  echo "<script>throw_error('Checking if $email is present');</script>";
  $result=execute_MYSQL("SELECT * FROM USERS WHERE EMAIL='$email'");
  if ($result->num_rows > 0){
  	return 1;
  }
  else{
    return 0;
  }
}
function authenticator($email,$password){
  $result=execute_MYSQL("SELECT PASSWORD FROM USERS WHERE EMAIL='$email'");
  if ($result->num_rows > 0) {
    	// output data of each row
  	while($row = $result->fetch_assoc()) {
      $r_password=$row['PASSWORD'];
        //echo "<script>throw_error('Checking if $email is authentic. $password==$r_password');</script>";
  			if($row['PASSWORD']==$password){

  							$_SESSION["EMAIL"]=$email;
                return 1;
  			}
  			else{
    				return 0;
  			}
  	}
  }
}
function load_user($email){
  session_start();
  $_SESSION["EMAIL"]=$email;
}
//TABLE STRUCTURE
//EMAIL name  college mobile  password  LEVEL
function insert_user($email,$name,$college,$mobile,$password){
  $result=execute_MYSQL("INSERT INTO USERS VALUES('$email','$name','$college',$mobile,'$password',1)");
}
function execute_MYSQL($sql){
  //DATABASE DETAILS
  $servername="localhost";
  $username = "root";
  $password='Amaljose@96';
  $database= "test";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);
  // Check connection
  if ($conn->connect_error)
  {
     die("Connection failed: " . $conn->connect_error);
  }
  //echo "<script>throw_error('SUCCESSFULLY ESTABLISHED CONNECTION');</script>";
  $result = $conn->query($sql);
  $conn->close();
  return $result;
}
?>
