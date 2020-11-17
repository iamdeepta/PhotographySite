<style type="text/css">
  @media only screen and (min-width: 320px){
        
      #logo_header{

        margin-left: 28% !important;
        margin-top: -16% !important;


      }

      #header_image{

        width: 60% !important;
      }

      #social_icon{

        margin-left: 28% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 35% !important;
      }

      #menu_panel{

        margin-left: -4% !important;
        width: 120% !important;
        margin-top: 2% !important;
      }

      #btn_fashion{

        margin-left: 4px !important;
        font-size: 12px !important;
      }

      #btn_home{
        font-size: 12px !important;
      }


      #logo_image1{

        display: block !important;
      }

      #social_icon{
        display: none !important;
      }

      #social_image{

        margin-left: 0% !important;
      }
      
      

        }

        @media only screen and (min-width: 480px){

          #logo_header{

        margin-left: 28% !important;
        margin-top: -12% !important;


      }

      #header_image{

        width: 60% !important;
      }

      #social_icon{

        margin-left: 30% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 35% !important;
      }

      #menu_panel{

        margin-left: 4% !important;
        width: 100% !important;
        margin-top: 2% !important;
      }

      #btn_fashion{

        margin-left: 6px !important;
        font-size: 12px !important;
      }

      #btn_home{
        font-size: 12px !important;
      }

      #social_image{

        margin-left: 5% !important;
      }

          
        

        }


        @media only screen and (min-width: 576px){

          #logo_header{

        margin-left: 27% !important;
        margin-top: -8% !important;


      }

      #header_image{

        width: 120% !important;
      }

      #social_icon{

        margin-left: 33% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 38% !important;
      }

      #menu_panel{

        margin-left: -10% !important;
        width: 120% !important;
        margin-top: 4% !important;
      }

      #btn_fashion{

        margin-left: 8px !important;
        font-size: 14px !important;
      }

      #btn_home{
        font-size: 14px !important;
      }

      #social_image{

        margin-left: 13% !important;
      }

          
        

        }


        @media only screen and (min-width: 760px){

         #logo_header{

        margin-left: -4% !important;
        margin-top: -3% !important;


      }

      #header_image{

        width: 110% !important;
      }

      #social_icon{

        margin-left: -40px !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 10% !important;
      }


      #menu_panel{

        margin-left: -4% !important;
        width: 100% !important;
        margin-top: 40px !important;
      }

      #btn_fashion{

        margin-left: 12px !important;
        font-size: 14px !important;
      }

      #btn_home{
        font-size: 14px !important;
      }

      #logo_image1{

        display: none !important;
      }

      #social_icon{
        display: block !important;
      }

          
        

        }

        @media only screen and (min-width: 991px){

          #logo_header{

        margin-left: -2% !important;
        margin-top: -1% !important;


      }

      #header_image{

        width: 100% !important;
      }

      #social_icon{

        margin-left: -40px !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 9% !important;
      }


      #menu_panel{

        margin-left: -12% !important;
        width: 120% !important;
        margin-top: 40px !important;
      }

      #btn_fashion{

        margin-left: 12px !important;
        font-size: 14px !important;
      }

      #btn_home{
        font-size: 14px !important;
      }

      #logo_image1{

        display: none !important;
      }

      #social_icon{
        display: block !important;
      }

          

        }

        @media only screen and (min-width: 1200px){
         

         #logo_header{

        margin-left: -2% !important;
        margin-top: -1% !important;


      }

      #header_image{

        width: 70% !important;
      }

      #social_icon{

        margin-left: -40px !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 13% !important;
      }


      #menu_panel{

        margin-left: 10% !important;
        width: 75% !important;
        margin-top: 50px !important;
      }

      #btn_fashion{

        margin-left: 10px !important;
        font-size: 14px !important;
      }

      #btn_home{
        font-size: 14px !important;
      }

      #logo_image1{

        display: none !important;
      }

      #social_icon{
        display: block !important;
      }
          

        }

</style>

<?php 

$id = $_SESSION['id'];

$users1 = "
SELECT * FROM users where id = $id";


$result_users1 = $connect->prepare($users1);
$result_users1->execute();
$statement_users1 = $result_users1->fetchAll();



foreach($statement_users1 as $su1){

  $full_name = $su1['full_name'];
  $user_name = $su1['user_name'];

}


$heqader_logo = "
SELECT * FROM header_logo";


$result_heqader_logo = $connect->prepare($heqader_logo);
$result_heqader_logo->execute();
$statement_heqader_logo = $result_heqader_logo->fetchAll();



foreach($statement_heqader_logo as $shl){

  $header_logo_image = $shl['image'];
  $header_logo_height = $shl['height'];
  $header_logo_width = $shl['width'];
  $header_logo_id = $shl['logo_id'];

}



$menu_items = "
SELECT * FROM menu where id not in (1,7,8,9) order by id";


$result_menu_items = $connect->prepare($menu_items);
$result_menu_items->execute();
$statement_menu_items = $result_menu_items->fetchAll();





$menu_items1 = "
SELECT * FROM menu where id=1";


$result_menu_items1 = $connect->prepare($menu_items1);
$result_menu_items1->execute();
$statement_menu_items1 = $result_menu_items1->fetchAll();


foreach($statement_menu_items1 as $smi1){

  $home_panel = $smi1['menu_name'];
  $home_id = $smi1['id'];

}




$facebook = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=$id and sm.social_name = 'Facebook'";


$result_facebook = $connect->prepare($facebook);
$result_facebook->execute();
$statement_facebook = $result_facebook->fetchAll();

$fb_count = $result_facebook->rowCount();

if ($fb_count==0) {
  $fb_link = '';
}else{

foreach($statement_facebook as $sf){

$fb_link = $sf['link'];

}

}



$instagram = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=$id and sm.social_name = 'Instagram'";


$result_instagram = $connect->prepare($instagram);
$result_instagram->execute();
$statement_instagram = $result_instagram->fetchAll();

$insta_count = $result_instagram->rowCount();

if ($insta_count==0) {
  $insta_link = '';
}else{

foreach($statement_instagram as $si){

$insta_link = $si['link'];

}

}



$youtube = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=$id and sm.social_name = 'Youtube'";


$result_youtube = $connect->prepare($youtube);
$result_youtube->execute();
$statement_youtube = $result_youtube->fetchAll();

$youtube_count = $result_youtube->rowCount();

if ($youtube_count==0) {
  $youtube_link = '';
}else{

foreach($statement_youtube as $sy){

$youtube_link = $sy['link'];

}

}


?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class="row col-sm-5" id="social_icon" style="color: white; margin-left: -40px;">
      <a href="<?=$fb_link?>" id="logo_image" target="_blank"><img  src="assets/images/fb.png" id="icon_image" style="width: 38px; height: 35px;"></a>
      <a href="<?=$insta_link?>" id="logo_image" target="_blank"><img  src="assets/images/insta.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <a href="<?=$youtube_link?>" id="logo_image" target="_blank"><img  src="assets/images/youtube.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <button type="button" class="btn btn-primary btn-sm" name="social_media" style="border-radius: 29px;height: 36px;margin-left: 5px;" data-toggle="modal" data-target="#exampleModalSocial">Edit</button>
    </div>

    <style type="text/css">

      #icon_image:hover{
        opacity: 0.6;
      }
    </style>



    <div class="modal fade" id="exampleModalSocial" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Edit Social Links</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$id?>" method="post">
                <div class="form-group">
                      <label>Facebook: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="facebook" value="<?=$fb_link?>">
                    </div>

                    <div class="form-group">
                      <label>Instagram: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="instagram" value="<?=$insta_link?>">
                    </div>

                    <div class="form-group">
                      <label>Youtube: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="youtube" value="<?=$youtube_link?>">
                    </div>


              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_link_edit">Save</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>




    <div class="col-sm-5" id="logo_header" style="color: white; margin-left: -2%; margin-top: -1%">
      <a href="" data-toggle="modal" data-target="#exampleModalLogo"><img  src="<?=$header_logo_image?>" id="header_image" ></a>


      <div class="row" id="social_image" style="text-align: center;margin-left: 2%">

  <a href="<?=$fb_link?>" id="logo_image1" target="_blank" style="margin-left: 0px" ><img  src="assets/images/fb.png" id="icon_image" style="width: 38px; height: 35px; "></a>
      <a href="<?=$insta_link?>" id="logo_image1" target="_blank"><img  src="assets/images/insta.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <a href="<?=$youtube_link?>" id="logo_image1" target="_blank"><img  src="assets/images/youtube.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <button type="button" class="btn btn-primary btn-sm" name="social_media" id="logo_image1" style="border-radius: 29px;height: 36px;margin-left: 5px;" data-toggle="modal" data-target="#exampleModalSocial">Edit</button>
      </div>



    </div>



    <div class="modal fade" id="exampleModalLogo" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Change Header Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$header_logo_id?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Choose Logo: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="file" name="file[]" id="file[]" class="inputfile" accept="image/*" multiple>
                    </div>

                    <!-- <div class="form-group">
                      <label>Username: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="user_name" value="<?=$user_name?>" required>
                    </div>

                    <div class="form-group">
                      <label>Current Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="current_password">
                    </div>

                    <div class="form-group">
                      <label>New Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="new_password">
                    </div>

                    <div class="form-group">
                      <label>Confirm Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="confirm_password">
                    </div> -->

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-success" name="yes_header_logo">Upload</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>





    <div class="row col-sm" id="contact_info" style="color: white; margin-left: 80px;">
      <a href="" style="color: white; text-decoration: none;" data-toggle="modal" data-target="#exampleModalUser<?=$_SESSION['id']?>"><p class="contact" style="font-size: 10px;font-weight: bold"><?=$full_name?></p></a>
      <a href="user_logout.php" style="color: white; text-decoration: none;margin-left: 15px;"><p class="contact" style="font-size: 10px;font-weight: bold">Logout</p></a>


      <div class="modal fade" id="exampleModalUser<?=$_SESSION['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Profile Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$id?>" method="post">
                <div class="form-group">
                      <label>Full Name: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="full_name" value="<?=$full_name?>" required>
                    </div>

                    <div class="form-group">
                      <label>Username: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="user_name" value="<?=$user_name?>" required>
                    </div>

                    <div class="form-group">
                      <label>Current Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="current_password">
                    </div>

                    <div class="form-group">
                      <label>New Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="new_password">
                    </div>

                    <div class="form-group">
                      <label>Confirm Password: </label><label style="color: red; margin-left: 4px;"></label>
                      <input type="password" class="form-control" name="confirm_password">
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_profile_edit">Save</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>
      
      
    </div>
  </div>


  <div style="text-align: center;"><button type="button" class="btn btn-primary btn-sm" name="add_new_panel" style="text-align: center;" data-toggle="modal" data-target="#exampleModalAddMenu">Add New Panel</button></div>



  <div class="modal fade" id="exampleModalAddMenu" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Add a New Panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="insert.php" method="post">
                <div class="form-group">
                      <label>Panel Name: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="panel_name" required>
                    </div>

                    <!-- <div class="form-group">
                      <label>Instagram: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="instagram" value="<?=$insta_link?>">
                    </div>

                    <div class="form-group">
                      <label>Youtube: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="youtube" value="<?=$youtube_link?>">
                    </div> -->


              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_add_panel">Create</button>
              </form>
            <?php //}
              ?>
              <!-- <form action="update_remove.php?msg_delete=<?=$items['id']?>" method="post">
                <button type="submit" style="background-color: red" class="btn btn-secondary" name="menu_delete[]" >Delete Panel Permanently</button>
              </form> -->
              </div>
            </div>
          </div>
        </div>




  <div class="row" id="menu_panel" style="margin-top: 50px;margin-left: 10%; width: 75%">

  	<div class="col-sm-1">
     
    </div>
    
    <div class="row col-sm" style="color: white; ">

      <a href="cpanel_home.php" id="btn_home" style="text-decoration: none; margin-left: 10px;color: white" ><p style="color: white;"><?=$home_panel?></a><button class="btn btn-success btn-sm" style="border-radius: 15px;height: 26px;" name="btn_products_update" data-toggle="modal" data-target="#exampleModalEditMenuHome">✐</button></p>




      <div class="modal fade" id="exampleModalEditMenuHome" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Update <i><?=$home_panel?></i> Panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$home_id?>" method="post">
                <div class="form-group">
                      <label>Name: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="home_panel" value="<?=$home_panel?>" required>
                    </div>

                    <!-- <div class="form-group">
                      <label>Instagram: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="instagram" value="<?=$insta_link?>">
                    </div>

                    <div class="form-group">
                      <label>Youtube: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="youtube" value="<?=$youtube_link?>">
                    </div> -->


              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_edit_home">Update</button>
              </form>
            <?php //}
              ?>
              <!-- <form action="update_remove.php?msg_delete=<?=$items['id']?>" method="post">
                <button type="submit" style="background-color: red" class="btn btn-secondary" name="menu_delete[]" >Delete Panel Permanently</button>
              </form> -->
              </div>
            </div>
          </div>
        </div>




    	<!-- <div class="col-sm-1"></div> -->
      <?php foreach($statement_menu_items as $items){

  ?>

      <a href="cpanel_fashion.php?msg_menu=<?=$items['id']?>" id="btn_fashion" style="text-decoration: none; margin-left: 10px; color: white"><p style="color: white;"><?=$items['menu_name']?></a><button type="button" class="btn btn-success btn-sm" style="border-radius: 15px;height: 26px;" name="btn_products_update" data-toggle="modal" data-target="#exampleModalEditMenu<?=$items['id']?>">✐</button><!-- <button class="btn btn-danger btn-sm" style="border-radius: 15px;height: 26px;" name="btn_products_delete">x</button> --></p>




      <div class="modal fade" id="exampleModalEditMenu<?=$items['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Update <i><?=$items['menu_name']?></i> Panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg_edit=<?=$items['id']?>" method="post">
                <div class="form-group">
                      <label>Name: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="menu_item_name" value="<?=$items['menu_name']?>" required>
                    </div>

                    <!-- <div class="form-group">
                      <label>Instagram: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="instagram" value="<?=$insta_link?>">
                    </div>

                    <div class="form-group">
                      <label>Youtube: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="youtube" value="<?=$youtube_link?>">
                    </div> -->


              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_menu_edit[]">Update</button>
              </form>
            <?php //}
              ?>
              <form action="update_remove.php?msg_delete=<?=$items['id']?>" method="post">
                <button type="submit" style="background-color: red" class="btn btn-secondary" name="menu_delete[]" >Delete Panel Permanently</button>
              </form>
              </div>
            </div>
          </div>
        </div>




    <?php }?>
      <!-- <a href="cpanel_fashion.php" style="text-decoration: none"><p style="color: white;margin-left: 30px;">Fashion</p></a>
      <a href="cpanel_beauty.php" style="text-decoration: none"><p style="color: white;margin-left: 30px;">Beauty</p></a>
      <a href="cpanel_editorial.php" style="text-decoration: none"><p style="color: white;margin-left: 30px;">Editorial</p></a>
      <a href="cpanel_commercial.php" style="text-decoration: none"><p style="color: white;margin-left: 30px;">Commercial</p></a>
      <a href="cpanel_products.php" style="text-decoration: none"><p style="color: white;margin-left: 30px;">Products<button class="btn btn-success btn-sm" style="border-radius: 15px;height: 26px;" name="btn_products_update">✐</button><button class="btn btn-danger btn-sm" style="border-radius: 15px;height: 26px;" name="btn_products_delete">x</button></p></a> -->
   
    <a href="upload_pictures.php" id="btn_home" style="text-decoration: none"><p style="color: white; margin-left: 30px;">Upload Album</p></a>

      <!-- <a href="update_about_me.php" style="text-decoration: none"><p style="color: white; margin-left: 30px;">About me</p></a>
      <a href="update_contact.php" style="text-decoration: none"><p style="color: white; margin-left: 30px;">Contact</p></a> -->

    </div>
  </div>

</div>



