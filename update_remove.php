<?php

session_start();
include 'db.php';

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

/*function decodeURIComponent($str1) {
    $revert1 = array('!'=>'%21', '*'=>'%2A', "'"=>'%27', '('=>'%28', ')'=>'%29');
    return strtr(rawurlencode($str1), $revert1);
}*/

if (isset($_POST['yes_album1']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;
$delete_folder = "
SELECT * from album where id= $msg
";

$result_delete_folder = $connect->prepare($delete_folder);
$result_delete_folder->execute();
$statement_delete_folder = $result_delete_folder->fetchAll(); 


foreach($statement_delete_folder as $df){

  $path = $df['picture'];
  $title = $df['title'];
}

unlink($path);

    $delete_query = "DELETE FROM album
                
        
                     WHERE id = $msg " ;



    $delete = $connect->prepare($delete_query);
    $delete->execute();


        
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($title));

    }



    if ((isset($_POST['yes_album_home']) || isset($_POST['yes_album_fashion'])|| isset($_POST['yes_album_beauty']) || isset($_POST['yes_album_editorial']) || isset($_POST['yes_album_commercial']) || isset($_POST['yes_album_products'])) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;
$delete_folder1 = "
SELECT * from album where title= '$msg'
";

$result_delete_folder1 = $connect->prepare($delete_folder1);
$result_delete_folder1->execute();
$statement_delete_folder1 = $result_delete_folder1->fetchAll(); 

$panel_id = "
SELECT panel_id from album group by title having title= '$msg'
";

$result_panel_id = $connect->prepare($panel_id);
$result_panel_id->execute();
$statement_panel_id = $result_panel_id->fetchAll();


foreach($statement_panel_id as $pi){

  $panel = $pi['panel_id'];
}


foreach($statement_delete_folder1 as $df){

  $path = $df['picture'];
  $title = $df['title'];
  $panel_id = $df['panel_id'];

unlink($path);

    $delete_query1 = "DELETE FROM album
                
        
                     WHERE title = '$msg' " ;



    $delete1 = $connect->prepare($delete_query1);
    $delete1->execute();

  }

echo $delete_query1;

        if ($panel==1) {
          header("Location: cpanel_home.php");
      
        }else{
          $msg_success = "The album has been deleted successfully!";
          header("Location: cpanel_fashion.php?msg_menu=".$panel."&msg_success=".$msg_success);
        }
        

    }




    if (isset($_POST['update_album_inside']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

$title_name = htmlspecialchars($_POST['title_name']);
$description_title = $_POST['description_title'];
$description_name = $_POST['description_name'];

$update_album_inside = "
SELECT * from album where title= '$msg'
";

$result_update_album_inside = $connect->prepare($update_album_inside);
$result_update_album_inside->execute();
$statement_update_album_inside = $result_update_album_inside->fetchAll(); 

$description_t = implode(',', $description_title);
$description_n = implode(',', $description_name);


foreach($statement_update_album_inside as $uai){

  $path = $uai['picture'];
  $title = $uai['title'];

//unlink($path);

    $update_query = "UPDATE album
                
                    SET 
                    title = '{$title_name}',
                    description_name = '{$description_n}',
                    description_title = '{$description_t}'

                     WHERE title = '$msg' " ;



    $update = $connect->prepare($update_query);
    $update->execute();

  }

  /*$update_album_inside_fetch = "
SELECT * from album where title= '$msg' group by title
";

$result_update_album_inside_fetch = $connect->prepare($update_album_inside_fetch);
$result_update_album_inside_fetch->execute();
$statement_update_album_inside_fetch = $result_update_album_inside_fetch->fetchAll(); 

foreach($statement_update_album_inside_fetch as $uaif){

  $t = $uaif['title'];
}*/
//echo $update_query;

      $msg_success = "Updated Successfully!";
        
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($title_name)."&msg_success=".$msg_success);

    }




    if (isset($_POST['yes_transfer']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

$transfer_pic = $_POST['transfer_pic'];

$transfer_album_inside = "
SELECT * from album where id= $msg
";

$result_transfer_album_inside = $connect->prepare($transfer_album_inside);
$result_transfer_album_inside->execute();
$statement_transfer_album_inside = $result_transfer_album_inside->fetchAll(); 


$transfer_album_inside1 = "
SELECT * from album where panel_id= $transfer_pic group by title
";

$result_transfer_album_inside1 = $connect->prepare($transfer_album_inside1);
$result_transfer_album_inside1->execute();
$statement_transfer_album_inside1 = $result_transfer_album_inside1->fetchAll();


foreach($statement_transfer_album_inside1 as $stai1){

  $description_name = $stai1['description_name'];
  $description_title = $stai1['description_title'];
  $panel_id = $stai1['panel_id'];
  $title = $stai1['title'];
}

foreach($statement_transfer_album_inside as $stai){

  //$path = $stai['picture'];
  
$stai_title = $stai['title'];

//unlink($path);

    $update_query3 = "UPDATE album
                
                    SET 
                    title = '{$title}',
                    description_name = '{$description_name}',
                    description_title = '{$description_title}',
                    panel_id = '{$transfer_pic}'

                     WHERE id = $msg " ;



    $update3 = $connect->prepare($update_query3);
    $update3->execute();

  }

  //echo $update_query;
  

      $msg_success = "Transfered Successfully to ".$title." Album!";
        
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($stai_title)."&msg_success=".$msg_success);

    }





    if ((isset($_POST['yes_transfer_album_home']) || isset($_POST['yes_transfer_album_fashion']) || isset($_POST['yes_transfer_album_beauty']) || isset($_POST['yes_transfer_album_editorial']) || isset($_POST['yes_transfer_album_commercial']) || isset($_POST['yes_transfer_album_products'])) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

$transfer_panel = $_POST['transfer_album'];

$transfer_album = "
SELECT * from album where title= '$msg'
";

$result_transfer_album = $connect->prepare($transfer_album);
$result_transfer_album->execute();
$statement_transfer_album = $result_transfer_album->fetchAll(); 



$transfer_album2 = "
SELECT * from album where title= '$msg' group by panel_id order by id 
";

$result_transfer_album2 = $connect->prepare($transfer_album2);
$result_transfer_album2->execute();
$statement_transfer_album2 = $result_transfer_album2->fetchAll(); 


foreach($statement_transfer_album2 as $sta2){

  $panel_id2 = $sta2['panel_id'];
}



$transfer_album1 = "
SELECT m.id as m_id, m.menu_name, m.active_status, a.* FROM menu as m left outer join album as a on a.panel_id = m.id where m.id =$transfer_panel group by m.id order by m.id
";

$result_transfer_album1 = $connect->prepare($transfer_album1);
$result_transfer_album1->execute();
$statement_transfer_album1 = $result_transfer_album1->fetchAll();


foreach($statement_transfer_album1 as $sta1){

  //$description_name = $sta1['description_name'];
  //$description_title = $sta1['description_title'];
  $panel_id = $sta1['panel_id'];
  $menu_name = $sta1['menu_name'];
  //$title = $sta1['title'];
}

foreach($statement_transfer_album as $sta){

  //$path = $stai['picture'];
  
$sta_title = $sta['title'];
$sta_panel_id = $sta['panel_id'];

//unlink($path);

    $update_query1 = "UPDATE album
                
                    SET 
                    
                    panel_id = '{$transfer_panel}'

                     WHERE title = '$msg' " ;



    $update1 = $connect->prepare($update_query1);
    $update1->execute();

  }

  //echo $update_query1;
  

      $msg_success = "Transfered Successfully!";    /*to ".htmlspecialchars($menu_name)." Panel*/
        

        if ($sta_panel_id==1) {
          header("Location: cpanel_home.php?msg_success=".$msg_success);
        }else{
          header("Location: cpanel_fashion.php?msg_menu=".$panel_id2."&msg_success=".$msg_success);
        }
      

    }




    if (isset($_POST['make_cover']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

//$transfer_panel = $_POST['transfer_album'];

$make_cover = "
SELECT * from album where id=$msg
";

$result_make_cover = $connect->prepare($make_cover);
$result_make_cover->execute();
$statement_make_cover = $result_make_cover->fetchAll(); 


foreach($statement_make_cover as $smc){

  $smc_title = $smc['title'];
  $smc_panel_id = $smc['panel_id'];
}


$make_cover1 = "
SELECT * from album where title = '$smc_title' and id <> $msg
";

$result_make_cover1 = $connect->prepare($make_cover1);
$result_make_cover1->execute();
$statement_make_cover1 = $result_make_cover1->fetchAll();


foreach($statement_make_cover1 as $smc1){

  
  $id = $smc1['id'];
  //$smc1_panel_id = $smc1['panel_id'];
  
$one = 1;
$two = 2;

//unlink($path);

    $update_query1 = "UPDATE album
                
                    SET 
                    
                    is_cover = '{$one}'

                     WHERE id = $id " ;



    $update1 = $connect->prepare($update_query1);
    $update1->execute();


    $update_query2 = "UPDATE album
                
                    SET 
                    
                    is_cover = '{$two}'

                     WHERE id = $msg " ;



    $update2 = $connect->prepare($update_query2);
    $update2->execute();

  }

  //echo $update_query1;
  

      $msg_success = "Cover made successfully!";
        

        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($smc_title)."&msg_success=".$msg_success);
      

    }




    if (isset($_POST['yes_profile_edit'])  && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

$full_name = htmlspecialchars($_POST['full_name']);
$user_name = htmlspecialchars($_POST['user_name']);
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$user_profile = "
SELECT * from users where id= $msg
";

$result_user_profile = $connect->prepare($user_profile);
$result_user_profile->execute();
$statement_user_profile = $result_user_profile->fetchAll(); 



foreach($statement_user_profile as $sup){

  //$path = $stai['picture'];

$sup_full_name = $sup['full_name'];
$sup_user_name = $sup['user_name'];
$sup_password = $sup['user_password'];

//unlink($path);

  
  if ($current_password!='' && $current_password==$sup_password && $new_password==$confirm_password) {
  
    //if ($new_password==$confirm_password) {
    

    $update_query1 = "UPDATE users
                
                    SET 
                    
                    user_name = '{$user_name}',
                    full_name = '{$full_name}',
                    user_password = '{$new_password}'

                     WHERE id = $msg " ;



    $update1 = $connect->prepare($update_query1);
    $update1->execute();

//echo $update_query1;
  /*}elseif($new_password!=$confirm_password){

    $msg_error1 = "Passwords did not match! Please try again.";
    header("Location: cpanel_home.php?msg_error=".$msg_error1);
  }*/

  $msg_success = "Profile is updated successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success);

  }elseif($current_password!='' && $current_password==$sup_password && $new_password!=$confirm_password){

    $msg_error1 = "Passwords did not match!";
    header("Location: cpanel_home.php?msg_error=".$msg_error1);


  }
  elseif($current_password=='' && $new_password=='' && $confirm_password==''){

    $update_query1 = "UPDATE users
                
                    SET 
                    
                    user_name = '{$user_name}',
                    full_name = '{$full_name}'
                    

                     WHERE id = $msg " ;



    $update1 = $connect->prepare($update_query1);
    $update1->execute();

    $msg_success1 = "Profile is updated successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success1);


  }elseif($current_password=='' && $new_password!='' && $confirm_password!=''){

    $msg_error2 = "Please enter current password first!";
    header("Location: cpanel_home.php?msg_error=".$msg_error2);

  }elseif($current_password!='' && $current_password!=$sup_password && $new_password==$confirm_password){

    $msg_error3 = "Please enter correct current password!";
    header("Location: cpanel_home.php?msg_error=".$msg_error3);
  }

}

  //echo $update_query1;
  

      /*$msg_success = "The profile has been updated successfully!";
        

      header("Location: cpanel_home.php?msg=".$msg_success);*/
      

    }




    if (isset($_POST['yes_link_edit']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];
    //$getID = $_GET["id"];
    //$remove_status = 0;

$facebook_links = $_POST['facebook'];
$insta_links = $_POST['instagram'];
$youtube_links = $_POST['youtube'];

$facebook1 = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sm.social_name = 'Facebook'";


$result_facebook1 = $connect->prepare($facebook1);
$result_facebook1->execute();
$statement_facebook1 = $result_facebook1->fetchAll(); 


foreach($statement_facebook1 as $sf1){

//$fb_link1 = $sf1['link'];
$id1 = $sf1['id'];
$social_id1 = $sf1['social_id'];

}


$fb_count1 = $result_facebook1->rowCount();

if ($social_id1==NULL) {

  $insert_query1 = "INSERT INTO social_media_link
                
                    SET 
                    
                    social_media_id = '{$id1}',
                    user_id = '{$msg}',
                    link = '{$facebook_links}'

                      " ;



    $insert1 = $connect->prepare($insert_query1);
    $insert1->execute();


    $msg_success1 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success1);
  
}else{

  $insert_query1 = "UPDATE social_media_link
                
                    SET 
                    
          
                    link = '{$facebook_links}'

                     WHERE social_id = $social_id1 " ;



    $insert1 = $connect->prepare($insert_query1);
    $insert1->execute();

    $msg_success1 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success1);

}





$insta1 = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sm.social_name = 'Instagram'";


$result_insta1 = $connect->prepare($insta1);
$result_insta1->execute();
$statement_insta1 = $result_insta1->fetchAll(); 


foreach($statement_insta1 as $si1){

//$fb_link1 = $sf1['link'];
$id2 = $si1['id'];
$social_id2 = $si1['social_id'];

}


$insta_count1 = $result_insta1->rowCount();

if ($social_id2==0) {

  $insert_query2 = "INSERT INTO social_media_link
                
                    SET 
                    
                    social_media_id = '{$id2}',
                    user_id = '{$msg}',
                    link = '{$insta_links}'

                      " ;



    $insert2 = $connect->prepare($insert_query2);
    $insert2->execute();


    $msg_success2 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success2);
  
}else{

  $insert_query2 = "UPDATE social_media_link
                
                    SET 
                    
          
                    link = '{$insta_links}'

                     WHERE social_id = $social_id2 " ;



    $insert2 = $connect->prepare($insert_query2);
    $insert2->execute();

    $msg_success2 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success2);

}





$you1 = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sm.social_name = 'Youtube'";


$result_you1 = $connect->prepare($you1);
$result_you1->execute();
$statement_you1 = $result_you1->fetchAll(); 


foreach($statement_you1 as $sy1){

//$fb_link1 = $sf1['link'];
$id3 = $sy1['id'];
$social_id3 = $sy1['social_id'];

}


$you_count1 = $result_you1->rowCount();

if ($social_id3==0) {

  $insert_query3 = "INSERT INTO social_media_link
                
                    SET 
                    
                    social_media_id = '{$id3}',
                    user_id = '{$msg}',
                    link = '{$youtube_links}'

                      " ;



    $insert3 = $connect->prepare($insert_query3);
    $insert3->execute();


    $msg_success3 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success3);
  
}else{

  $insert_query3 = "UPDATE social_media_link
                
                    SET 
                    
          
                    link = '{$youtube_links}'

                     WHERE social_id = $social_id3 " ;



    $insert3 = $connect->prepare($insert_query3);
    $insert3->execute();

    $msg_success3 = "Links Updated Successfully!";
    header("Location: cpanel_home.php?msg_success=".$msg_success3);

}

      

    }






    if (isset($_POST['menu_delete']) && $_SESSION["flag"] == "ok") {
    
$msg_delete = $_GET['msg_delete'];
    //$getID = $_GET["id"];
    //$remove_status = 0;
$delete_menu = "
SELECT m.*, a.* from menu as m left outer join album as a on m.id = a.panel_id where a.panel_id= $msg_delete
";

$result_delete_menu = $connect->prepare($delete_menu);
$result_delete_menu->execute();
$statement_delete_menu = $result_delete_menu->fetchAll(); 


$delete_query = "DELETE FROM menu
                
        
                     WHERE id = $msg_delete " ;



    $delete = $connect->prepare($delete_query);
    $delete->execute();


foreach($statement_delete_menu as $dm){

  $pictures = $dm['picture'];
  //$title = $dm['title'];

unlink($pictures);



    $delete_query1 = "DELETE FROM album
                
        
                     WHERE panel_id = $msg_delete " ;



    $delete1 = $connect->prepare($delete_query1);
    $delete1->execute();

  }


        $msg_success = "The panel has been deleted successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);

    }







    if (isset($_POST['yes_menu_edit']) && $_SESSION["flag"] == "ok") {
    
$msg_edit = $_GET['msg_edit'];

$menu_item_name = $_POST['menu_item_name'];
    //$getID = $_GET["id"];
    //$remove_status = 0;
$edit_menu = "
SELECT * from menu where id= $msg_edit
";

$result_edit_menu = $connect->prepare($edit_menu);
$result_edit_menu->execute();
$statement_result_edit_menu = $result_edit_menu->fetchAll(); 




foreach($statement_result_edit_menu as $em){

  //$pictures = $dm['picture'];
  //$menu_name = $dm['menu_name'];

//unlink($pictures);



    $update_query = "UPDATE menu
                
                    SET 
                    
          
                    menu_name = '{$menu_item_name}'

                     WHERE id = $msg_edit " ;



    $update = $connect->prepare($update_query);
    $update->execute();

  }


        $msg_success = "The panel has been renamed successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);

    }





    if (isset($_POST['yes_edit_home']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];

$home_panel = $_POST['home_panel'];
    //$getID = $_GET["id"];
    //$remove_status = 0; 




/*foreach($statement_result_edit_menu as $em){*/

  //$pictures = $dm['picture'];
  //$menu_name = $dm['menu_name'];

//unlink($pictures);



    $update_query = "UPDATE menu
                
                    SET 
                    
          
                    menu_name = '{$home_panel}'

                     WHERE id = $msg " ;



    $update = $connect->prepare($update_query);
    $update->execute();

  //}


        $msg_success = "The panel has been renamed successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);

    }








    if (isset($_POST['yes_footer']) && $_SESSION["flag"] == "ok") {
    
$msg = $_GET['msg'];

$footer_name = $_POST['footer_name'];
    //$getID = $_GET["id"];
    //$remove_status = 0; 




/*foreach($statement_result_edit_menu as $em){*/

  //$pictures = $dm['picture'];
  //$menu_name = $dm['menu_name'];

//unlink($pictures);



    $update_query = "UPDATE footer
                
                    SET 
                    
          
                    name = '{$footer_name}'

                     WHERE footer_id = $msg " ;



    $update = $connect->prepare($update_query);
    $update->execute();

  //}


        $msg_success = "The footer has been changed successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);

    }






    if (isset($_POST['yes_header_logo']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];


        /*$des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);*/

        //$des_name= htmlspecialchars($des_name1);
        //$des_title= htmlspecialchars($des_title1);
    


        //if($msg!=''){

        


            /*$lastID = $conn->lastInsertID();
            $album_id=$lastID;*/

            $heqader_logo1 = "
SELECT * FROM header_logo where logo_id = $msg";


$result_heqader_logo1 = $connect->prepare($heqader_logo1);
$result_heqader_logo1->execute();
$statement_heqader_logo1 = $result_heqader_logo1->fetchAll();



foreach($statement_heqader_logo1 as $shl1){

  $header_logo_image = $shl1['image'];
  $header_logo_height = $shl1['height'];
  $header_logo_width = $shl1['width'];
  $header_logo_id = $shl1['logo_id'];

}
        

        $output = '';  

        //if ($_FILES['file']['name']!=NULL) {
        
        
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
                /*$sql = "INSERT INTO tbl_images (id, location) VALUES (null, '{$targetPath}')";
                $image = mysqli_query($conn,$sql);*/
                //$is_last=1;

                $insert_query = "UPDATE header_logo
            SET   
              `image` = '{$targetPath}',
              
              `user_id` = '{$user_id}'


              WHERE logo_id = $msg

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

    unlink($header_logo_image);

                    

                    
                       /* $lastID2 = $connection->lastInsertID();
                        $file_id=$lastID2;*/
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 

          //echo $insert_query;

        $msg_success = "The header logo has been updated successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: cpanel_home.php?msg_error=".$msg_error);

      }
 


    /*}else{

      $msg_error = "Please create an album first!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_error=".$msg_error);
    }*/



}





if (isset($_POST['yes_image2']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];


        /*$des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);*/

        //$des_name= htmlspecialchars($des_name1);
        //$des_title= htmlspecialchars($des_title1);
    


        //if($msg!=''){

        


            /*$lastID = $conn->lastInsertID();
            $album_id=$lastID;*/

            $heqader_logo = "
SELECT * FROM header_logo where logo_id = $msg";


$result_heqader_logo = $connect->prepare($heqader_logo);
$result_heqader_logo->execute();
$statement_heqader_logo = $result_heqader_logo->fetchAll();



foreach($statement_heqader_logo as $shl){

  $header_logo_image = $shl['image'];
  $header_logo_image2 = $shl['image2'];
  $header_logo_height = $shl['height'];
  $header_logo_width = $shl['width'];
  $header_logo_id = $shl['logo_id'];

}
        

        $output = '';  

        //if ($_FILES['file']['name']!=NULL) {
        
        
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['files']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['files']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp3", "mp4");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['files']['tmp_name'][$name];  
                $targetPath = "assets/images/".$new_name;  
                /*$sql = "INSERT INTO tbl_images (id, location) VALUES (null, '{$targetPath}')";
                $image = mysqli_query($conn,$sql);*/
                //$is_last=1;

                $insert_query = "UPDATE header_logo
            SET   
              `image2` = '{$targetPath}',
              
              `user_id` = '{$user_id}'


              WHERE logo_id = $msg

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

    unlink($header_logo_image2);

                    

                    
                       /* $lastID2 = $connection->lastInsertID();
                        $file_id=$lastID2;*/
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 

          //echo $insert_query;

        $msg_success = "The picture has been updated successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: cpanel_home.php?msg_error=".$msg_error);

      }
 


    /*}else{

      $msg_error = "Please create an album first!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_error=".$msg_error);
    }*/



}





if (isset($_POST['yes_image3']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];


        /*$des_name = implode(',', $description_name);
        $des_title = implode(',', $description_title);*/

        //$des_name= htmlspecialchars($des_name1);
        //$des_title= htmlspecialchars($des_title1);
    


        //if($msg!=''){

        


            /*$lastID = $conn->lastInsertID();
            $album_id=$lastID;*/

            $heqader_logo = "
SELECT * FROM header_logo where logo_id = $msg";


$result_heqader_logo = $connect->prepare($heqader_logo);
$result_heqader_logo->execute();
$statement_heqader_logo = $result_heqader_logo->fetchAll();



foreach($statement_heqader_logo as $shl){

  $header_logo_image = $shl['image'];
  $header_logo_image2 = $shl['image2'];
  $header_logo_image3 = $shl['image3'];
  $header_logo_height = $shl['height'];
  $header_logo_width = $shl['width'];
  $header_logo_id = $shl['logo_id'];

}
        

        $output = '';  

        //if ($_FILES['file']['name']!=NULL) {
        
        
 if(is_array($_FILES))   
 {  
      foreach ($_FILES['file1']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['file1']['name'][$name]);  
           $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp3", "mp4");  
           if(in_array($file_name[1], $allowed_ext))  
           {  
                $new_name = md5(rand()) . '.' . $file_name[1];  
                $sourcePath = $_FILES['file1']['tmp_name'][$name];  
                $targetPath = "assets/images/".$new_name;  
                /*$sql = "INSERT INTO tbl_images (id, location) VALUES (null, '{$targetPath}')";
                $image = mysqli_query($conn,$sql);*/
                //$is_last=1;

                $insert_query = "UPDATE header_logo
            SET   
              `image3` = '{$targetPath}',
              
              `user_id` = '{$user_id}'


              WHERE logo_id = $msg

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

    unlink($header_logo_image3);

                    

                    
                       /* $lastID2 = $connection->lastInsertID();
                        $file_id=$lastID2;*/
                if(move_uploaded_file($sourcePath, $targetPath))  
                {  
                }  

           } 

          //echo $insert_query;

        $msg_success = "The picture has been updated successfully!";
        header("Location: cpanel_home.php?msg_success=".$msg_success);




        
      } 

      } else{
        $msg_error = "Error occured while uploading images!";
        header("Location: cpanel_home.php?msg_error=".$msg_error);

      }
 


    /*}else{

      $msg_error = "Please create an album first!";
        header("Location: cpanel_album_inside.php?msg=".encodeURIComponent($msg)."&msg_error=".$msg_error);
    }*/



}





if (isset($_POST['yes_text']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];

  $big_text = $_POST['large_text'];
  $little_text = $_POST['small_text'];
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];



            $heqader_logo = "
SELECT * FROM header_logo where logo_id = $msg";


$result_heqader_logo = $connect->prepare($heqader_logo);
$result_heqader_logo->execute();
$statement_heqader_logo = $result_heqader_logo->fetchAll();



foreach($statement_heqader_logo as $shl){

  $header_logo_image = $shl['image'];
  $header_logo_image2 = $shl['image2'];
  $header_logo_image3 = $shl['image3'];
  $header_logo_height = $shl['height'];
  $header_logo_width = $shl['width'];
  $header_logo_id = $shl['logo_id'];
  $header_large_text = $shl['large_text'];
  $header_small_text = $shl['small_text'];

}
        

        

                $insert_query = "UPDATE header_logo
            SET   
              `large_text` = '{$big_text}',
              `small_text` = '{$little_text}',
              
              `user_id` = '{$user_id}'


              WHERE logo_id = $msg

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

    $msg_success = "The texts have been updated successfully!";
      header("Location: cpanel_home.php?msg_success=".$msg_success);

                    

                    



}






if (isset($_POST['yes_sponsor_delete']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];

  /*$big_text = $_POST['large_text'];
  $little_text = $_POST['small_text'];*/
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        $user_id = $_SESSION["id"];


$delete_folder = "
SELECT * from sponsors where sponsor_id= $msg
";

$result_delete_folder = $connect->prepare($delete_folder);
$result_delete_folder->execute();
$statement_delete_folder = $result_delete_folder->fetchAll(); 


foreach($statement_delete_folder as $sdf){

  $path = $sdf['sponsor_image'];
  //$title = $sdf['title'];
}

unlink($path);

    $delete_query = "DELETE FROM sponsors
                
        
                     WHERE sponsor_id = $msg " ;



    $delete = $connect->prepare($delete_query);
    $delete->execute();

    $msg_success = "The image has been deleted successfully!";
      header("Location: cpanel_home.php?msg_success=".$msg_success);

                    

                    



}





if (isset($_POST['yes_contact']) && $_SESSION['flag']=='ok') {


  $msg = $_GET['msg'];

  $email = $_POST['email'];
  $phone = $_POST['phone'];
  

    date_default_timezone_set("Asia/Dhaka");
        $date = date("Y/m/d");
        
        /*$database = new Database\Database;
        $connection = $database->connect();*/

        //$user_id = $_SESSION["id"];


        

                $insert_query = "UPDATE users
            SET   
              `email` = '{$email}',
              `phone` = '{$phone}'
              
              
              WHERE id = $msg

              ";



    $insert = $connect->prepare($insert_query);
    $insert->execute();

    //echo $insert_query;

    $msg_success = "The contacts info have been updated successfully!";
      header("Location: cpanel_home.php?msg_success=".$msg_success);

                    

                    



}


    ?>