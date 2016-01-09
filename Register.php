<?php
include("configlogin.php");
?>

<html>
    <head>
        <title>Registeration page</title>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
          <script type = "text/javascript">
              function ValidateSignUp()
              {
                  if(document.signupform.studentid.value == null || document.signupform.studentid.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the user Id";
                          return false;
                      }
                  if(document.signupform.studentname.value == null || document.signupform.studentname.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the user name";
                          return false;
                      }
                  
                  if(document.signupform.pwd.value == null || document.signupform.pwd.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the user password";
                          return false;
                      }
                 alert("Record added successfully");
                 //document.signupform.submit();
                 window.close();
                 return true;
              }
          </script>
    </head>
    <body>
        <h1 align = "center">Registeration Page</h1>
            <form class = "form-inline" role="form" method="post" name="signupform" action="register_add.php">
                <div class="form-group">
                  <label for="studentid">UserId:</label>
                  <input type="studentid" class="form-control" id="studentid" name = "studentid" placeholder="Enter UserId">
                </div>
                <div class="form-group">
                  <label for="studentname">UserName:</label>
                  <input type="studentname" class="form-control" id="studentname" name = "studentname" placeholder="Enter UserName">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name = "pwd" placeholder="Enter Password">
                </div>
                <div id = "error_text" class="form-group" style="color:red; text-align:center;"></div>
                <div class = "form-group">
                <button type="submit" class="btn btn-primary" onclick="return ValidateSignUp()" name = 'submit'>SignUp</button>
                <button type="reset" class="btn btn-default">Reset</button>
                
          </form>
                
       
    </body>
</html>
    