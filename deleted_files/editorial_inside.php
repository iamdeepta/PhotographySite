<?php
include 'db.php';

$msg = $_GET['msg'];

$editorial_inside = "
SELECT * FROM album where panel_id=4 and title = '$msg' order by id desc
";

$result_editorial_inside = $connect->prepare($editorial_inside);
$result_editorial_inside->execute();
$statement_editorial_inside = $result_editorial_inside->fetchAll(); 

$editorial_inside1 = "
select id,substring_index( substring_index(description_title, ',', n), ',', -1 ) as description_t,substring_index( substring_index(description_name, ',', n), ',', -1 ) as description_n  from album join numbers on char_length(description_title) - char_length(replace(description_title, ',', '')) >= n - 1 where title='$msg' group by description_t order by description_t desc

";

$result_editorial_inside1 = $connect->prepare($editorial_inside1);
$result_editorial_inside1->execute();
$statement_editorial_inside1 = $result_editorial_inside1->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Editorial Inside</title>

	<?php include 'css_master.php';?>


</head>
<body style="background-color: black;">

<?php include 'header.php';?>

<p class="page-description text-center" style="margin-top: 20px;"><?=$msg?></p>
<?php foreach($statement_editorial_inside1 as $sei1){?>
<div>
<p class="page-description text-center" style="font-size: 12px;"><?=$sei1['description_t']?> : <?=$sei1['description_n']?></p>
</div>

<?php }?>

<!-- <div class="container"> -->
  <!-- <div class="container gallery-container" style="margin-top: 100px;"> -->
    <!-- <h1 class="text-center">Bootstrap 3 Gallery</h1>
    <p class="page-description text-center">Grid Layout With Zoom Effect</p> -->
    <div class="tz-gallery" style="margin-top: 80px">
      <div class="row mb-3">

        <?php foreach($statement_editorial_inside as $sei){?>
        <div class="col-md-4">
          <!-- <div class="card"> -->
            <a class="lightbox" href="<?=$sei['picture']?>">
              <img src="<?=$sei['picture']?>" alt="<?=$sei['title']?>" class="card-img-top">
            </a>
          <!-- </div> -->
        </div>
        <?php }?>


      </div>
    </div>
  <!-- </div> -->
<!-- </div> -->



<?php include 'footer.php';?>
<?php include 'javascript.php';?>
<script type="text/javascript">
  baguetteBox.run('.tz-gallery');
</script>
</body>
</html>