<?php
include("configlogin.php");
 $userid = $_GET['userid'];
$sql = "Select username,userpass from user where user_id=".$userid;
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$data = mysqli_fetch_array($result);

$username = $data['username'];
$password = $data['userpass'];
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $text = $_POST['body'];
    $category = $_POST['category'];
    $date =date('Y-m-d G:i:s');
    $text = htmlentities($text);
    
    $sql = "Insert into posts(user_id,title,body,category_id,posted) VALUES(".$userid.",'".$title."','".$text."','".$category."','".$date."')";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    if($result)
    {
        
    }
}
?>

<html>
    <head>
        <title>New Post Window</title>
        
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type = "text/javascript">
              function ValidateSignUp()
              {
                  if(document.newpostform.title.value == null || document.newpostform.title.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the title";
                          return false;
                      }
                  if(document.newpostform.body.value == null || document.newpostform.body.value == "")
                      {
                          document.getElementById("error_text").innerHTML ="Please enter the text";
                          return false;
                      }
                 return true;
              }
          </script>
        <style>
            input,textarea,select
            {
                max-width: 300px;
            }
        </style>
    </head>
    <body>
         <h2>New Post</h2>
            <form role="form" method="post" name="newpostform">
                <div class="form-group">
                  <label for="title">UserId:</label>
                  <input type="title" class="form-control" id="title" name = "title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <label for="body">Body:</label>
                    <textarea class="form-control" id="body" name = "body" rows ="10" cols="50"></textarea>
                </div>
                <div class="form-group">
                  <label for="category">Category:</label>
                  <select name = "category" id = "category" class="form-control">
                      <?php
                      $sql = "Select * from category";
                      $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                      while($data = mysqli_fetch_array($result))
                      {
                          echo "<option value='".$data['category_id']."'>".$data['category']."</option>";
                      }
                      ?>
                  </select>
                </div>
                <div id = "error_text" class="form-group" style="color:red;"></div>
                <div class = "form-group">
                <button type="submit" class="btn btn-primary" onclick="return ValidateSignUp()" name = 'submit'>Submit Post</button>
                <button type="reset" class="btn btn-default">Reset</button>
                
          </form>
          <form role="form" method="post" action="insideblog.php">
              <input type="hidden" value="<?php echo $username?>" name ="email" id ="email">
              <input type = "hidden" value="<?php echo $password?>" name="pwd" id ="pwd">
              <br>
              <div class = "form-group">
                <button type="submit" class="btn btn-default" name = 'submit'>Back</button>
              </div>
          </form>
    </body>
</html>