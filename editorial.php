<?php
include 'db.php';

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

$editorial = "
SELECT * FROM album where panel_id=4 and is_cover in (0,2) group by title order by id desc
";

$result_editorial = $connect->prepare($editorial);
$result_editorial->execute();
$statement_editorial = $result_editorial->fetchAll(); 
?>
<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<title>Editorial</title>

	<?php include 'css_master.php';?>
</head>
<body style="background-color: black;">

	<div class="loader" style="background-color: black !important"></div>
  <script type="text/javascript">
    $(window).on("load", function () {
  $(".loader").fadeOut("slow");
});
  </script>

<?php include 'header.php';?>

<div class="row" style="margin-top: 100px;">

  <div class="row col-md-12">

  	<?php foreach($statement_editorial as $edi){?>
  <div class="col-md-4 col" style="margin-top: 15px;">
	
  <a href="editorial_inside.php?msg=<?=encodeURIComponent($edi['title'])?>"><img src="<?=$edi['picture']?>" alt="Avatar" class="image" style="width:100%;height: 100%"></a>
  <a href="editorial_inside.php?msg=<?=encodeURIComponent($edi['title'])?>"><div class="middle">
    <div class="text"><?=$edi['title']?></div>
  </div></a>
  </div>
  <?php }?>

</div>
</div>

<style type="text/css">

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
  width: 50%;
}
</style>


<?php include 'footer.php';?>
<?php include 'javascript.php';?>
</body>
</html>