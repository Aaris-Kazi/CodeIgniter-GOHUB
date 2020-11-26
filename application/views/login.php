<!DOCTYPE html>
<html>
    
<?php
    session_start();
    
    $email ='';
    $passErr = $emailErr = '';
    $u_email = $pass = '';
    if(isset($_SESSION['register']) ==true)
    {
        $email = $_SESSION['u_email'];
        $u_email = $email;

    }
    echo "<title>Login or Create account-GOHUB</title>";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $u_email = test_input($_POST["check_mail"]);
        $pass = test_input($_POST["check_pass"]);
        $flag = false;

        if (empty($_POST["check_mail"])) 
        {
            $emailErr = "Email is required";
            $flag = true;
        } 
        else 
        {
            $email = test_input($_POST["check_mail"]);
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
            $this->db->close();
            // mysqli_close($conn);
        }
        else
        {
            $query = "SELECT * FROM user_details WHERE email = '$u_email' AND password = '$pass' ";
            $result = $this->db->query($query);
            // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $row =  $result->result();
            // $count = mysqli_num_rows($result);
            $count = $result->num_rows();
            $slquery = "SELECT name FROM user_details WHERE email = '$u_email' AND password = '$pass'";
            $result1 = $this->db->query($slquery); // mysqli_query($conn,$slquery);
            // $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $row1 = $result1->row_array();
            
            if($count == 1) 
            {
                $name= $row1['name'];
                $_SESSION['login'] = true;
                $_SESSION['login_user'] = $u_email;
                $_SESSION['login_user_name'] = $name;
                echo '<script>';
                echo 'alert("LOGIN SUCCESSFULLY!")';
                echo'</script>';
                echo '<script language="javascript">';
                echo 'window.location.href = "/gohub"';
                echo '</script>';  
                    
                $this->db->close();
                // mysqli_close($conn);
            }
            else
            {
                echo "Invalid Password or Email ID";
            }
        } 
    }
    function test_input($data) 
     {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);

         return $data;
     }
?>
<head>
	
</head>
<body class="login_body">
<div class="login-wrapper">
            <section>
                <div class="box">
                    <header class="login_header">
                        <a href="/gohub">
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
                            <input class="login_email" placeholder="Email Address" type="email" name="check_mail" value="<?php echo $email;?>" autocomplete="username" required autofocus="autofocus">
                            <span class="error"><?php echo $emailErr; ?></span>
                            <input class="login_pass" placeholder="Password" type="password" name="check_pass" required autofocus="autofocus">
                            <span class="error"><?php echo $passErr; ?></span>
                            <button class="login-button" type="submit" name="login" value="login">Login</button>
                        </form>
                    </div>
                </div>
                <footer class="login_footer">
                    <h2 class="footer_message">Don't have an account yet?</h2>
                    <a href="register"><button class="reg_button">Create an Account</button></a>
                </footer>
            </section>
            </div>
</body>
</html>

