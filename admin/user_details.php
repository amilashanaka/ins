<?php

include_once './header.php';
include_once './sidebar.php';
include_once 'data/user_detail_data.php';
include_once 'data/functions.php';
include_once 'data/database.php';


if (isset($_GET['error'])) {
    $error = $_GET['error']; 
} else {
   $error = 10; 
}

if($row['m_status'] == '1'){
    $status = 'Active';
} else{
    $status = 'Inactive';
}


if($error==0){
   echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
    
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="page-wrapper">
     <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Player Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Player Group</a></li>
                        <li class="breadcrumb-item active">Player Detail</li>
                    </ol>
                </div>
            </div>
    


<div  class="col-lg-12">
<div class="card">
    <div class="card-title">
                                <h2>Update Player Details</h2>

                            </div>
			  
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
            
        
            <div class="box-body">
			
			<?php if($error != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="error_display">
                    <?php
                    
                    if($error == '2'){
                        echo "Please fill-in all the required fields";
                    } else if($error == '1'){
                       echo "Username already registered "; 
                    } else if($error == '3'){
					  echo "Username can only be alphabets & numbers "; 
					} else if($error == '4'){
					  echo "Please upload only image file";	
					}
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php
 if($user_id != ''){ ?>
                <form action="data/update_user.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                
            <?php }  ?>
			<div class="row form-group">						
				<div class="col-lg-6 col-md-6 form-group">
					<div class="user_image">
					<?php if($row['m_pic'] == ''){ ?>
                                            <img name="user_image" id="profile_image"  src="../uploads/profile/avt.png" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } else { ?>
                                                <img name="user_image" id="profile_image"  src="../uploads/profile/<?= $row['m_pic']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } ?>
					</div>
                                    
                                   
					
				</div>
			</div>
                
                   <div class="input-group">
                                                        
                                        <input type="file" name="user_profile_image" id="user_profile_image" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                         <input type="button" style="width: 100px"value="Browse" id="browse_image" class="btn btn-block btn-success"/>

                                    </div> 
			
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Username :</label>
						<input type="text" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $row['m_username']; ?>" >                            
					</div>
					
                                        <div class="col-lg-6 col-md-6 form-group">                  
						<label>User Refer By :</label>
                             
                                                <select class="form-control" name="user_member_reference" id="user_member_reference">
                                                          <?php                                                             
                                                             $database->loadAllUsers($row['m_upline']);
                                                          ?>
                                               </select>
					</div>
                                    
                                     <div class="col-lg-6 col-md-6 form-group">
                                        <label>User Type</label>
                                         <select class="form-control" name="user_type" id="user_type">
                                                   
                                                          <?php
                                                             $database-> loadAllUsersType($row['m_type']);
                                                            ?>
                                            </select>
						 
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label>User Level:</label>
						<input type="text" class="form-control" id="user_level" placeholder="User Level" name="user_level" value="<?php echo $row['m_level']; ?>" >                            
					</div>
                                    
                                     <div class="col-lg-6 col-md-6 form-group">                  
						<label>Referral code :</label>
						<input type="text" class="form-control" id="new_ref" placeholder="New customer Reference" name="new_ref" value="<?php echo $row['m_new_ref']; ?>" >                            
					</div>
                                    
                                     <div class="col-lg-6 col-md-6 form-group">                  
						<label>User OTP :</label>
                                                <input type="number" class="form-control" id="otp" placeholder="4digit only" pattern = "^[0-9]{4}$"  maxlength="4" name="otp" value="<?php echo $row['m_otp']; ?>" >                            
				     </div>
                                    
                                
                                    
				</div>
                                    
                                    <hr>
				
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Full Name :</label>
						<input type="text" class="form-control" id="user_fname" placeholder="First Name" name="user_fname" value="<?php echo $row['m_name'] ; ?>" title="Enter a valid Name">                            
					</div>
                               
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Email :</label>
						<input type="text" class="form-control" id="user_email" placeholder="Email" name="user_email" value="<?php echo $row['m_email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter a valid email">                            
					</div>
                                    
                                   <div class="col-lg-6 col-md-6 form-group">                  
						<label>Date of Birth :</label>
						<input type="date" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" value="<?php echo $row['m_dob']; ?>" >                            
					</div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label >Mobile Number :</label>
						
						<input type="text" class="form-control" id="user_phone" placeholder="Phone" name="user_phone" value="<?php echo $row['m_phone']; ?>"> 						
					</div>

				</div>
				
				<div class="row form-group">
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Line ID :</label>
						<input type="text" id="user_lineId" autocomplete="off" name="user_lineId" class="form-control" placeholder="Line ID"  value="<?php echo $row['m_lineid']; ?>" >                            
					</div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                                 <label>WhatsApp Number :</label>
						 <input type="text" id="user_whatsapp" name="user_whatsapp"  class="form-control" placeholder="WhatsApp ID" value="<?php echo $row['m_whatsapp'] ?>">
                                     </div>
				</div>
				 
								<hr /> 
				
				<div class="row form-group">
					
				    <div class="col-lg-6 col-md-6 form-group">
                                         <label>Address :</label>
                                          <input type="text"  id="user_address" name="user_address" class="form-control " placeholder="Your Address" value="<?php echo $row['m_address'] ?>">
                                    </div><!-- End .input-group -->
                                    
                               
                                    
                                    
                                     
				</div>
				
                                 
				<div class="row form-group">
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Name :</label>
						<input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" 
						value="<?php echo $row['m_bank_name']; ?>">                            
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Account No :</label>
						<input type="text" class="form-control" id="bank_account" placeholder="Account No" name="bank_account" 
						value="<?php echo  $row['m_bank_account_no']; ?>">                             
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Branch :</label>
						<input type="text" class="form-control" id="bank_branch" placeholder="Bank Branch" name="bank_branch" 
						value="<?php echo  $row['m_bank_branch']; ?>">                             
					</div>
				</div>	                               

	
				
				<hr />
                                
                                <div class="row form-group">
	
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Account Status</label>
                                                <input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" disabled value="<?php echo $status ?>">                             
					</div>
				</div>


              <div  class="row form-group">
                <div class="col-lg-3 col-md-3 form-group"> 

                <button type="submit" class="btn btn-block btn-success">Update Now</button>

                </div>
                <div class="col-lg-3 col-md-3 form-group"> 
                        <button type="reset" class="btn btn-block btn-warning">Reset</button>
                </div>
                  
                <div class="col-lg-3 col-md-3 form-group">
                    
               <button type="button" onclick="window.location.href='./pass_update.php?user_id=<?php echo $user_id?>'" class="btn btn-block btn-danger">Update Password</button>
                </div>
              </div>        
			  
        </form>
    </div>
    
</div>
        
        
        
         </div>

           

     </div>
     </div>
	 </div>
  
<script>
    $('#browse_image').on('click', function(e){
        
        $('#user_profile_image').click();
    })
    $('#user_profile_image').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#profile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

</script>      
      
  
  </div>

 

 <?php

require_once 'footer.php';
 

?>
 