<!DOCTYPE html>
<html>
<body>
<?php
        //

session_start();
session_destroy();

        //
        $dbc=mysqli_connect('localhost','root','','augmenteddb') or die("Error connecting to db");
        $pass=$_POST['pwdtxt'];
        $user=$_POST['unametxt'];
                $pass=stripcslashes($pass);
                $user=stripcslashes($user);
        

        $query="SELECT user AND pass FROM login WHERE user='$user' AND pass='$pass'" or die ("Error Querying db ($ query)");
        $result=mysqli_query($dbc, $query) or die ("Error Querying db ($ result)");
        $count=mysqli_num_rows($result);

                echo $user."  ";
                echo $pass;
                //echo $count;

        if($count==1)
        {
// Register $myusername, $mypassword and redirect to file "login_success.php"
            $_SESSION['user']="user";
            header("location:login_success.php");
        }
    else {
            echo " Wrong Username or Password";
            ?><center>
 <table border="1" >
  <tr> <td> <form name = "loginform" method="POST" action="login.php" onsubmit="return(regvalidate())">
   <table> 
   <tr> <td> User Name:</td> <td><input type = "text" name="unametxt" /><br/> </td> </tr> 
   </tr> 
   <tr> <td> Password : </td> <td> <input type = "password" name="pwdtxt" /> <br/> </td> </tr> </tr>
     
    </table> <font color='red'> <DIV id="une"> </DIV> </font> <input type = "submit" value="Login   " /> 
    <input type="button" onclick="location.href='password.html';" value="Forgot password" />

    </form> </td> </th> </tr> </table>
     </tr> </table> </tr> 

     <SCRIPT type="Text/JavaScript"> function regvalidate()
      {   
      
        if(document.loginform.unametxt.value=="")  
         {   document.getElementById('une').innerHTML = "User name field should not be empty";   loginform.unametxt.focus();   
     return(false);  } 
   if(document.loginform.pwdtxt.value=="")   
    {   document.getElementById('une').innerHTML = "Please type a password";   loginform.pwdtxt.focus();   return(false);    }
         else    
            {    return(true);    } } </SCRIPT> </td> </tr> </table> </center>
        <?php }
        

?>
</body>
</html>