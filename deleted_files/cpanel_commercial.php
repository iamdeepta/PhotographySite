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

$albums_commercial = "
SELECT * FROM album where panel_id=5 and is_cover in (0,2) group by title order by id desc
";

$result_albums_commercial = $connect->prepare($albums_commercial);
$result_albums_commercial->execute();
$statement_albums_commercial = $result_albums_commercial->fetchAll();


$albums_commercial1 = "
SELECT m.id as m_id, m.menu_name, m.active_status, a.* FROM menu as m left outer join album as a on a.panel_id = m.id where m.id not in (7,8,9) group by m.id order by m.id
";

$result_albums_commercial1 = $connect->prepare($albums_commercial1);
$result_albums_commercial1->execute();
$statement_albums_commercial1 = $result_albums_commercial1->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Cpanel-Commercial</title>
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



<div class="container">
  <div class="container gallery-container" style="margin-top: 70px;">
    <h4 class="text-center">Commercial Panel</h4>
    <!-- <p class="page-description text-center">Grid Layout With Zoom Effect</p> -->
    
    <div class="">
      <div class="row mb-3">

        <?php foreach($statement_albums_commercial as $ac){?>
        <div class="col-md-3 column" style="margin-top: 30px;">
          <!-- <div class="card"> -->
          <form action="" method="post">
          	
          	<button class="btn btn-danger btn-sm" type="button" name="delete_commercial[]" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter<?=$ac['title']?>">X</button>
            <button class="btn btn-warning btn-sm" type="button" name="transfer_commercial_album[]" style="float: left;" data-toggle="modal" data-target="#exampleModalCommercial<?=$ac['title']?>">Transfer</button>
          	<!-- <button class="btn btn-success" type="submit" name="edit[]" style="float: right;">Edit</button> -->
          </form>



          <div class="modal fade" id="exampleModalCommercial<?=$ac['title']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to transfer <i><?=$ac['title']?></i> album?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=encodeURIComponent($ac['title'])?>" method="post">
                <div class="form-group">
                      <label>Transfer To:</label><label style="color: red; margin-left: 4px;">*</label>
                      <select class="custom-select" id="transfer_album" name="transfer_album" style="font-size: 14px;">

                     
            <?php
                      foreach ($statement_albums_commercial1 as $sac1){
                        ?>
                      
                     <option value="<?=$sac1['m_id']?>" <?php if($ac['panel_id']==$sac1['m_id']){echo 'selected'; }?>><?=$sac1['menu_name']?></option> 
                    
                      <?php } ?>
                      </select>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_transfer_album_commercial[]">Transfer</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>




          <div class="modal fade" id="exampleModalCenter<?=$ac['title']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to remove <i><?=$ac['title']?></i> album permanently?</h5>
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
                            <form action="update_remove.php?msg=<?=$ac['title']?>" method="post">

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="yes_album_commercial[]">Yes</button>
              </form>
            <?php //}
              ?>
                <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>


            <a class="lightbox cols" href="cpanel_album_inside.php?msg=<?=encodeURIComponent($ac['title'])?>">
              <img src="<?=$ac['picture']?>" alt="" class="card-img-top">
           </a>
            <a href="cpanel_album_inside.php?msg=<?=encodeURIComponent($ac['title'])?>"><div class="middle">
    <div class="text"><?=$ac['title']?></div>
  </div></a>
          <!-- </div> -->
        </div>
        <?php }?>


      </div>
    </div>


  </div>
</div>


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

