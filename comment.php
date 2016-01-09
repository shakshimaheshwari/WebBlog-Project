<html>
    <head>
         <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
          <script type="text/javascript">
              function ValCommentEntry()
              {
                   if(document.newcommentsform.email.value == null || document.newcommentsform.email.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the email;
                          return false;
                      }
                  if(document.newcommentsform.fname.value == null || document.newcommentsform.fname.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the name";
                          return false;
                      }
                  if(document.newcommentsform.comment.value == null || document.newcommentsform.comment.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the comments";
                          return false;
                      }
                  
                 return true;
              }
          </script>
        <style>
            input,textarea
            {
                max-width: 380px;
            }
        </style>
    </head>
    <body>
        <h1 align ="center">Comment Section</h1>
        <?php
            include("configlogin.php");
            $postid = $_GET['postid'];

            $sql = "Select title,body from posts where post_id=".$postid;
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            
            $data = mysqli_fetch_array($result);
            $title = $data['title'];
            $text = $data['body'];
            ?>
        <h2 align ="center"><?php echo $title?></h2>
        <br>
        <br>
        <h4 align = "center"><?php echo $text?></h4>
        
        <hr>
        <div class ="'container">
            <div class ="row">
                <div class = "col-md-4"></div>
                <div class = "col-md-4">
        <form role="form" style="text-align:center;" method="post" name="newcommentsform">
                <div class="form-group">
                  <label for="emailAddress">Email Address:</label>
                  <input type="emailAddress" class="form-control" id="email" name = "email" placeholder="Enter Email Id" style="align:center;">
                </div>
                <div class="form-group">
                  <label for="fname">Name:</label>
                  <input type="fname" class="form-control" id="fname" name = "fname" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="comment">Comment:</label>
                    <textarea class="form-control" id="comment" name = "comment" rows ="10" cols="50"></textarea>
                </div>
                <div id = "error_text"></div>
                <div class = "form-group">
                <button type="submit" class="btn btn-primary" value="submit" name="submit" onclick="ValCommentEntry()">Submit</button>
                </div>
            </div>
          </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $name = $_POST['fname'];
            $comment =$_POST['comment'];
            
            $sql = "Insert into comments(post_id,email_id,name,comment) VALUES(".$postid.",'".$email."','".$name."','".$comment."')";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        }
        ?>
        <hr>
        <?php
        $sql = "Select * from comments where post_id =".$postid;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        
        while($data = mysqli_fetch_array($result))
        {
            echo "<div>";
            echo "<h5>".$data['name']."</h5>";
            echo "</div>";
            echo "<blockquote>";
            echo $data['comment'];
            echo "</blockquote>";
        }
        ?>
        
    </body>
</html>
