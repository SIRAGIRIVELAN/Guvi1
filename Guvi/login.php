
<?php
 require_once('config.php');
?>
<?php
        if (isset($_POST['submit']))
        $name =$_POST['name']??'';
        $password =$_POST['password']??'';
        $query="select * from userdata where name='$name' and password='$password'";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count>0)
        {
            echo "Login Successful";
        }
        else
        {
           echo " Check detail correctly";
        }    
        include("login.html");

?>