<?php 

$footer = "
SELECT * FROM footer";


$result_footer = $connect->prepare($footer);
$result_footer->execute();
$statement_footer = $result_footer->fetchAll();



foreach($statement_footer as $foot){

  $foot_id = $foot['footer_id'];
  $foot_name = $foot['name'];
  //$user_name = $su1['user_name'];

}


?>

<footer style="margin-top: 100px;">
	<?php if(@$_SESSION["flag"]=="ok"){?>
  	<p style="color: white; text-align: center;font-size: 14px;"><?=$foot_name?><button type="button" class="btn btn-primary btn-sm" style="margin-left: 1%" data-toggle="modal" data-target="#exampleModalFooter">Edit</button></p>

  		<?php 
  	}else{?>

<p style="color: white; text-align: center;font-size: 14px;"><?=$foot_name?></p>
  		<?php }
  		
  		?>


  	<div class="modal fade" id="exampleModalFooter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Footer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$foot_id?>" method="post">
                <div class="form-group">
                      <label>Footer Name: </label><label style="color: red; margin-left: 4px;">*</label>
                      <input type="text" class="form-control" name="footer_name" value="<?=$foot_name?>">
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-success" name="yes_footer">Update</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>


  </footer>