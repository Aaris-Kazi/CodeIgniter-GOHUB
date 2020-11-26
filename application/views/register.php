<?php
    session_start();
    // include 'connect.php';
     $nameErr = $passErr = $emailErr = "";
     $name =  $email = $pass = "";
     $flag = false;
     $_SESSION['u_email'] = $email;
     if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         $name = test_input($_POST["check_name"]);
         if (empty($name)) {
             $nameErr = "Name is required";
             $flag = true;
         } else {
             $name = test_input($_POST["check_name"]);
             // check if name only contains letters and whitespace
             if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
                 $nameErr = "Only letters and white space allowed";
                 $flag = true;
             }
         }

         if (empty($_POST["check_email"])) 
         {
             $emailErr = "Email is required";
             $flag = true;
         } 
         else 
         {
             $email = test_input($_POST["check_email"]);
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
             {
                 $emailErr = "Invalid email format";
                 $flag = true;
             }
         }
         $pass = test_input($_POST["check_pass"]);
        if (empty($pass)) 
        {
            $passErr = "Password is required";
            $flag = true;
        }
        else
        {

            $pass = test_input($_POST["check_pass"]);
            if(strlen($pass) < 8)
            {
                $passErr = "Password cannot be less than 8";
                $flag = true;
            }
        }

        if($flag == true)
        {
            mysqli_close($conn);
        }
        else
        {
            $_SESSION['u_email'] = $email;
            $_SESSION['u_name_reg'] = $name;
            $slquery = "SELECT * FROM user_details WHERE email = '$email'";
            $selectresult = mysqli_query($conn,$slquery);
            if(mysqli_num_rows($selectresult)>0)
            {
                $_SESSION['register'] = false;
                $_SESSION['u_email'] = $email;
                echo '<script>';
                echo 'alert("EMAIL ALREADY EXIST! ")';
                echo'</script>';
                echo '<script language="javascript">';
                echo 'window.location.href = "login"';
                echo '</script>';  
                mysqli_close($conn);
            }

            $sql = "INSERT INTO user_details (name, email, password) VALUES ('$name','$email','$pass')";
            $query = mysqli_query($conn,$sql);
            $_SESSION['u_email'] = $email;
            if ($query == TRUE) 
            {
                $_SESSION['register'] = true;
                $_SESSION['u_email'] = $email;
                echo '<script>';
                echo 'alert("ID CREATED SUCCESSFULLY! ")';
                echo'</script>';
                echo '<script language="javascript">';
                echo 'window.location.href = "mail/register-mail.php"';
                echo '</script>';  
                mysqli_close($conn);
            }
        }

    }

     function test_input($data) 
     {
         $data = trim($data);//The trim() function removes whitespace and other predefined characters from both sides of a string. 
         $data = stripslashes($data);//The stripslashes() function removes backslashes added by the addslashes() function
         $data = htmlspecialchars($data);// The htmlspecialchars() function converts some predefined characters to HTML entities

         return $data;
     }
?>
<?php
	echo "<title>Create account-GOHUB</title>";
?>
<!DOCTYPE html>
<html>
    
    <body>
        <div class="login-wrapper">
            <section>
                <div class="box">
                    <header class="login_header">
                        <a href="login">
                            <button class="previous_login">
                                <span class="prev_wrapper">
                                    <img class="previous_login_icon" src="<?php echo base_url('templates/left-chevron.png');?>">
                                </span>
                            </button>
                        </a>
                        <a class="login_logo_box" href="index.php">
                            <img class="login_logo" src="<?php echo base_url('templates/branding.png');?>" alt="login_logo">
                        </a>
                    </header>
                    <div class="login-box">
                        <h1 class="headline">Login or Create an Account</h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input class="login_name" placeholder="Name" type="text" name="check_name" autocomplete="username" required autofocus="autofocus"><span class="error"><?php echo $nameErr; ?></span>
                            <input class="login_email" placeholder="Email Address" type="email" name="check_email"  autocomplete="user_pass" required autofocus="autofocus"><span class="error"><?php echo $emailErr; ?></span>
                            <input class="login_pass" placeholder="Password" type="password" name="check_pass"  required autofocus="autofocus"><span class="error"><?php echo $passErr; ?></span>
                            <button class="login-button" type="submit" name="register" value="register">Register</button>
                        </form>
                    </div>
                </div>
            </section>
            </div>
    </body>
</html>