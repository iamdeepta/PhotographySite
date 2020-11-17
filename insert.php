<?php 

session_start();
set_time_limit(0);
include 'db.php';


function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

/*XZcz7hyFl9nDkcm7sM8tm513xjy4Pk0m --- TinyPng API*/

/*function compressedImage($source, $path, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg'){ 
                $image = imagecreatefromjpeg($source);
              }

            elseif ($info['mime'] == 'image/gif') {
                $image = imagecreatefromgif($source);
              }

            elseif ($info['mime'] == 'image/png') {
                $image = imagecreatefrompng($source);
              }

            imagejpeg($image, $path, $quality);

    }*/
    /*require_once("vendor/autoload.php");
\Tinify\setKey("XZcz7hyFl9nDkcm7sM8tm513xjy4Pk0m");
 
if (isset($_POST['upload']) && $_SESSION['flag']=='ok') {

  $album_name = htmlspecialchars($_POST['album_name']);
  $panel_id = $_POST['panel_id'];
  $description_name = $_POST['description_name'];
  $description_title = $_POST['description_title'];
 



    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        

        $user_id = $_SESSION["id"];


        $des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);

 
    $supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');
 
    foreach($_FILES['file']['name'] as $key=>$val){
 
        $file_name = $_FILES['file']['name'][$key];
 
       
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
 
        
        $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
 
        if (in_array($_FILES['file']['type'][$key], $supported_image)) {
 
            if (!file_exists(getcwd(). '/assets/images')) {
 
                mkdir(getcwd(). '/assets/images', 0777);
            }
 
            $filename_to_store = $filenamewithoutextension. '_' .time(). '.' .$ext;
            move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/assets/images/' .$filename_to_store);
 
            
            try {
                $source = \Tinify\fromFile(getcwd(). '/assets/images/' .$filename_to_store);
                $source->toFile(getcwd(). '/assets/images/' .$filename_to_store);
            } catch(Exception $e) {
                echo $e->getMessage();
                exit;
            }

            $filename_to_store = "assets/images/".$filename_to_store;


            $insert_query = "INSERT INTO album
            SET   
              `title` = '{$album_name}',
              `panel_id` = '{$panel_id}',
              `user_id` = '{$user_id}',
              `description_title` = '{$des_title}',
              `description_name` = '{$des_name}',
              `picture` = '{$filename_to_store}'

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();


        }
        

        $msg_success = "The album has been uploaded successfully!";
        header("Location: upload_pictures.php?msg=".$msg_success);
    }
    

}*/



if (isset($_POST['upload']) && $_SESSION['flag']=='ok') {
	
	$album_name = htmlspecialchars($_POST['album_name']);
	$panel_id = $_POST['panel_id'];
	$description_name = $_POST['description_name'];
	$description_title = $_POST['description_title'];
	//$title = $_POST['title'];



		date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        

        $user_id = $_SESSION["id"];


        $des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);

        

    


        if($album_name!="" && $panel_id!=""){



        

        $output = '';  

       
        
        
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['file']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['file']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp3", "mp4");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['file']['tmp_name'][$name];  
                $targetPath = "assets/images/".$new_name;  


                compressedImage($sourcePath,$targetPath,60);


                $insert_query = "INSERT INTO album
 						SET 	
 							`title` = '{$album_name}',
 							`panel_id` = '{$panel_id}',
 							`user_id` = '{$user_id}',
 							`description_title` = '{$des_title}',
 							`description_name` = '{$des_name}',
 							`picture` = '{$targetPath}'

 							";



 		$insert = $connect->prepare($insert_query);
		$insert->execute();

		
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 

        $msg_success = "The album has been uploaded successfully!";
        header("Location: upload_pictures.php?msg=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: upload_pictures.php?msg_error=".$msg_error);

      }
 


    }else{
        $msg_error = "Please insert album name!";
        header("Location: upload_pictures.php?msg_error=".$msg_error);

      }



}




if (isset($_POST['yes_add_new_image']) && $_SESSION['flag']=='ok') {

  $msg = $_GET['msg'];
  
  
  $add_image = "
SELECT * from album where title='$msg' group by title
";

$result_add_image = $connect->prepare($add_image);
$result_add_image->execute();
$statement_add_image = $result_add_image->fetchAll(); 



foreach($statement_add_image as $image){

  $description_title = $image['description_title'];
  $description_name = $image['description_name'];
  $panel_id = $image['panel_id'];
}

$is_cover = 1;



    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];

 
    $supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');
 
    foreach($_FILES['file']['name'] as $key=>$val){
 
        $file_name = $_FILES['file']['name'][$key];
 
        // get file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
 
        // get filename without extension
        $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
 
        if (in_array($_FILES['file']['type'][$key], $supported_image)) {
 
            if (!file_exists(getcwd(). '/assets/images')) {
 
                mkdir(getcwd(). '/assets/images', 0777);
            }
 
            $filename_to_store = $filenamewithoutextension. '_' .time(). '.' .$ext;
            move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/assets/images/' .$filename_to_store);
 
            // optimize image using TinyPNG
            try {
                $source = \Tinify\fromFile(getcwd(). '/assets/images/' .$filename_to_store);
                $source->toFile(getcwd(). '/assets/images/' .$filename_to_store);
            } catch(Exception $e) {
                echo $e->getMessage();
                exit;
            }

            $filename_to_store = "assets/images/".$filename_to_store;


            $insert_query = "INSERT INTO album
            SET   
              `title` = '{$msg}',
              `panel_id` = '{$panel_id}',
              `user_id` = '{$user_id}',
              `description_title` = '{$description_title}',
              `description_name` = '{$description_name}',
              `is_cover` = '{$is_cover}',
              `picture` = '{$filename_to_store}'

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();


        }
        //echo $insert_query;

        $msg_success = "The pictures have been added successfully!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_success=".$msg_success);
    }
    //echo "Files uploaded successfully.";

}







/*if (isset($_POST['yes_add_new_image']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];
  
  
  $add_image = "
SELECT * from album where title='$msg' group by title
";

$result_add_image = $connect->prepare($add_image);
$result_add_image->execute();
$statement_add_image = $result_add_image->fetchAll(); 



foreach($statement_add_image as $image){

  $description_title = $image['description_title'];
  $description_name = $image['description_name'];
  $panel_id = $image['panel_id'];
}

$is_cover = 1;



    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
       

        $user_id = $_SESSION["id"];




        if($msg!=''){

        


        

        $output = '';  

        
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['file']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['file']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp3", "mp4");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['file']['tmp_name'][$name];  
                $targetPath = "assets/images/".$new_name;  
                

                $insert_query = "INSERT INTO album
            SET   
              `title` = '{$msg}',
              `panel_id` = '{$panel_id}',
              `user_id` = '{$user_id}',
              `description_title` = '{$description_title}',
              `description_name` = '{$description_name}',
              `is_cover` = '{$is_cover}',
              `picture` = '{$targetPath}'

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

                  
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 


        $msg_success = "The pictures have been added successfully!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_success=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_error=".$msg_error);

      }
 


    }else{

      $msg_error = "Please create an album first!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_error=".$msg_error);
    }



}*/





if (isset($_POST['yes_add_panel']) && $_SESSION["flag"] == "ok") {
    
//$msg_edit = $_GET['msg_edit'];

$panel_name = $_POST['panel_name'];
    //$getID = $_GET["id"];
    //$remove_status = 0;



    $panel_query = "INSERT INTO menu
                
                    SET 
                    
          
                    `menu_name` = '{$panel_name}'

                      " ;



    $panels = $connect->prepare($panel_query);
    $panels->execute();


        $msg_success = "The panel has been created successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);

    }







    if (isset($_POST['yes_sponsor']) && $_SESSION['flag']=='ok') {


  //$msg = $_GET['msg'];
  



    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];


        /*$des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);*/

        //$des_name= htmlspecialchars($des_name1);
        //$des_title= htmlspecialchars($des_title1);
    
      

        $output = '';  

        //if ($_FILES['file']['name']!=NULL) {
        
        
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['file_sponsor']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['file_sponsor']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp3", "mp4");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['file_sponsor']['tmp_name'][$name];  
                $targetPath = "assets/images/".$new_name;  
                /*$sql = "INSERT INTO tbl_images (id, location) VALUES (null, '{$targetPath}')";
                $image = mysqli_query($conn,$sql);*/
                //$is_last=1;

                $insert_query = "INSERT INTO sponsors
            SET   
              
              `user_id` = '{$user_id}',
             
              `sponsor_image` = '{$targetPath}'

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

                    

                    
                       /* $lastID2 = $connection->lastInsertID();
                        $file_id=$lastID2;*/
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 

          //echo $insert_query;

        $msg_success = "The images have been added successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: cpanel_home.php?msg_error=".$msg_error);

      }
 




}


?>