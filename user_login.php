<?php
session_start();

include 'db.php';

//if ($_POST['submit']) {


    //$username = strtolower($_POST["username"]);
    $username = $_POST["username"];
    $password = $_POST["pass"];
    //$user_answer = $_POST["answer"];
    //$pass = $password;
	
	

    $users = "
SELECT * FROM users where user_name = '$username'";


$results = $connect->prepare($users);
$results->execute();
$statements = $results->fetchAll();

	
    foreach ($statements as $user) {

    //$user['user_name'] = strtolower($user['user_name']);
    
        if($user['user_name'] == $username && $user['user_password'] == $password)
        {
            $_SESSION["flag"]="ok";
			$_SESSION["id"] = $user['id'];
			//$_SESSION["OfficeID"] = $user['OfficeID'];
			//$_SESSION["OfficeName"] = $user['OfficeName'];
            $_SESSION["user_name"] = $username;
            $_SESSION["full_name"] = $user['full_name'];
            //$_SESSION["privilege"] = $user['privilege'];
            header ("Location: cpanel_home.php");

            }elseif($user['user_name'] == $username && $user['user_password'] != $password)  {

                $_SESSION["flag"]="error_pass";
            
            header ("Location: cpanel_home.php");

            }elseif($user['user_name'] != $username && $user['user_password'] == $password)  {

                $_SESSION["flag"]="error_username";
            
            header ("Location: cpanel_home.php");

            }elseif ($user['user_name'] != $username && $user['user_password'] != $password) {
                $_SESSION["flag"]="error_both";

                header ("Location: cpanel_home.php");
            }

        }

        

        /*else if ($user['username'] == $username && $user['password'] == $password && $user['privilege'] == "staff")
        {
            $_SESSION["flag"]="ok";
            $_SESSION["username"] = $username;
            $_SESSION["privilege"] = $user['privilege'];
            header ("Location: ../../resources/views/php/Logged_in_staff.php");
        }*/


    

     //echo "Please enter correct username or password<br/>";
     //echo "<a href='index.php'><button>Back</button></a><br/>";


    header("Location: cpanel_home.php");
//}
?>