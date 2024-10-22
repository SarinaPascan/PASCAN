<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('query/db.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
   	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">

        <link href="css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">

    <title>Barangay Information Management System</title>
</head>
<body>

	<header>
		<div style="width: 20%; display: flex; justify-content: flex-start;">

	    <img src="./logo.png" style="width: 100px; height: 89px;" alt="" loading="lazy"  />
	    <a href="index.php" style="font-size: 30px;"><i><h4 style="font-family:Bodoni FLF; line-height: 1.1; font-size:30px; font-weight: bold; margin: 0">Barangay <br/>Information</h4></i></a>
			
		</div>
		<div style="left: 405px; position:absolute; height:80px; width: 1487px; background: white; display: flex; justify-content: flex-end">
		<button class="btn" style="box-shadow: 2px 2px black; border-radius: 50px;align-items: center; justify-content:center; display:flex; height:40px; border: 1px solid black; color: black; width:100px;" onclick="location.href='profile.php';"><?= ucwords($_SESSION['user_type']); ?> <span style="color: green; padding: 0 10px">●</span></button>
		</div>
	</header>

	<div class="parent" style="height: 813px;">

	  <nav style="width:385px;">
	    <ul>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/home.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
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
	        <li style="box-sizing:border-box; border: 1px solid black" class="active"><img src="./icons/checklist.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="forms.php">Issued forms</a>
	        </li>
	    </ul>

		<style>
	.logout img{
		margin-left: 90px;
	}
</style>

	    <ul style="margin: 20px">	    	
	        <li style="box-sizing:border-box; border: 1px solid black" class="logout"><img src="./icons/sign.png" width="30" height="30" alt="" loading="lazy" /><a href="#" class="logout">Logout</a></li>
	    </ul>
	  </nav>
	  
	   <!--Content-->
	   <style>
	   .bts:hover {
		background-color: #c8ff70; /* Darker green on hover */
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2); /* Slight shadow on hover */
  		color: black; /* White text on hover */
	   }
  </style>
	
<div class="content" style="display: flex; justify-content: flex-start; padding: 10px; margin: 15px;">
	<div style="display: flex; justify-content: space-between; align-items: flex-start;">
	<div>
	<button  class="bts" onclick="showCertificate()" style="width: 150px; text-align:center; font-size: 20px; border-radius:20px; border: 1px solid  black; ">Certificate<i class="" style="width: 90px; padding: 5px; cursor: pointer; font-size: 20px;"></i>
	</button>

	<button class="bts" onclick="showClearance()" style="width: 150px; text-align:center; font-size: 20px; border: 1px solid  black; border-radius:20px;  ">Clearance<i class="" style="width: 90px; color: red; padding: 5px; font-size: 20px; cursor: pointer;"></i></button>

	</div>
	<div style="padding-right: 60px"><h4 style="line-height:2.5;margin: 0; font-weight:bold; ">HISTORY</h4></div>
	</div>

	<div id="certificateDiv" style="display: block"> 

	<style>
table, th{
  border: 1px solid black;
  border-collapse: collapse;
 
}
</style>
		<table id="example1" class="display" style="justify-content:center; margin-top:50px; width:100%; height: 100%;">
			        <thead>
			            <tr>
			                <th style="text-align: center;">NAME</th>
			                <th style="text-align: center;">TRANSACTION TYPE</th>
			                <th style="text-align: center;">DATE ISSUED</th>
			                <th style="text-align: center;">DATE EXPIRED</th>
			                <th style="text-align: center;">O.R.#</th>
			                <th style="text-align: center;">TOOLS</th>
			            </tr>
			        </thead>
			        <tbody style="justify-content: center; align-items:center;">


	                       	<?php 
	                            $query = "SELECT * FROM `issue` 	                            
							        JOIN `resident` ON `issue`.`resident_id` = `resident`.`resident_id`  							        
							        WHERE `issue_type` = 'Certificate' ORDER BY `issue_date` DESC";
	                            $result = mysqli_query($con, $query); 

	                            if (mysqli_num_rows($result) > 0) :
	                              while($row = mysqli_fetch_assoc($result)) :
	                         ?>

	                        <tr>
	                            <td><?php echo $row["resident_fname"] . " " .$row["resident_mname"]. " ".$row["resident_lname"]. " " ; ?></td>
	                            <td><?php echo $row["issue_type"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_date"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_expire"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_ornum"]; ?></td>                          


				                <td>
									<button style="background-color: #E60012;" data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="delete btn btn-danger" data-id="<?php echo $row["issue_id"]; ?>"> Delete
									</button>
								</td>                               
	                        </tr>

	                         <?php 
	                              endwhile;
	                            endif; 
	                          ?>


			        </tbody>
			    </table>
</div>
	<div id="clearanceDiv" style="display: none" > 


		<table id="example2" class="display" style="align-items: center; justify-content: center; width:100%; height: 100%;">
			        <thead>
			            <tr>
			                <th style="text-align: center;">Name</th>
			                <th style="text-align: center;">TRANSACTION TYPE</th>
			                <th style="text-align: center;">DATE ISSUED</th>
			                <th style="text-align: center;">DATE EXPIRED</th>
			                <th style="text-align: center;">O.R.#</th>
			                <th style="text-align: center;">TOOLS</th>
			            </tr>
			        </thead>
			        <tbody>


	                       	<?php 
	                            $query1 = "SELECT * FROM `issue` 	                            
							        JOIN `resident` ON `issue`.`resident_id` = `resident`.`resident_id`  							        
							        WHERE `issue_type` = 'Clearance' ORDER BY `issue_date` DESC";
	                            $result1 = mysqli_query($con, $query1); 

	                            if (mysqli_num_rows($result1) > 0) :
	                              while($row = mysqli_fetch_assoc($result1)) :
	                         ?>

	                        <tr>
	                            <td><?php echo $row["resident_fname"] . " " .$row["resident_mname"]. " ".$row["resident_lname"]. " " ; ?></td>
	                            <td><?php echo $row["issue_type"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_date"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_expire"]; ?></td>
	                            <td style="text-align:center;"><?php echo $row["issue_ornum"]; ?></td>                          


				                <td>
									<button style="background-color: #E60012;" data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="delete btn btn-danger" data-id="<?php echo $row["issue_id"]; ?>"> Delete
									</button>
								</td>                               
	                        </tr>

	                         <?php 
	                              endwhile;
	                            endif; 
	                          ?>


			        </tbody>
			    </table>

	</div>

</div>

	</div>
        <script src="js/all.js"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/simple-datatables.min.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/jquery-3.6.0.min.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script type="text/javascript">

		$(document).ready(function() {
			$('#example1').dataTable({
			    // "bPaginate": false,
			    "bLengthChange": false,
			    "bFilter": true,
			    "bInfo": false});

			$('#example2').dataTable({
			    // "bPaginate": false,
			    "bLengthChange": false,
			    "bFilter": true,
			    "bInfo": false});
			});


       $('.logout').click(function(){
                  $.ajax({
                    url: 'query/user.php',
                    type: 'POST',
                    data: { 
                        action_name:'logout', 
                    },
                    success: function(response){
                            window.location.href = 'index.php'; 
                    }
            });
          });

            function showCertificate() {
	            document.getElementById('certificateDiv').style.display = 'block';
	            document.getElementById('clearanceDiv').style.display = 'none';
            }

            function showClearance() {
                document.getElementById('certificateDiv').style.display = 'none';
                document.getElementById('clearanceDiv').style.display = 'block';
            }


            $(document).ready(function(){

                $('.delete').click(function(){
                    var el = this;
                    var deleteid = $(this).data('id');

                    var confirmalert = confirm("Are you sure you want to delete form?");
                    if (confirmalert == true) {
                        $.ajax({
                            url: 'query/forms.php',
                            type: 'POST',
                            data: { 
                            action_name:'delete', 
                            id:deleteid
                            },
                            success: function(response){
				            	alert("Form successfully deleted!");
                                if(response == 1){                                    
                                    location.reload();
                                }
                            }
                        });
                    }
                });




            });
    </script>

</body>
</html>
