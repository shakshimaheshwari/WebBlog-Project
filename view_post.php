<html>
    <head>
        <title>Room Reservation System</title>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h3 align ="center">List of Posts</h3>
        <table class="table" width ="100%" style="border:1px solid black;">
            <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Date of Posting</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    include("configlogin.php");
                    $userid = $_GET['userid'];
                    $sql = "Select username, userpass from user where user_id=".$userid;
                    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                    $data = mysqli_fetch_array($result);
                    $username = $data['username'];
                    $password = $data['userpass'];
                    $sql = "Select * from posts";
                    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

                    while($data = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>";
                        echo $data['title'];
                        echo "</td>";
                        echo "<td>";
                        echo $data['body'];
                        echo "</td>";
                        echo "<td>";
                        $sql1 = "Select category from category where category_id='".$data['category_id']."'";
                        $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
                        $data1 = mysqli_fetch_array($result1);
                        echo $data1['category'];
                        echo "</td>";
                        echo "<td>";
                        echo $data['posted'];
                        echo "</td>";
                        echo "<td>";
                        echo "<a href=delete.php?postid='".$data['post_id']."'&userid=$userid>Delete</a>";
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=comment.php?postid='".$data['post_id']."'>Comment</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
            </tbody>
        </table>
         <form role="form" method="post" action="insideblog.php" style="text-align:center;">
              <input type="hidden" value="<?php echo $username?>" name ="email" id ="email">
              <input type = "hidden" value="<?php echo $password?>" name="pwd" id ="pwd">
              <br>
              <div class = "form-group">
                <button type="submit" class="btn btn-primary" name = 'submit'>Back</button>
              </div>
          </form>
    </body>
</html>

