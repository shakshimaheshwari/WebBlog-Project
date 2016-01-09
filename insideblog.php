
<?php
            include("configlogin.php");
            $username = $_POST['email'];
            $password = $_POST['pwd'];

            $sql = "Select user_id,username,userpass from user where username = '".$username."'";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            $data = mysqli_fetch_array($result);
            $userid = $data['user_id'];
            $pass = $data['userpass'];
            
            $sql = "Select * from posts where user_id='".$userid."'";
            $result = mysqli_query($con,$sql);
            $post_count = mysqli_num_rows($result);

            $sql = "Select * from comments";
            $result = mysqli_query($con,$sql);
            $comments_count = mysqli_num_rows($result);
            if($pass == $password)
            {
              $form =<<<EOT
              <html>
              <head>
                <title>My blog</title>
                <style = "text/css">
                  .nav-pills
                    {
                        display: flex;
                        justify-content: center;
                    }
                </style>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
              </head>
              <body>
                  <h1 align = "center">My Blog Homepage</h1>
                    <ul class="nav nav-pills">
                      <li class="active"><a href="insideblog.php">HOME</a></li>
EOT;
                 echo $form;
                    echo "<li><a href =new_post.php?userid='".$userid."'>CREATE NEW POST</a></li>";
                     echo"<li><a href=view_post.php?userid='".$userid."'>VIEW POST</a></li>";
                      echo"<li><a href= '#menu3'>BLOG HOMEPAGE</a></li>";
                      echo "<li><a href='logout.php'>LOG OUT</a></li>";
                echo "</ul>";
               
                echo"<br>";
                echo "<br>";
                echo "<table class ='table' width ='50%' style ='border:1px solid black;'>";
                    echo "<thead>";
                        echo"<tr>";
                        echo "<th>Total Posts/Comments</th>";
                        echo "<th>Count</th>";
                        echo"</tr>";
                    echo"</thead>";
                    echo "</thead>";
                    echo "<tbody>";
                        echo "<tr>";
                        echo "<td>Total Blog Posts</td>";
                        echo "<td>$post_count</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Total Comments</td>";
                        echo "<td>$comments_count</td>";
                        echo "</tr>";
                    echo "</tbody>";
                echo "</table>";
              echo "</body>";
              echo "</html>";
            }
            else
            {
                echo "The passwords doesnot match!!";
                header("Location:userblog.php");
            }
            
 ?>