<?php
include 'db.php';


//$id = $_SESSION['id'];

$users_info = "
SELECT * FROM users";


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
SELECT * FROM sponsors order by sponsor_id asc";


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



$home = "
SELECT * FROM album where panel_id=1 order by id desc
";

$result_home = $connect->prepare($home);
$result_home->execute();
$statement_home = $result_home->fetchAll(); 
?>
<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<title>Home</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->

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
        line-height: 15px !important;
      }


      #camera_image{

        width: 220px !important;
        height: 150px !important;
        margin-top: -10% !important;
        margin-left: -70% !important;
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


    #multi-item-example{

      display: none !important;
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
        line-height: 15px !important;
      }


      #camera_image{

        width: 220px !important;
        height: 150px !important;
        margin-top: -10% !important;
        margin-left: -70% !important;
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


    #multi-item-example{

      display: none !important;
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
        line-height: 15px !important;
      }


      #camera_image{

        width: 250px !important;
        height: 180px !important;
        margin-top: -7% !important;
        margin-left: -43% !important;
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

    #multi-item-example{

      display: none !important;
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
        line-height: 16px !important;
      }


      #camera_image{

        width: 290px !important;
        height: 220px !important;
        margin-top: 8% !important;
        margin-left: -30% !important;
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
        line-height: 17px !important;
      }


      #camera_image{

        width: 370px !important;
        height: 270px !important;
        margin-top: 14% !important;
        margin-left: -25% !important;
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



    #multi-item-example{

      display: block !important;
    }
          

        }

        @media only screen and (min-width: 1200px){
         

         #carouselExampleSlidesOnly{

        margin-top: 120px !important;
      }

      #carousel_pic{

        height: 100% !important;
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
        line-height: 18px !important;
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

    #multi-item-example{

      display: block !important;
    }
          

        }

</style>

</head>
<body style="background-color: black;">

  <div class="loader" style="background-color: black !important"></div>
  <script type="text/javascript">
    $(window).on("load", function () {
  $(".loader").fadeOut("slow");
});
  </script>

<?php include 'header.php';?>


<div id="carouselExampleSlidesOnly" style="margin-top: 120px;" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500" data-pause=false>
  <div class="carousel-inner">

  	<?php 
  	$counter = 0;
  	foreach($statement_home as $sh){
  		$counter++;
  		//if ($counter==1) {
  		?>
    <div class="carousel-item <?php if($counter==1){echo 'active';}else{echo '';}?>">
      <img class="d-block w-100" id="carousel_pic" src="<?=$sh['picture']?>" style="height: 100%; width: 100%" alt="<?=$sh['picture']?> slide">
    </div>

<?php //}else{?>
    <!-- <div class="carousel-item">
      <img class="d-block w-100" src="<?=$sh['picture']?>" style="width: 982px;height: 1080px" alt="Second slide">
    </div> -->
    <?php } //}?>
  </div>
</div>

<div class="container" id="about_me" style="margin-top: 380px; width: 1900px;">
  <div class="row">
    <div class="col-sm-4 about_pic1" data-move-x="-200px"  id="about_pic1" style="color: white; margin-left: -40px;">
      <img  src="<?=$header_logo_image2?>" id="rony_image" style="width: 600px;height: 798px; margin-top: -5%">
    </div>
    <div class="col-sm-7" id="text_with_camera" style="color: white; margin-left: 135px; ">
      <div class="about_pic1" data-move-y="-200px"> 
      <h1 id="big_text" style="font-weight: bold; font-size: 50px; text-align: center;margin-left: 90px;"><?=$header_large_text?></h1>
      <p id="little_text" style="font-size: 12px;margin-top: 20px; margin-left: 100px;text-align: center;"><?=$header_small_text?></p>
    </div>
      <img id="camera_image" class="about_pic1" data-move-x="200px" src="<?=$header_logo_image3?>" style="width: 750px;height: 500px; margin-top: 90px; margin-left:-6%;">
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
        <div class="div_email">
        <img class="img1 about_pic1" data-move-y="500px" src="assets/logos/email.png">
        <h6 class="h2 about_pic1" data-move-y="500px"><?=$email?></h6>
      </div>
      <div class="div_phone">
        <img class="img1 about_pic1" data-move-y="500px" src="assets/logos/phone.png">
        <h6 class="h2 about_pic1" data-move-y="500px"><?=$phone?></h6>
      </div>
      </div>
      
    </div>
  </section>



  <style type="text/css">

    /*.section{
      margin-top: 0%;
    }*/

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

      width: 8%;
      height: 8%;
      margin-top: 5%;
    }
  </style>

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

  <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel" data-interval="2000" data-pause=false style="margin-top: 15%;width: 80%; margin-left: 16%">

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

    <!--First slide-->
    <div class="carousel-item <?php if($counter==1){ echo 'active';}else{ echo '';}?>">

      <?php for($j=$i*6;$j<($i*6)+6;$j++){
    if (isset($imgarray[$j])) {?>

      <div class="col-md-2 mb-3" >
        <!-- <div class="card"> -->
          <img class="img-fluid" id="sponsor_pic" src="<?=$imgarray[$j]['sponsor_image']?>"
            alt="Card image cap" style="height: 40%;width: 45%; text-align:center;">
        <!-- </div> -->
      </div>

       <?php  } } ?>

      <!-- <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/taaga.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
        
      </div>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/bowling.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
       
      </div>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/rawnation.jpg"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
       
      </div>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/catseye.jpg"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
       
      </div>

      <div class="col-md-2 mb-3">
       
          <img class="img-fluid" src="assets/images/occult.jpg"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
        
      </div> -->

    </div>

    <?php }?>
    <!--/.First slide-->

    <!--Second slide-->
    <!-- <div class="carousel-item">

      <div class="col-md-2 mb-3">
          <img class="img-fluid" src="assets/images/taagaman.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
        
      </div>

      <div class="col-md-2 mb-3">
      
          <img class="img-fluid" src="assets/images/nabila.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
     
      </div>

      <div class="col-md-2 mb-3">
       
          <img class="img-fluid" src="assets/images/stylesell.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
      
      </div>

      <div class="col-md-2 mb-3">
      
          <img class="img-fluid" src="assets/images/uniqlo.jpg"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
 
      </div>

      <div class="col-md-2 mb-3">
      
          <img class="img-fluid" src="assets/images/klubhous.jpg"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
    
      </div>

      <div class="col-md-2 mb-3">
        
          <img class="img-fluid" src="assets/images/bowling.png"
            alt="Card image cap" style="height: 45%;width: 45%; text-align:center;">
        
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
<!--/.Carousel Wrapper-->

<!-- <div class="loader-wrapper">
<span class="loader"><span class="loader-inner"></span></span>
</div> -->



<script src="assets/js/jquery.smoove.js"></script>
<script type="text/javascript">
  $(".about_pic1").smoove({offset: '5%'});
</script>


<!-- <script type="text/javascript">
  $(document).ready(function(){

    $(".about_pic1").waypoint(function(direction){

      $(".about_pic1").addClass('animated zoomIn')
    }, {
      offset: '50%'
    });
  });
</script> -->




  <?php include 'footer.php';?>



<?php include 'javascript.php';?>

</body>
</html>