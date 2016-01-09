<?php
include('configlogin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My login page</title>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
          <script type = "text/javascript">
              function openRequestedPopUp()
              {
                  var left = (screen.width/2)-(545/2);
                  var top = (screen.height/2)-(326/2);
                  window.open('Register.php','Registeration Window', 'width =545,height =326,top ='+top+', left ='+left+',resizable =yes,scrollbars=yes,status = yes');
              }
          </script>
    </head>
    
    <body>
            <h1 align = "center"></h1>
            <form class="form-inline" role="form" style="text-align:center;" action="insideblog.php" method="post">
                <div class="form-group">
                  <label for="username">UserName:</label>
                  <input type="username" class="form-control" id="email" name = "email" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name = "pwd" placeholder="Enter password">
                </div>
                <div class = "form-group">
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
                <button type="button" class= "btn btn-default" onclick="openRequestedPopUp()">Register</button>
                </div>
                
          </form>
    
    </body>
</html>