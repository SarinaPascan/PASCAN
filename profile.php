<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('query/db.php'); 


$user_id = $_SESSION['user_id'];
$result = mysqli_query($con,"SELECT * FROM user WHERE user_id = $user_id");

$user[0] = array();
if ($result->num_rows > 0) {
    // Fetch all rows and store them in an array
    while($row = $result->fetch_assoc()) {
        $user[0] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Barangay Information Management System</title>
</head>
<body>

	<header>
		<div style="width: 20%; display: flex; justify-content: flex-start;">

	    <img src="./logo.png" style="width: 100px; height: 89px;" alt="" loading="lazy"  />
	    <a href="index.php" style="font-family:Bodoni FLF;font-size: 30px;"><i><h4 style="line-height: 1.1; margin: 0">Barangay <br/>Information</h4></i></a>
			
		</div>
		<div style="left: 405px; position:absolute; height: 70px; width: 1468px; background: white; display: flex; justify-content: flex-end">
		<button class="btn" style="background-color:white; font-size:16px; box-shadow: 2px 2px black; border-radius: 50px;align-items: center; justify-content:center; display:flex; height:40px; border: 1px solid black; color: black; width:100px;" onclick="location.href='profile.php';"><?= ucwords($_SESSION['user_type']); ?> <span style="color: green; padding: 0 10px">●</span></button>
		</div>
	</header>

	<div class="parent" style="height: 813px;">

	  <nav style="width:376px;">
	    <ul>
	        <li style="box-sizing:border-box; border: 1px solid black" class="active"><img src="./icons/home.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="index.php">Dashboard</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/information.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" /><a href="information.php">Barangay Information</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/users.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="official.php">Barangay Official</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/group.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="residents.php">Residents</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/edit.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="certificates.php">Certificate  / Clearance</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/checklist.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="forms.php">Issued forms</a>
	        </li>
	    </ul>
		<style>
	.logout img{
		margin-left: 90px;
	}
</style>
	    <ul style="margin: 20px">	    	
	        <li style="box-sizing:border-box; border: 1px solid black" class="logout"><img src="./icons/sign.png" width="30" height="30" alt="" loading="lazy" /><a class="logout">Logout</a></li>
	    </ul>
	  </nav>
	  

		   <!--Content-->
		  <div style="display: flex; flex-direction: row; justify-content: space-evenly; margin: auto; background-color: white; padding: 30px; border-radius: 30px; border: 1px solid black; font-family: Times New Roman; width: 60%;">

		  	<div style="display: flex; flex-direction: column; justify-content: space-between; width: 40%; height: 100%; border-right: 3px solid black; padding: 10px; ">

		  		<div>
		  			

		  		<div style="display: flex; flex-direction: column; justify-content:  flex-start; align-items: center; ">

			  		<img  id="clickableImage" src="<?= $user[0]['user_image'] ? './query/profile/' . $user[0]['user_image'] : 'default.jpg';?>" width="260" height="260" alt="" loading="lazy" style="margin-right: 20px;" />
			  		<input type="file" id="fileInput" style="display: none;">
			  		<h4 style="font-size:25px;margin: 10px"> <?= ucwords($_SESSION['user_type']); ?> </h4>
		  			
		  		</div>


		  		<hr class="solid">
		  		<div style="display: flex; align-items: center; justify-content: flex-start; margin: 0; padding: 5px 10px;">
		  			
		  		    <span style="font-size: 20px;color: black; padding: 0 10px">●</span><h5 style="font-size: 20px;color: black; padding: 0px; margin: 0px 5px">BrgySan_Nicolas@gmail.com</h5> 
		  		</div>

		  		<div style="display: flex; align-items: center; justify-content: flex-start; margin: 0; padding: 5px 10px;">
		  			
		  		    <span style="font-size: 20px;color: black; padding: 0 10px">●</span><h5 style="font-size: 20px;color: black; padding: 0px; margin: 0px 5px">0993-698-7357 </h5> 
		  		</div>

		  		</div>



		  		<div style="font-size: 20px; display: flex; flex-direction: column; justify-content:  flex-start; align-items: center; text-align: center; margin-top: 50px;">

			  		<h4>SAN NICOLAS, JASAAN MISAMIS ORIENTAL</h4>
		  		
		  		</div>
					


		  	</div>
		  	<div style="display: flex; flex-direction: column; justify-content: space-between; width: 60%; padding: 10px; ">

		  		<div>
		  			


		  		<div style="font-size: 25px;display: flex; flex-direction: column; justify-content:  flex-start; align-items: center; ">
			  		<h4> My Profile </h4>		  			
		  		</div>
		  		<hr class="solid">


		  		<div style="display: flex; align-items: center; justify-content: space-between; margin: 10px auto; padding: 5px; border: 1px solid black; width: 80%;">
		  			
		  		    <p style="font-size: 20px;width: 20%">Name: </p> <input style="font-size: 20px;width: 80%; border: none;" type="text" name="user_fullname" value="<?= $user[0]['user_fullname'] ?? '';?>">
		  		</div>

		  		<div style="display: flex; align-items: center; justify-content: space-between; margin: 10px auto; padding: 5px; border: 1px solid black; width: 80%;">
		  			
		  		    <p style="font-size: 20px;width: 20%">Age: </p> <input style="font-size: 20px;width: 80%; border: none;" type="text" name="user_age" value="<?= $user[0]['user_age'] ?? '';?>">
		  		</div>

		  		<div style="display: flex; align-items: center; justify-content: space-between; margin: 10px auto; padding: 5px; border: 1px solid black; width: 80%;">
		  			
		  		    <p style="font-size: 20px;width: 20%">Gmail: </p> <input style="font-size: 20px;width: 80%; border: none;" type=""  name="user_gmail" value="<?= $user[0]['user_gmail'] ?? '';?>">
		  		</div>

		  		<div style="display: flex; align-items: center; justify-content: space-between; margin: 10px auto; padding: 5px; border: 1px solid black; width: 80%;">
		  			
		  		    <p style="font-size: 20px;width: 20%">Address: </p> <input style="font-size: 20px;width: 80%; border: none;" type=""  name="user_address" value="<?= $user[0]['user_address'] ?? '';?>">
		  		</div>


		  		<div style="display: flex; align-items: center; justify-content: space-between; margin: 10px auto; padding: 5px; border: 1px solid black; width: 80%;">
		  			
		  		    <p style="font-size: 20px;width: 20%">Position: </p> <input style="font-size: 20px;width: 80%; border: none;" type=""  name="user_type" value="<?= $user[0]['user_type'] ?? '';?>">
		  		</div>

		  		</div>




				<div id="actionbutton" style=" margin: 10px; display: flex; flex-direction: row; justify-content: flex-end; column-gap: 10px; width: 80%">
					<button onClick="disableButton()" class="btn" style="color:black; box-shadow:4px 3px black; border-radius: 10px; margin-left: 10px; font-size: 18px; padding: 5px 21px; background-color: #7ED957; height: 30px; width:80px;"><i class="fa fa-edit" style="align-items:center; text-align:center;color: black;font-size: 16px;cursor: pointer;"></i> Edit</button>
					<button onClick="hideDivs()" style="color:black; box-shadow: 2px 2px black; border-radius: 10px; font-size: 18px; padding:5px 10px; background-color: #ABE3F9; height: 30px;"><i class="fa fa-refresh" style="color: black;cursor: pointer;"></i> Update</button>
				</div>

		  	</div>

		  </div>

	</div>

    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
		// new DataTable('#example');
		// 
			$(document).ready(function() {
		        $('#clickableImage').on('click', function() {

		        $('#fileInput').click();
		        });

		        $('#fileInput').on('change', function() {
		            var file = this.files[0];

		            console.log(file)
		            if (file) {
		                var formData = new FormData();
		                formData.append('image', file);
		                formData.append('action', 'upload_image');

		                $.ajax({
		                    url: 'query/upload.php',
		                    type: 'POST',
		                    data: formData,
		                    contentType: false,
		                    processData: false,
		                    success: function(response) {                     
		                       location.reload();
		                    },
		                    error: function() {
		                        alert('Image upload failed.');
		                    }
		                });
		            }
		        });
		    });


		$(document).ready(function(){
		    
			var inputs = document.querySelectorAll('input');
		    
		    // Disable each input element
		    inputs.forEach(function(input) {
		        input.disabled = true;
		    });
		    document.getElementById('fileInput').disabled = false;

		});


       $('.logout').click(function(){
                  $.ajax({
                    url: 'query/user.php',
                    type: 'POST',
                    data: { 
                        action_name:'logout', 
                    },
                    success: function(response){
                            window.location.href = 'login.php'; 
                    }
            });
          });


    function disableButton() {

		var inputs = document.querySelectorAll('input');
	    
	    // Disable each input element
	    inputs.forEach(function(input) {
	        input.disabled = false;
	    });
    }


    function hideDivs() {

			var user_type = $("input[name='user_type']").val();
			var user_fullname = $("input[name='user_fullname']").val();
			var user_age = $("input[name='user_age']").val();
			var user_gmail = $("input[name='user_gmail']").val();
			var user_address = $("input[name='user_address']").val();
			var user_type = $("input[name='user_type']").val();


            $.ajax({
                url: 'query/user.php',
                type: 'POST',
                data: {
                	action_name: 'edit',
                    user_type: user_type,
                    user_fullname: user_fullname,
                    user_age: user_age,
                    user_gmail: user_gmail,
                    user_address: user_address,
                    user_type: user_type
                },
                success: function(response) {
                    if(response == "success"){      
	                    alert('Data Updated'); 
	                    disableButton();                             
                       location.reload();
                    } else {
                    	alert(response)
                    }

                }
            });
    }

	</script>
</body>
</html>
