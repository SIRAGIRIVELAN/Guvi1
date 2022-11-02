<?php
 require_once('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Register Page</title>   
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
   <body>  
    <div class="main">
        <h1>
            Registration Form
        </h1>
        <div>
<?php
        if (isset($_POST['create']))
        $name =$_POST['name'];
        $mail =$_POST['mail']??'';
       $password =$_POST['password']??'';
        $sql= "INSERT INTO userdata (name,mail,password) VALUES(?,?,?)";
        $stmtinsert =$db->prepare($sql);
        $query=mysqli_query($db,"SELECT * FROM userdata WHERE mail='$mail'");
        $count=mysqli_num_rows($query);
        if($count>1)
        {
            echo "Email id already exits";
        }
        else
        {
         $result =$stmtinsert->execute([$name,$mail,$password]);  
        }

?>
</div>
<form action="index.php" method="post">
            <div class="register">  
                <div class="row">
                    <div class="col">  
                <label for="name"><span>First Name</span></label>
                <input class="form-control" id="name" type="text" name="name" placeholder="First Name" required>
                <br>               
                <label for="mail"><span>E-mail</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-control"id="mail" type="mail" name="mail" placeholder="@gmail.com" required>
                <br>
                <label for="password"><span>Password</span></label>&nbsp;&nbsp;
                <input class="form-control" id="password" type="password" name="password" placeholder="*********" required>
                <br>
                <input class="primary" type="submit" name="create" value="Sign Up"id="signup"> 
                <p>Please click here to login  <a href="login.html">Sign in</a></p>
                </div>
                </div>
            </div>
            </form>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></scrip>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">
            $(function()
             {
                $('#signup').click(function()
                {
                    var valid =this.form.checkValidity();
                    var firstname=$('#name').val();
                    var email=$('#email').val();
                    var password=$('#password').val();
                    if(valid)
                    {                        
                 swal({
                  title: "Good job!",
                  text: "successfully registered!",
                  icon: "success",
                   });  
                        alert('Entered successfully');
                    }
                    else{
                        alert('Enter the Valid details');
                    }            

                })
                            
             });
            </script>
           </body> 
        </html>