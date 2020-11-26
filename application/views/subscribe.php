<?php
session_start();
    include "connect.php";
    if(isset($_POST['subscribe']))
    {
        $email = $_POST['email'];
        $slquery = "SELECT * FROM user_email WHERE email = '$email'";
        $selectresult = mysqli_query($conn,$slquery);
        if(mysqli_num_rows($selectresult)>0)
        {
            $_SESSION['subscribe'] = false;
            echo '<script>';
            echo 'alert("You have already subscribe! ")';
            echo'</script>';
            echo '<script language="javascript">';
            echo 'window.location.href = "index.php"';
            echo '</script>';
            mysqli_close($conn);  
        }

        $sql = "INSERT INTO user_email (email) VALUES ('$email')";
        $query = mysqli_query($conn,$sql);

        if ($query === TRUE) 
        {
            $_SESSION['subscribe'] = true;
            echo '<script>';
            echo 'alert("Thank you for subscribing ")';
            echo'</script>';
            echo '<script language="javascript">';
            echo 'window.location.href = "index.php"';
            echo '</script>';
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_connect_error();
        }

        mysqli_close($conn);   
    }
?>