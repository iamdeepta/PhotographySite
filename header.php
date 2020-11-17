<?php 
include 'db.php';


$facebook = "
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=1 and sm.social_name = 'Facebook'";


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
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=1 and sm.social_name = 'Instagram'";


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
SELECT sm.*, sml.* FROM social_media as sm left outer join social_media_link as sml on sml.social_media_id=sm.id where sml.user_id=1 and sm.social_name = 'Youtube'";


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




$menu_list = "
SELECT * FROM menu where id not in (1,7,8,9) order by id";


$result_menu_list = $connect->prepare($menu_list);
$result_menu_list->execute();
$statement_menu_list = $result_menu_list->fetchAll();



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


$menu_items1 = "
SELECT * FROM menu where id=1";


$result_menu_items1 = $connect->prepare($menu_items1);
$result_menu_items1->execute();
$statement_menu_items1 = $result_menu_items1->fetchAll();


foreach($statement_menu_items1 as $smi1){

  $home_panel = $smi1['menu_name'];
  $home_id = $smi1['id'];

}


$menu = "
SELECT * FROM menu where active_status=1
";

$result = $connect->prepare($menu);
$result->execute();
$statement = $result->fetchAll();


foreach($statement as $menus){


  $id = $menus['id'];
  $status = $menus['active_status'];
}


if (isset($_POST['home'])) {


  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: index.php");

}if (isset($_POST['fashion'])) {

  //$id = 1;
  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: fashion.php");
    
}if (isset($_POST['beauty'])) {

  //$id = 1;
  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: beauty.php");
    
}if (isset($_POST['editorial'])) {

  //$id = 1;
  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: editorial.php");
    
}if (isset($_POST['commercial'])) {

  //$id = 1;
  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: commercial.php");
    
}if (isset($_POST['products'])) {

  //$id = 1;
  $zero = 0;
  $one = 1;
  
  $query1 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 1 " ;



    $home1 = $connect->prepare($query1);
    $home1->execute();

    $query2 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 2 " ;



    $home2 = $connect->prepare($query2);
    $home2->execute();

    $query3 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 3 " ;



    $home3 = $connect->prepare($query3);
    $home3->execute();

    $query4 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 4 " ;



    $home4 = $connect->prepare($query4);
    $home4->execute();

    $query5 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 5 " ;



    $home5 = $connect->prepare($query5);
    $home5->execute();

    $query6 = "UPDATE menu
                 SET active_status = '{$one}'
        
                     WHERE id = 6 " ;



    $home6 = $connect->prepare($query6);
    $home6->execute();

    $query9 = "UPDATE menu
                 SET active_status = '{$zero}'
        
                     WHERE id = 9 " ;



    $home9 = $connect->prepare($query9);
    $home9->execute();

    header("Location: products.php");
    
}


?>

<style type="text/css">

  #btn_home{
    color: white;
  }
  #btn_fashion{
    color: white;
  }
  #btn_beauty{
    color: white;
  }
  #btn_editorial{
    color: white;
  }
  #btn_commercial{
    color: white;
  }
  #btn_products{
    color: white;
  }


  #btn_home:hover{
    color: gray;

  }
  #btn_fashion:hover{
    color: gray;

  }
  #btn_beauty:hover{
    color: gray;

  }
  #btn_editorial:hover{
    color: gray;

  }
  #btn_commercial:hover{
    color: gray;

  }
  #btn_products:hover{
    color: gray;

  }

  .contact:hover{
    color: gray;
  }

  /*.fashion:hover{
    color: gray;
  }

  .beauty:hover{
    color: gray;
  }

  .editorial:hover{
    color: gray;
  }

  .commercial:hover{
    color: gray;
  }

  .products:hover{
    color: gray;
  }

  .about_me:hover{
    color: gray;
  }

  .contact:hover{
    color: gray;
  }*/
  
</style>

<?php if($id==1){?>

<style type="text/css">
  
  #btn_home{
    color: gray;
  }
</style>
<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();


}elseif($id==2){?>

  <style type="text/css">
  
  #btn_fashion{
    color: gray;
  }
</style>

<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();
}elseif($id==3){?>

  <style type="text/css">
  
  #btn_beauty{
    color: gray;
  }
</style>

<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();
}elseif($id==4){?>

  <style type="text/css">
  
  #btn_editorial{
    color: gray;
  }
</style>
<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();
}elseif($id==5){?>

  <style type="text/css">
  
  #btn_commercial{
    color: gray;
  }
</style>
<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();
}elseif($id==6){?>

  <style type="text/css">
  
  #btn_products{
    color: gray;
  }
</style>
<?php 
$z =0;
$o =1;
$after_query1 = "UPDATE menu
                 SET active_status = '{$z}'
        
                     WHERE id = $id " ;



    $after_home1 = $connect->prepare($after_query1);
    $after_home1->execute();

    $after_query2 = "UPDATE menu
                 SET active_status = '{$o}'
        
                     WHERE id = 9 " ;



    $after_home2 = $connect->prepare($after_query2);
    $after_home2->execute();
}?>


<style type="text/css">
  @media only screen and (min-width: 320px){
        
      #logo_header{

        margin-left: 28% !important;
        margin-top: -13% !important;


      }

      #header_image{

        width: 60% !important;
      }

      #social_icon{

        margin-left: 33% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 35% !important;
      }

      #menu_panel{

        margin-left: 2% !important;
        width: 120% !important;
        margin-top: -1% !important;
      }

      #btn_fashion{

        margin-left: 0px !important;
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

        margin-left: 8% !important;
      }
      
      

        }

        @media only screen and (min-width: 480px){

          #logo_header{

        margin-left: 28% !important;
        margin-top: -11% !important;


      }

      #header_image{

        width: 60% !important;
      }

      #social_icon{

        margin-left: 37% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 38% !important;
      }

      #menu_panel{

        margin-left: 15% !important;
        width: 100% !important;
        margin-top: -1% !important;
      }

      #btn_fashion{

        margin-left: 0px !important;
        font-size: 12px !important;
      }

      #btn_home{
        font-size: 12px !important;
      }

      #social_image{

        margin-left: 14% !important;
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

        margin-left: 37% !important;
        /*margin-top: 0% !important;*/
        
      }

      #contact_info{
        margin-left: 38% !important;
      }

      #menu_panel{

        margin-left: 15% !important;
        width: 100% !important;
        margin-top: -1% !important;
      }

      #btn_fashion{

        margin-left: 0px !important;
        font-size: 14px !important;
      }

      #btn_home{
        font-size: 14px !important;
      }

      #social_image{

        margin-left: 28% !important;
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

        margin-left: 15% !important;
        width: 100% !important;
        margin-top: 40px !important;
      }

      #btn_fashion{

        margin-left: 18px !important;
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
        margin-left: 11% !important;
      }


      #menu_panel{

        margin-left: 14% !important;
        width: 90% !important;
        margin-top: 40px !important;
      }

      #btn_fashion{

        margin-left: 30px !important;
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

        margin-left: 25.5% !important;
        width: 56% !important;
        margin-top: 30px !important;
      }

      #btn_fashion{

        margin-left: 30px !important;
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

<div class="container" style="margin-top: 80px;">
  <div class="row" id="header1">
    <div class="row col-sm-5" id="social_icon" style="color: white; margin-left: -40px;">
      <a href="<?=$fb_link?>" id="logo_image" target="_blank"><img  src="assets/images/fb.png" id="icon_image" style="width: 38px; height: 35px;"></a>
      <a href="<?=$insta_link?>" id="logo_image" target="_blank"><img  src="assets/images/insta.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <a href="<?=$youtube_link?>" id="logo_image" target="_blank"><img  src="assets/images/youtube.png" id="icon_image" style="width: 37px; height: 37px;"></a>
    </div>



    <style type="text/css">

      #icon_image:hover{
        opacity: 0.6;
      }
    </style>

    <div class="col-sm-5" id="logo_header" style="color: white; margin-left: -2%; margin-top: -1%">
      <img  src="<?=$header_logo_image?>" id="header_image" >



      <div class="row" id="social_image" style="text-align: center;margin-left: 2%">

  <a href="<?=$fb_link?>" id="logo_image1" target="_blank" style="margin-left: 0px" ><img  src="assets/images/fb.png" id="icon_image" style="width: 38px; height: 35px; "></a>
      <a href="<?=$insta_link?>" id="logo_image1" target="_blank"><img  src="assets/images/insta.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      <a href="<?=$youtube_link?>" id="logo_image1" target="_blank"><img  src="assets/images/youtube.png" id="icon_image" style="width: 37px; height: 37px;"></a>
      </div>



    </div>
    <div class="row col-sm" id="contact_info" style="color: white; margin-left: 13%;">
      <a href="index.php#about_me" style="color: white; text-decoration: none;"><p class="contact" style="font-size: 10px;font-weight: bold">About me</p></a>
      <a href="index.php#contact" style="color: white; text-decoration: none;"><p class="contact" style="font-size: 10px; margin-left: 15px;font-weight: bold">Contact</p></a>
    </div>
  </div>


  <div class="row" id="menu_panel" style="margin-top: 40px;margin-left: 26.5%; width: 56%">

  	<!-- <div class="col-sm-2">
     
    </div> -->
    
    <div class="row col-sm menus" style="color: white; ">

      <!-- <form action="index.php" method="post"> -->
      <a href="index.php"><button  type="submit" id="btn_home" name="home" style="border:none; background: none; cursor: pointer;outline: none;margin-top: 10px;"><?=$home_panel?></button></a>
    <!-- </form> -->

    <?php foreach($statement_menu_list as $sml){?>
    <!-- <form action="fashion.php?msg_menus=<?=$sml['id']?>" method="post"> -->
      <a href="fashion.php?msg_menus=<?=$sml['id']?>"><button type="submit" id="btn_fashion" name="fashion" style="border:none; background: none; cursor: pointer;outline: none; margin-left: 30px;margin-top: 10px;"><?=$sml['menu_name']?></button></a>
      <!-- </form> -->

    <?php }?>

      <!-- <form action="beauty.php" method="post">
      <button type="submit" id="btn_beauty" name="beauty" style="border:none; background: none; cursor: pointer;outline: none;margin-left: 40px;">Beauty</button>
    </form>

    <form action="editorial.php" method="post">
      <button type="submit" id="btn_editorial" name="editorial" style="border:none; background: none; cursor: pointer;outline: none;margin-left: 40px;">Editorial</button>
    </form>

    <form action="commercial.php" method="post">
      <button type="submit" id="btn_commercial" name="commercial" style="border:none; background: none; cursor: pointer;outline: none;margin-left: 40px;">Commercial</button>
    </form>

    <form action="products.php" method="post">
      <button type="submit" id="btn_products" name="products" style="border:none; background: none; cursor: pointer;outline: none;margin-left: 40px;">Products</button>
    </form> -->
    </div>
  </div>
</div>




<script type="text/javascript">
  $(function(){
    $('.menus a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('.menus a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active')  
    })
  })
  </script>