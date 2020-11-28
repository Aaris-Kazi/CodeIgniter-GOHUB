<?php
session_start();
if(isset($_POST['BOOKING']))
{
    if(isset($_SESSION['login']))
	{
        $_SESSION['booking'] = true;
        $init_date = $_SESSION['init_date'];
        $final_date = $_SESSION['final_date'];
        $room = $_SESSION['room'];
        $user = $_SESSION['login_user_name'];
        $user_email = $_SESSION['login_user'];
        $nodays = $_SESSION['nodays'];
        $pid = $_POST['pid']; 
        
        $query = "SELECT * FROM hotels WHERE uid = '$pid'";
        $result = $this->db->query($query);
        $row = $result->row_array();
        $place = $row['trip_place'];
        $_SESSION['location'] = $place;
        $pic = $row['pic_hotel'];
        $_SESSION['pic'] = $pic;
        $hotel= $row['hotels'];
        $_SESSION['hotel_name'] = $hotel;
        $price= $row['price'];
        $price = $price * $nodays;
        $_SESSION['money'] = $price;
        $query = "INSERT INTO booking( user_name, email, location, hotel, init_date, final_date, room, price, pic_hotel) VALUES ('$user', '$user_email', '$place','$hotel', '$init_date','$final_date', '$room','$price','$pic')";
        
        $this->db->query($query);
        echo 'Insert successful';
        header('Location: /gohub');
    }
    else
    {
        echo 'PLease login ';
        header('Location: login');
    }
}

?>