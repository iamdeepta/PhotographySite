<?php
include 'db.php';

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

$msg_menus = $_GET['msg_menus'];

$fashion = "
SELECT * FROM album where panel_id=$msg_menus and is_cover in (0,2) group by title order by id desc
";

$result_fashion = $connect->prepare($fashion);
$result_fashion->execute();
$statement_fashion = $result_fashion->fetchAll(); 


$fashion1 = "
SELECT * FROM menu where id=$msg_menus order by id
";

$result_fashion1 = $connect->prepare($fashion1);
$result_fashion1->execute();
$statement_fashion1 = $result_fashion1->fetchAll();

foreach($statement_fashion1 as $fash){

  $menu_name = $fash['menu_name'];
}
?>

<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<title><?=$menu_name?></title>

	<?php include 'css_master.php';?>


  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      
      
    .image{

      width:470px !important;
      height: 350px !important;
    }

    .middle{

      left: 55% !important;
    }

    #main_div{

              margin-left: -4% !important;
            }

      
      

        }

        @media only screen and (min-width: 480px){

          
          .image{

              width:574px !important;
              height: 350px !important;
            }

            .middle{

              left: 55% !important;
            }

            #main_div{

              margin-left: -4% !important;
            }
          
        

        }


        @media only screen and (min-width: 576px){

          
          .image{

              width:768px !important;
              height: 390px !important;
            }

            .middle{

              left: 55% !important;
            }

            #main_div{

              margin-left: -4% !important;
            }
        

        }


        @media only screen and (min-width: 760px){

         
          .image{

              width:280px !important;
              height: 220px !important;
            }

            .middle{

              left: 52% !important;
            }

            #main_div{

              margin-left: 1% !important;
            }
          
        

        }

        @media only screen and (min-width: 991px){

          
          .image{

              width:310px !important;
              height: 320px !important;
            }

            .middle{

              left: 52% !important;
            }

            #main_div{

              margin-left: 1% !important;
            }
          

        }

        @media only screen and (min-width: 1200px){
         

         .image{

              width:100% !important;
              height: 350px !important;
            }

            .middle{

              left: 50% !important;
            }

            #main_div{

              margin-left: 1% !important;
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




<div class="row" id="main_div" style="margin-top: 100px;margin-left: 1%">

  <div class="row col-md-12">
    <script src="assets/js/jquery.smoove.js"></script>

<?php foreach($statement_fashion as $fash){?>
  <div class="col-md-4 col" style="margin-top: 2%;" id="about_album1<?=$fash['id']?>">
	
  <a href="fashion_inside.php?msg=<?=encodeURIComponent($fash['title'])?>"><img data-img="<?=$fash['picture']?>" id="about_album12<?=$fash['id']?>" class="image" style="width:100%;height: 350px; object-fit: cover;transition: .5s ease;backface-visibility: hidden;"></a>
    <a href="fashion_inside.php?msg=<?=encodeURIComponent($fash['title'])?>"><div class="middle">
    <div class="text"><?=$fash['title']?></div>
  </div></a>
  </div>

  <script type="text/javascript">
           options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.25
          };
          callback = (entries, observer) => {

              entries.forEach(entry => {
                console.log('ok');
                if(entry.isIntersecting && entry.target.className === 'image'){
                  let imageUrl = entry.target.getAttribute('data-img');
                  if (imageUrl) {
                    entry.target.src = imageUrl;
                    observer.disconnect(entry.target);
                  }
                }

              });
          }
           observer = new IntersectionObserver(callback, options);
          observer.observe(document.querySelector('#about_album12<?=$fash['id']?>'));
        </script>

  
<script type="text/javascript">
  $("#about_album1<?=$fash['id']?>").smoove({offset: '20%'});
</script>

  <?php } ?>

</div>
</div>

<style type="text/css">

	.image:hover{
		opacity: 0.3;
		cursor: pointer;
		
	}

	/*.image{

backface-visibility: hidden;
		display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
	}*/
	
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
		border: 1px solid white;
		width: 60%;


	}

	.col:hover .image{
		opacity: 0.3;
	}

	.middle:hover{

		background-color: #ffffff00;
		cursor: pointer;
	}

	.text {
  background-color: #ffffff00;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  font-weight: bold;
}

.col {
  position: relative;
  /*width: 50%;*/
}
</style>





<!-- <style>
.container {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style> -->

<?php include 'footer.php';?>
<?php include 'javascript.php';?>
</body>
</html>