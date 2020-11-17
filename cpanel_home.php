<?php
session_start();
include 'db.php';

    if ($_SESSION["flag"] == "ok")
    {

      function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

//include 'db.php';
/*SELECT * FROM album where panel_id=2 group by title order by id desc*/

/*$albums = "
SELECT a.*, m.id as menu_id, m.menu_name FROM album as a left outer join menu as m on a.panel_id=m.id group by a.panel_id order by a.id desc
";

$result_albums = $connect->prepare($albums);
$result_albums->execute();
$statement_albums = $result_albums->fetchAll();*/ 

$id = $_SESSION['id'];

$users_info = "
SELECT * FROM users where id = $id";


$result_users_info = $connect->prepare($users_info);
$result_users_info->execute();
$statement_users_info = $result_users_info->fetchAll();

foreach($statement_users_info as $sui){

  $email = $sui['email'];
  $phone = $sui['phone'];
}


$heqader_logo1 = "
SELECT * FROM header_logo";


$result_heqader_logo1 = $connect->prepare($heqader_logo1);
$result_heqader_logo1->execute();
$statement_heqader_logo1 = $result_heqader_logo1->fetchAll();



foreach($statement_heqader_logo1 as $shl){

  $header_logo_image = $shl['image'];
  $header_logo_image2 = $shl['image2'];
  $header_logo_image3 = $shl['image3'];
  $header_logo_height = $shl['height'];
  $header_logo_width = $shl['width'];
  $header_logo_id = $shl['logo_id'];
  $header_large_text = $shl['large_text'];
  $header_small_text = $shl['small_text'];

}



$sponsor_image = "
SELECT * FROM sponsors order by sponsor_id desc";


$result_sponsor_image = $connect->prepare($sponsor_image);
$result_sponsor_image->execute();
$statement_sponsor_image = $result_sponsor_image->fetchAll();



$sponsor_count = "
SELECT count(sponsor_id) as id_count FROM sponsors";


$result_sponsor_count = $connect->prepare($sponsor_count);
$result_sponsor_count->execute();
$statement_sponsor_count = $result_sponsor_count->fetchAll();


foreach($statement_sponsor_count as $id_count){

  $sponsor_count = $id_count['id_count'];
}



$albums_home = "
SELECT * FROM album where panel_id=1 and is_cover in (0,2) group by title order by id desc
";

$result_albums_home = $connect->prepare($albums_home);
$result_albums_home->execute();
$statement_albums_home = $result_albums_home->fetchAll();


$albums_home1 = "
SELECT m.id as m_id, m.menu_name, m.active_status, a.* FROM menu as m left outer join album as a on a.panel_id = m.id where m.id not in (7,8,9) group by m.id order by m.id
";

$result_albums_home1 = $connect->prepare($albums_home1);
$result_albums_home1->execute();
$statement_albums_home1 = $result_albums_home1->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <title>Cpanel-Home</title>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>


  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      
      #carouselExampleSlidesOnly{

        margin-top: 27px !important;
      }

      #carousel_pic{

        height: 350px !important;
      }

      #about_me{

        margin-top: 220px !important;
        width: 415px !important;

      }

      #rony_image{

        width: 230px !important;
        height: 320px !important;
      }


      #text_with_camera{

        margin-left: 50% !important;
        width: 40% !important;
        margin-top: -15% !important;
      }


      #big_text{

        margin-left: -40% !important;
        font-size: 18px !important;
        margin-top: -170% !important;
      }

      #little_text{

        margin-left: -40% !important;
        font-size: 9px !important;
      }


      #camera_image{

        width: 150px !important;
        height: 100px !important;
        margin-top: -20% !important;
        margin-left: -40% !important;
      }


      .h0{
      opacity: 0 !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
      font-size: 18px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 12px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 0% !important;
    }

    /*#multi-item-example{

      margin-top: 30% !important;
      width: 400px !important;
      margin-left: -2% !important;
    }

    #sponsor_pic{

      height: 20px !important;
      width: 20px !important;
    }*/

    #multi-item-example{

      display: none !important;
    }

    #sponsor{

      margin-left: 0% !important;
    }


    


      
      

        }

        @media only screen and (min-width: 480px){

          #carouselExampleSlidesOnly{

        margin-top: 27px !important;
      }

      #carousel_pic{

        height: 400px !important;
      }



      #about_me{

        margin-top: 240px !important;
        width: 415px !important;

      }

      #rony_image{

        width: 230px !important;
        height: 320px !important;
      }


      #text_with_camera{

        margin-left: 60% !important;
        width: 40% !important;
        margin-top: -15% !important;
      }


      #big_text{

        margin-left: -40% !important;
        font-size: 18px !important;
        margin-top: -170% !important;
      }

      #little_text{

        margin-left: -40% !important;
        font-size: 9px !important;
      }


      #camera_image{

        width: 150px !important;
        height: 100px !important;
        margin-top: -20% !important;
        margin-left: -40% !important;
      }


      .h0{
      opacity: 0 !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
       font-size: 18px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 12px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 0% !important;
    }


    #multi-item-example{

      display: none !important;
    }

    #sponsor{

      margin-left: 5% !important;
    }

          
        

        }


        @media only screen and (min-width: 576px){

          #carouselExampleSlidesOnly{

        margin-top: 27px !important;
      }

      #carousel_pic{

        height: 450px !important;
      }



      #about_me{

        margin-top: 240px !important;
        width: 415px !important;

      }

      #rony_image{

        width: 230px !important;
        height: 320px !important;
      }


      #text_with_camera{

        margin-left: 60% !important;
        width: 40% !important;
        margin-top: 15% !important;
      }


      #big_text{

        margin-left: -40% !important;
        font-size: 18px !important;
        margin-top: -170% !important;
      }

      #little_text{

        margin-left: -40% !important;
        font-size: 9px !important;
      }


      #camera_image{

        width: 180px !important;
        height: 130px !important;
        margin-top: -7% !important;
        margin-left: -23% !important;
      }



      .h0{
      opacity: 0 !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
       font-size: 20px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 14px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 0% !important;
    }


    #multi-item-example{

      display: none !important;
    }

    #sponsor{

      margin-left: 0% !important;
    }
          
        

        }


        @media only screen and (min-width: 760px){

         
          #carouselExampleSlidesOnly{

        margin-top: 27px !important;
      }

      #carousel_pic{

        height: 550px !important;
      }


      #about_me{

        margin-top: 240px !important;
        width: 515px !important;

      }

      #rony_image{

        width: 270px !important;
        height: 370px !important;
      }


      #text_with_camera{

        margin-left: 60% !important;
        width: 40% !important;
        margin-top: 19% !important;
      }


      #big_text{

        margin-left: -40% !important;
        font-size: 20px !important;
        margin-top: -170% !important;
      }

      #little_text{

        margin-left: -40% !important;
        font-size: 10px !important;
      }


      #camera_image{

        width: 230px !important;
        height: 180px !important;
        margin-top: 8% !important;
        margin-left: -19% !important;
      }


      .h0{
      /*opacity: 0 !important;*/
      display: none !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
       font-size: 20px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 14px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 0% !important;
    }


    #multi-item-example{

      display: block !important;
    }
          
        

        }

        @media only screen and (min-width: 991px){

          
          #carouselExampleSlidesOnly{

        margin-top: 30px !important;
      }

      #carousel_pic{

        height: 600px !important;
      }



      #about_me{

        margin-top: 240px !important;
        width: 715px !important;

      }

      #rony_image{

        width: 350px !important;
        height: 470px !important;
      }


      #text_with_camera{

        margin-left: 60% !important;
        width: 20% !important;
        margin-top: 27% !important;
      }


      #big_text{

        margin-left: -40% !important;
        font-size: 22px !important;
        margin-top: -170% !important;
      }

      #little_text{

        margin-left: -40% !important;
        font-size: 10px !important;
      }


      #camera_image{

        width: 290px !important;
        height: 220px !important;
        margin-top: 14% !important;
        margin-left: -15% !important;
      }


      .h0{
      /*opacity: 0 !important;*/
      display: none !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
       font-size: 20px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 14px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 12% !important;
    }

    #multi-item-example{

      display: block !important;
    }
          

        }

        @media only screen and (min-width: 1200px){
         

         #carouselExampleSlidesOnly{

        margin-top: 120px !important;
      }

      #carousel_pic{

        height: 970px !important;
      }


      #about_me{

        margin-top: 380px !important;
        width: 1900px !important;

      }

      #rony_image{

        width: 600px !important;
        height: 798px !important;
      }


      #text_with_camera{

        margin-left: 11% !important;
        width: 21% !important;
        margin-top: 27% !important;
      }


      #big_text{

        margin-left: 90px !important;
        font-size: 50px !important;
        margin-top: -46% !important;
      }

      #little_text{

        margin-left: 100px !important;
        font-size: 12px !important;
      }


      #camera_image{

        width: 750px !important;
        height: 500px !important;
        margin-top: 14% !important;
        margin-left: -10% !important;
      }



      .h0{
      opacity: 0 !important;
      display: block !important;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center !important;
      color: white !important;
      margin-top: 0% !important;
    }

    .h1{
      font-weight: bold !important;
      font-family: sans-serif !important;
       font-size: 26px !important;
    }

    .h2{
      
      margin-top: 2% !important;
      font-size: 20px !important;
    }

    
    .img1{

      width: 8% !important;
      height: 8% !important;
      margin-top: 5% !important;
    }

    #contact{

      margin-left: 26% !important;
    }

    #multi-item-example{

      display: block !important;
    }

    #sponsor{

      margin-left: 10% !important;
    }
          

        }

</style>
  <!-- <style type="text/css">
    .modal {
    z-index: 100 !important;
    
}
  </style> -->

  <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' /> -->


  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      .div1{

        margin-left: 0px;

      }

      .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
      

        }

        @media only screen and (min-width: 480px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
          

        }

        @media only screen and (min-width: 767px){

          .div1{
               margin-left: 0px;

          }

          .revenue{

        margin-left: 20px !important;
      }

      .progress2{

        margin-left: 170px !important;
        margin-top: -8px !important;
      }
        

        }

        @media only screen and (min-width: 991px){

          .div1{

               margin-left: 0px;
          }

          .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

        @media only screen and (min-width: 1200px){
         .div1{
             margin-left: 0px;

         }

         .revenue{

        margin-left: 0px !important;
      }

      .progress2{

        margin-left: 40px !important;
        margin-top: 4px !important;
      }
          

        }

</style>

</head>


<body style="background-color: black">

  <div class="loader" style="background-color: black !important"></div>
  <script type="text/javascript">
    $(window).on("load", function () {
  $(".loader").fadeOut("slow");
});
  </script>


<?php include 'cpanel_header.php';?>


<?php if(isset($_GET['msg_success'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #cce8b7; height: 60px;text-align: center; ">  <!-- #DFF0D8 -->
          <label style="margin-top: 0px;color: green; ">
            <?php 
          
              echo $_GET['msg_success'];
          
          ?>
            
          </label>
        </div>
      </div>


      <!-- <span id="success_message"></span> -->

        <?php }

        ?>



        <?php if(isset($_GET['msg_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #FFE6EE; height: 60px;text-align: center;"> 
          <label style="margin-top: 0px;color: red ">

            <?php 
          
              echo $_GET['msg_error'];
          
          ?>
            
          </label>
        </div>
      </div>

        <?php }



        ?>



<div class="container">
  <div class="container gallery-container" style="margin-top: 70px;">
    <h4 class="text-center">Home Panel</h4>
    <!-- <p class="page-description text-center">Grid Layout With Zoom Effect</p> -->
    
    <div class="">
      <div class="row mb-3">

        <?php foreach($statement_albums_home as $ah){?>
        <div class="col-md-3 column" style="margin-top: 30px;">
          <!-- <div class="card"> -->
          <form action="" method="post">
          	
          	<button class="btn btn-danger btn-sm" type="button" name="delete_home[]" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter<?=$ah['title']?>">X</button>
            <button class="btn btn-warning btn-sm" type="button" name="transfer_home_album[]" style="float: left;" data-toggle="modal" data-target="#exampleModalHome<?=$ah['title']?>">Transfer</button>
          	<!-- <button class="btn btn-success" type="submit" name="edit[]" style="float: right;">Edit</button> -->
          </form>



          <div class="modal fade" id="exampleModalHome<?=$ah['title']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to transfer <i><?=$ah['title']?></i> album?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=encodeURIComponent($ah['title'])?>" method="post">
                <div class="form-group">
                      <label>Transfer To:</label><label style="color: red; margin-left: 4px;">*</label>
                      <select class="custom-select" id="transfer_album" name="transfer_album" style="font-size: 14px;">

                     
            <?php
                      foreach ($statement_albums_home1 as $sah1){
                        ?>
                      
                     <option value="<?=$sah1['m_id']?>" <?php if($ah['panel_id']==$sah1['m_id']){echo 'selected'; }?>><?=$sah1['menu_name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_transfer_album_home[]">Transfer</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>



          <div class="modal fade" id="exampleModalCenter<?=$ah['title']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove <i><?=$ah['title']?></i> album permanently?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=encodeURIComponent($ah['title'])?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_album_home[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>


            <a class="lightbox cols" href="cpanel_album_inside.php?msg=<?=encodeURIComponent($ah['title'])?>">
              <img src="<?=$ah['picture']?>" alt="" class="card-img-top" style="width:100%;height: 100%; object-fit: cover;">
           </a>
            <a href="cpanel_album_inside.php?msg=<?=encodeURIComponent($ah['title'])?>"><div class="middle">
    <div class="text"><?=$ah['title']?></div>
  </div></a>
          <!-- </div> -->
        </div>
        <?php }?>


      </div>
    </div>


  </div>
</div>


<div class="container" id="about_me" style="margin-top: 380px; width: 1900px;">
  <div class="row">
    <div class="col-sm-4" style="color: white; margin-left: -40px;">
      <a href="" data-toggle="modal" data-target="#exampleModalRonyImage"><img id="rony_image" src="<?=$header_logo_image2?>" style="width: 600px;height: 798px; margin-top: -5%"></a>
    </div>


    <div class="modal fade" id="exampleModalRonyImage" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Change Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$header_logo_id?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Choose Picture: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="file" name="files[]" id="files[]" class="form-control" accept="image/*" multiple>
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
                
                <button type="submit" class="btn btn-success" name="yes_image2">Upload</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>




    <div class="col-sm-7" id="text_with_camera" style="color: white; margin-left: 135px; ">
      <a href="" data-toggle="modal" data-target="#exampleModalText" style="text-decoration: none; color: white">
      <h1 id="big_text" style="font-weight: bold; font-size: 50px; text-align: center;margin-left: 90px;"><?=$header_large_text?></h1>
      <p id="little_text" style="font-size: 12px;margin-top: 20px; margin-left: 100px;text-align: center;"><?=$header_small_text?></p>
    </a>
      



      <div class="modal fade" id="exampleModalText" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Change Text</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$header_logo_id?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Large Text: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="large_text" id="large_text" value="<?=$header_large_text?>">
                    </div>

                    <div class="form-group">
                      <label>Small Text: </label><label style="color: red; margin-left: 4px;">*</label>
                      <textarea class="form-control" name="small_text" id="small_text"><?=$header_small_text?></textarea>
                      <!-- <input type="text" class="form-control" name="small_text" id="small_text" value="<?=$header_small_text?>"> -->
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
                
                <button type="submit" class="btn btn-success" name="yes_text">Update</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>




      <a href="" data-toggle="modal" data-target="#exampleModalCameraImage"><img id="camera_image" src="<?=$header_logo_image3?>" style="width: 750px;height: 500px; margin-top: 90px; margin-left:-6%;"></a>


      <div class="modal fade" id="exampleModalCameraImage" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Change Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$header_logo_id?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Choose Picture: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="file" name="file1[]" id="file1[]" class="form-control" accept="image/*" multiple>
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
                
                <button type="submit" class="btn btn-success" name="yes_image3">Upload</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>



    </div>





    <section class="section" id="contact">
    <div class="blank_div">
      <h1 class="h0">GET IN TOUCH</h1>
      <h1 class="h0">GET IN TOUCH</h1>
      <!-- <h1 class="h0">GET IN TOUCH</h1> -->
      
    </div>
    <div class="container cont1">
      <div class="column col1">
        <h1 class="h1">GET IN TOUCH</h1>
        <a href="" data-toggle="modal" data-target="#exampleModalInfo" style="color: white; text-decoration: none"><div class="div_email">
        <img class="img1 about_pic1" data-move-y="500px" src="assets/logos/email.png">
        <h6 class="h2 about_pic1" data-move-y="500px"><?=$email?></h6></a>
      </div></a>
      <a href="" data-toggle="modal" data-target="#exampleModalInfo" style="color: white; text-decoration: none;"><div class="div_phone">
        <img class="img1 about_pic1" data-move-y="500px" src="assets/logos/phone.png">
        <h6 class="h2 about_pic1" data-move-y="500px"><?=$phone?></h6>
      </div></a>
 
      </div>
      
    </div>
  </section>



  <div class="modal fade" id="exampleModalInfo" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Contact Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$id?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Email: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="email" id="email" value="<?=$email?>" required>
                    </div>

                    <div class="form-group">
                      <label>Phone: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="phone" id="phone" value="<?=$phone?>" required>
                      <!-- <input type="text" class="form-control" name="small_text" id="small_text" value="<?=$header_small_text?>"> -->
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
                
                <button type="submit" class="btn btn-success" name="yes_contact">Update</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>


  <style type="text/css">

    .section{
     margin-left: 26%;
    }

    .h0{
      opacity: 0;
    }

    .blank_div{
     /* margin-top: 15%;*/
    }

    .col1{
      text-align: center;
      color: white;
      margin-top: 0%;
    }

    .h1{
      font-weight: bold;
      font-family: sans-serif;
    }

    .h2{
      
      margin-top: 2%;
      font-size: 20px;
    }

    
    .img1{

      width: 8%;;
      height: 8%;
      margin-top: 5%;
    }
  </style>




    <div class="container" style="margin-top: 5%">
      <div style="text-align: center;">
      <h4 style="text-align: center;">Sponsors</h4>
      <button type="button" class="btn btn-primary btn-sm" name="add[]" data-toggle="modal" data-target="#exampleModalSponsorAdd">Add New Images</button>




      <div class="modal fade" id="exampleModalSponsorAdd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Add Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Choose Images: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="file" name="file_sponsor[]" id="file_sponsor[]" class="form-control" accept="image/*" multiple required>
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
                
                <button type="submit" class="btn btn-success" name="yes_sponsor">Upload</button>
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



<div class="row" id="sponsor" style="margin-top: 3%; margin-left: 16%; width: 90%">

        <?php foreach($statement_sponsor_image as $ssi){?>

          
        <img class="img-fluid" src="<?=$ssi['sponsor_image']?>" style="height: 40%;width: 10%; margin-left: 3%" alt="Card image cap">
        <div class="column">
          <button type="button" class="btn btn-danger btn-sm" name="delete[]" data-toggle="modal" data-target="#exampleModalSponsorDelete<?=$ssi['sponsor_id']?>">x</button>
          </div>
      




        <div class="modal fade" id="exampleModalSponsorDelete<?=$ssi['sponsor_id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove it permanently?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            <form action="update_remove.php?msg=<?=$ssi['sponsor_id']?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_sponsor_delete[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>




      <?php }?>
        
      </div>


    <!-- multi-item carousel -->

  <style type="text/css">
    @media (min-width: 768px) {
.carousel-multi-item-2 .col-md-2 {
float: left;
width: 16%;
max-width: 100%; } }

.carousel-multi-item-2 .card img {
border-radius: 2px; }

.fa_custom{
  color: white !important;
  
}
  </style>

        <!--/.Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel" data-interval="2000" data-pause=false style="margin-top: 150px;width: 100%; margin-left: 4%">

  <!--Controls-->
  <!-- <div class="controls-top">
    <a class="black-text" href="#multi-item-example" data-slide="prev" style="float: left;"><i class="fa fa-angle-left fa-0.5x pr-3 fa_custom" ></i></a>
    <a class="black-text" href="#multi-item-example" data-slide="next" style="float: right;"><i class="fa fa-angle-right fa-0.5x pl-3 fa_custom"></i></a>
  </div> -->
  <!--/.Controls-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <?php 

    $count = ceil($sponsor_count/6);

    $counter = 0;
    $imgarray = array();

    foreach($statement_sponsor_image as $sp_image) {
      $imgarray[] = $sp_image;
    }

    for($i =0; $i<$count; $i++){

      $counter++;

    ?>

    <!-- $start = $i*6;
    $end = $start + 6; -->

    <!--First slide-->
    <div class="carousel-item <?php if($counter==1){ echo 'active';}else{ echo '';}?>">


      <?php for($j=$i*6;$j<($i*6)+6;$j++){
    if (isset($imgarray[$j])) {?>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="<?=$imgarray[$j]['sponsor_image']?>"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">
        
      </div>

    <?php  } } ?>




    </div>

  <?php }?>
    <!--/.First slide-->

    <!--Second slide-->
    <!-- <div class="carousel-item">

      <div class="col-md-2 mb-3">
     
          <img class="img-fluid" src="assets/images/taagaman.png"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">
    
      </div>

      <div class="col-md-2 mb-3">
       
          <img class="img-fluid" src="assets/images/nabila.png"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">
             </div>

      <div class="col-md-2 mb-3">
       
          <img class="img-fluid" src="assets/images/stylesell.png"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">

      </div>

      <div class="col-md-2 mb-3">
       
          <img class="img-fluid" src="assets/images/uniqlo.jpg"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">
     
      </div>

      <div class="col-md-2 mb-3">
     
          <img class="img-fluid" src="assets/images/klubhous.jpg"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">

      </div>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/bowling.png"
            alt="Card image cap" style="height: 55%;width: 55%; text-align:center;">
      
      </div>

    </div> -->

    <!--/.Second slide-->

    <!--Third slide-->
    <!-- <div class="carousel-item">

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(64).jpg"
            alt="Card image cap">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(51).jpg"
            alt="Card image cap">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(59).jpg"
            alt="Card image cap">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(63).jpg"
            alt="Card image cap">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(59).jpg"
            alt="Card image cap">
        </div>
      </div>

      <div class="col-md-2 mb-3">
        <div class="card">
          <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(63).jpg"
            alt="Card image cap">
        </div>
      </div>

    </div> -->
    <!--/.Third slide-->

  </div>
  <!--/.Slides-->

</div>


  </div>
  </div>





    <!--Carousel Wrapper-->



<style type="text/css">

	.cols:hover{
		opacity: 0.3;
	}

	.column:hover .cols{
		opacity: 0.3;
	}


	.image:hover{
		opacity: 0.3;
		cursor: pointer;
		
	}

	.image{

backface-visibility: hidden;
		display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
	}
	
	.middle{
		transition: .5s ease;
		opacity: 1;
		position: absolute;
		text-align: center;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		border-radius: 20px;
		/*border: 1px solid white;*/
		width: 60%;


	}

	.col:hover .image{
		opacity: 0.3;
	}

	/*.middle:hover .tz-gallery{

		background-color: #ffffff00;
		cursor: pointer;
		transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
	}*/

	.text {
  background-color: #ffffff00;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  font-weight: bold;
}

.col {
  position: relative;
  width: 50%;
}
</style>
     
      <?php include 'footer.php';?>
    
 
  <?php include 'javascript.php';?>
</body>

</html>

<?php 


  ?>
  <!-- <script type="text/javascript">
    alert("Wrong Captcha!");
    window.location.href = "index.php";
  </script>
 -->
  <?php

  //header("location:index.php");
//}

?>
<?php }elseif($_SESSION["flag"] == "error_pass")
    {
      $msg = "The username or password is incorrect!";
        header("Location: cpanel.php?msg=".$msg);

    }elseif ($_SESSION["flag"] == "error_username") {
     $msg = "The username is incorrect!";
        header("Location: cpanel.php?msg=".$msg);

      }elseif($_SESSION["flag"] == "error_both") {
      	$msg = "The username and password is incorrect!";
        header("Location: cpanel.php?msg=".$msg);
      }else{
      	header("Location: cpanel.php");
      } ?>

