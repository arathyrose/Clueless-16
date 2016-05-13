<?php
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

The session Id is used to get current level.
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
//DATABASE DETAILS
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

//RETRIVE opcode

$op_code=$_POST["OPCODE"];
if($op_code==1){                    ////////////TIME FOR DIRECT LINK
  $destination=$_POST["DEST"];
  if($destination==1){                ///////WARP TO HOME
    $script="<script>
      function trigger_login(){
        var dataString='OP_CODE=1&DEST=7';
        $.ajax({
            type: \"POST\",
            url: \"brain.php\",
            data: dataString,
            cache: false,
            success: function(result){
              $('#content').html(result);
              }
          });
      }
        </script>";
    $html="<div>CLUELESS '16</div>
          <div>Welcome</div>
          <div>Gotham awaits your call</div>
          <div id='button' onclick='trigger_login()'>Log In</div>
          ";
        echo $script;
        echo $html;
  }




}




?>
