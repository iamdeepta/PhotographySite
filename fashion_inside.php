<?php
include 'db.php';

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

$msg = $_GET['msg'];

$fashion_inside = "
SELECT * FROM album where title = '$msg' order by id desc
";

$result_fashion_inside = $connect->prepare($fashion_inside);
$result_fashion_inside->execute();
$statement_fashion_inside = $result_fashion_inside->fetchAll(); 


//select id, GROUP_CONCAT(CONCAT(substring_index(substring_index(description_title, ',', n), ',', -1 ), ' : ',substring_index( substring_index(description_name, ',', n), ',', -1 ) ) SEPARATOR ', ') as description from album join numbers on char_length(description_title) - char_length(replace(description_title, ',', '')) >= n - 1 where title='$msg' group by id


$fashion_inside1 = "
select id,substring_index( substring_index(description_title, ',', n), ',', -1 ) as description_t,substring_index( substring_index(description_name, ',', n), ',', -1 ) as description_n  from album join numbers on char_length(description_title) - char_length(replace(description_title, ',', '')) >= n - 1 where title='$msg' group by description_t order by description_t desc

";

$result_fashion_inside1 = $connect->prepare($fashion_inside1);
$result_fashion_inside1->execute();
$statement_fashion_inside1 = $result_fashion_inside1->fetchAll();

?>
<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<title>Album Inside</title>

	<?php include 'css_master.php';?>

  <style type="text/css">
  @media only screen and (min-width: 320px){
        
      
      
    #des{

          margin-top: -7% !important;
         }
      
      

        }

        @media only screen and (min-width: 480px){

          
          #des{

          margin-top: -6% !important;
         }
        

        }


        @media only screen and (min-width: 576px){

          
          #des{

          margin-top: -4% !important;
         }
        

        }


        @media only screen and (min-width: 760px){

         
          #des{

          margin-top: -3% !important;
         }
          
        

        }

        @media only screen and (min-width: 991px){

          
          #des{

          margin-top: -2% !important;
         }
          

        }

        @media only screen and (min-width: 1200px){
         

         #des{

          margin-top: -1.9% !important;
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

<p class="page-description text-center" style="margin-top: 20px;"><?=$msg?></p><br>
<?php foreach($statement_fashion_inside1 as $sfi1){?>
<div>
<p class="page-description text-center" id="des" style="font-size: 12px;margin-top: -1.9%"><?=$sfi1['description_t']?> : <?=$sfi1['description_n']?></p>
</div>

<?php }?>
<script src="assets/js/jquery.smoove.js"></script>
<!-- <div class="container"> -->
  <!-- <div class="container gallery-container" style="margin-top: 100px;"> -->
    <!-- <h1 class="text-center">Bootstrap 3 Gallery</h1>
    <p class="page-description text-center">Grid Layout With Zoom Effect</p> -->
    <div class="tz-gallery" style="margin-top: 20px;">
      
      <div class="row mb-3">

        <?php foreach($statement_fashion_inside as $sfi){?>
        <div class="col-md-4" style="margin-top: 1%">
          <!-- <div class="card"> -->
            <a class="lightbox" href="<?=$sfi['picture']?>">
              <img data-img="<?=$sfi['picture']?>"  id="about_album_inside<?=$sfi['id']?>" class="card-img-top" style="position: sticky;z-index: 2; height: 100%; object-fit: cover;">
            </a>
            <div class="middle">
              <img src="assets/img/loading.gif" style="height: 100%; width: 100%; ">
            </div>
          <!-- </div> -->
        </div>

      

        <script type="text/javascript">
           options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.95
          };
          callback = (entries, observer) => {

              entries.forEach(entry => {
                console.log('ok');
                if(entry.isIntersecting && entry.target.className === 'card-img-top'){
                  let imageUrl = entry.target.getAttribute('data-img');
                  if (imageUrl) {
                    entry.target.src = imageUrl;
                    observer.disconnect(entry.target);
                  }
                }

              });
          }
           observer = new IntersectionObserver(callback, options);
          observer.observe(document.querySelector('#about_album_inside<?=$sfi['id']?>'));
        </script>


        <!-- <script type="text/javascript">
           targets = document.querySelectorAll('img');

           lazyload = target => {
            const io = new IntersectionObserver((entries, observer) => {
              entries.forEach(entry => {
                console.log('ok');

                if (entry.isIntersecting) {
                  const img = entry.target;
                  const src = img.getAttribute('data-img');

                  img.setAttribute('src', src);
                  img.classList.add('fade');

                  observer.disconnect();
                }
              });
            });

            io.observe(target);
          }
          targets.forEach(lazyload);
        </script> -->
        
        <script type="text/javascript">
          $("#about_album_inside<?=$sfi['id']?>").smoove({offset: '5%'});
        </script>

        <?php }?>


      </div>
    </div>
  <!-- </div> -->
<!-- </div> -->

<style type="text/css">

  /*.image:hover{
    opacity: 0.3;
    cursor: pointer;
    
  }

  .image{

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
    /*border: 1px solid white;*/
    width: 60%;
    z-index: 0;


  }

  /*.col:hover .image{
    opacity: 0.3;
  }*/

  /*.middle:hover{

    background-color: #ffffff00;
    cursor: pointer;
  }*/

  .text {
  background-color: #ffffff00;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  font-weight: bold;
}

/*.col {
  position: relative;
  width: 50%;
}*/
</style>



<?php include 'footer.php';?>
<?php include 'javascript.php';?>
<script type="text/javascript">
  baguetteBox.run('.tz-gallery');
</script>
</body>
</html>