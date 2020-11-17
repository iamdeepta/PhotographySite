<?php
session_start();
include 'db.php';

    if ($_SESSION["flag"] == "ok")
    {


      $menu = "
SELECT * FROM menu where id not in (7,8,9)";


$result = $connect->prepare($menu);
$result->execute();
$statement = $result->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <title>Cpanel-Upload Pictures</title>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>
  <!-- <style type="text/css">
    .modal {
    z-index: 100 !important;
    
}
  </style> -->

  <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' /> -->


  <style type="text/css">
  @media only screen and (min-width: 320px){


    #input-group-append{

      margin-left: 12% !important;
    }
        
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

          #input-group-append{

      margin-left: 45% !important;
    }


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

  


      
  <div class="main-content">
        <section class="section">
  

          
          <div class="section-body" style="margin-top: -60px;">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-7 ">
                <div class="card" style="background-image: url('assets/img/card-bg14.jpg');">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">



                    <?php if(isset($_GET['msg_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #FFE6EE; height: 60px;"> 
          <label style="margin-top: 0px;color: red ">

            <?php 
          
              echo $_GET['msg_error'];
          
          ?>
            
          </label>
        </div>
      </div>

        <?php }



        ?>




                <?php if(isset($_GET['msg'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #cce8b7; height: 60px;">  <!-- #DFF0D8 -->
          <label style="margin-top: 0px;color: green ">
            <?php 
          
              echo $_GET['msg'];
          
          ?>
            
          </label>
        </div>
      </div>


      <!-- <span id="success_message"></span> -->

        <?php }

        ?>
                    <!-- <div class="form-group">
                    <label class="container" style="width: 220px;">Create an album
                      <input type="radio" checked="checked" name="radio">

                      <span class="checkmark"></span>

                    </label>


                    <label class="container" style="width: 220px;">Select an album
                      <input type="radio" name="radio">
                      <span class="checkmark"></span>
                    </label>
                    </div> -->

                    

                    <!-- <div class="container" style="height: 100px;width: 800px;">
  <div class="radio-tile-group">
    <div class="input-container" style="width: 150px;height: 30px !important;">
      <input id="walk" class="radio-button" type="radio" name="radio" value="ca" checked />
      <div class="radio-tile">
        
        <label for="walk" class="radio-tile-label" style="font-size: 10px;margin-top: 5px; ">Create an Album</label>
      </div>
    </div>

    <div class="input-container" style="width: 150px;height: 30px !important;">
      <input id="bike" class="radio-button" type="radio" name="radio" value="sa" />
      <div class="radio-tile">
       
        <label for="bike" class="radio-tile-label" style="font-size: 10px;margin-top: 5px; ">Select an Album</label>
      </div>
    </div>

  
  </div>
</div> -->

            <form class="form-horizontal" action="insert.php" id="form"  method="post" enctype="multipart/form-data" >

                    <div class="form-group div1 ca">
                      <label>Album Name</label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="album_name" id="album_name" required>
                    </div>
                    

                    <div class="form-group">
                      <label>Select a Panel</label><label style="color: red; margin-left: 4px;">*</label>
                      <select class="custom-select" id="panel_id" name="panel_id" style="font-size: 14px;">
                     
            <?php
                      foreach ($statement as $panel_name){
                        ?>
                      
                     <option value="<?=$panel_name['id']?>"><?=$panel_name['menu_name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>



                    <div class="form-group" id="plus1">
                    <label for="specification_name">Description</label><label style="color: red">*</label>
                    <div class="input-group specification_name" id="input-group[]">
                      
                    <input type="text" class="form-control" name="description_title[]" > <p style="font-weight: bold; margin-left: 15px; ">:</p>

                    <div class="input-group-append specification_amount" id="input-group-append[]" style="width: 45%">
                      <!-- <div class="form-group"> -->
                        
                      <label for="specification_amount"></label> 
                      <input type="text" class="form-control input" id="specification_amount[]" name="description_name[]" style=" margin-left: 20px;" required >

                     </div> <button type="button" id="removeButton1[]" name="removeButton1" class="btn btn-danger btn-sm removeButton1">x</button>
                  </div>

                  <button type="button" name="add1" id="add1" class="btn btn-success btn-sm add">+</button>

                  </div>

                  <script type="text/javascript">

  
                    $(document).ready(function(){
                      var count=0;

                   $('#add1').click(function(){

                    // Create clone of <div class='input-form'>
                    var newel1 = $('.specification_name:last').clone(true);
                    newel1.find('input').val('');
                    newel1.find('input').val('');
                   // newel.setAttribute("id", "test"+count);

                    // Add after last <div class='input-form'>
                    $(newel1).insertAfter(".specification_name:last");

                    newel1.setAttribute("id", "test"+count);
                    count++;
                   });

                   $(".specification_name").on('click', '.removeButton1', function(e){
        e.preventDefault();
      
        $(this).parent('div').remove(); 
      

        count--;
        });

                  });


                  </script>


              
                    <div class="form-group">
                      <label>Upload Pictures</label><label style="color: red; margin-left: 4px;">*</label>
                        

                        <input type="file" name="file[]" id="file[]" class="inputfile" accept="image/*" multiple required>
                        <!-- <input type="file" name="file[]" id="file[]" class="inputfile" />
                        <input type="file" name="file[]" id="file[]" class="inputfile" /> -->
                        <!-- <input type="file" name="file3" id="file3" class="inputfile" />
                        <input type="file" name="file4" id="file4" class="inputfile" /> -->
                       


                      </div>

                      
        

                <div class="form-group" style="margin-top: 43px;">
                    <button style="float: right;" class="btn btn-primary mr-1" name="upload" id="upload" type="submit">Upload</button>
                    
                  </div>
                
                 </form>



                    
                  </div>

                  <div class="form-group" id="process" style="display: none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
      </div>
       </div>
                  
                </div>  
 
              </div>
              
            </div>
          </div>
       

         

        </section>
      </div>

     
          




     
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
      } ?>

