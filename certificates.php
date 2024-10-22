<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('query/db.php'); 
$resident = [];

$query = "SELECT * FROM `resident`"; 
$result = mysqli_query($con, $query); 

if (mysqli_num_rows($result) > 0) :
	while($row = mysqli_fetch_assoc($result)) :
		$resident[] = $row;
	endwhile;
endif; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
   	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
    <title>Barangay Information Management System</title>
</head>
<body>

	<header>
		<div style="width: 20%; display: flex; justify-content: flex-start;">

	    <img src="./logo.png" style="width: 100px; height: 89px;" alt="" loading="lazy"  />
	    <a href="index.php" style="font-size: 30px;"><i><h4 style="font-family:Bodoni FLF; line-height: 1.1; font-size:30px; font-weight: bold ;margin: 0">Barangay <br/>Information</h4></i></a>
			
		</div>
		<div style="left: 405px; position:absolute; height: 80px; width: 1488px; background: white; display: flex; justify-content: flex-end">
		<button class="btn" style="box-shadow: 2px 2px black; border-radius: 50px;align-items: center; justify-content:center; display:flex; height:40px; border: 1px solid black; color: black; width:100px;" onclick="location.href='profile.php';"><?= ucwords($_SESSION['user_type']); ?> <span style="color: green; padding: 0 10px">●</span></button>
		</div>
	</header>


<div class="parent">

<nav style="width:378px;">
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
	        <li style="box-sizing:border-box; border: 1px solid black" class="active"><img src="./icons/edit.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
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
	<li style="box-sizing:border-box; border: 1px solid black" class="logout"><img src="./icons/sign.png" width="30" height="30" alt="" loading="lazy" >
		<a href="" class="logout">Logout</a>
	</li>
</ul>
</nav>


<div class="content" style="display: flex; flex-direction: row; margin: 10px; width: 77%">
	<div style="width: 30%; margin: 10px; display: flex; flex-direction: column;  border: 1px solid black;">
	<div style="font-weight:bold;font-size: 20px; text-align: center; padding: 10px; margin: 20px; border: 1px solid black;">SELECT REPORT</div>
		<ul>
			<li id="certli" class="active"  style="cursor:pointer; margin: 10px 20px; text-align: center ;border: 1px solid black;"><a onclick="showCertificate()">Certificate Rpt</a></li>
			<li id="clearli" style="cursor:pointer; margin: 10px 20px; text-align: center ;border: 1px solid black;"><a onclick="showClearance()">Clearance Rpt</a></li>
		</ul>
	</div>


<div style="background-color: white; margin: 10px 50px;  width: 100%; border: 1px solid black; height: 999px; padding: 20px; ">

	<div  id="certificateDiv" style="width: 1000px; left: 800px; justify-content:center; padding:20px; position:absolute;">

		<div id="certificatePrint" class="container" style="height:855px;position: relative; display: flex; align-items: center; margin: 20px ; border: 2px solid black; padding: 20px;">
		<div class="image" style="position: absolute; left: 30px; top: 10px"><img src="./barangay.png" width="80" height="80" alt="" loading="lazy"></div>
		<div class="text" style="flex-grow: 1; text-align: center;">
		<div style="display: flex; flex-direction:column; align-items: center; flex-grow: 1; font-weight: bold;">
		<p style="font-family:Cardo;">Republic of the Philippines</p>
		<p style="font-family:Cardo;margin: 0; ">Province of Misamis Oriental </p>
		<p style="font-family:Cardo;margin: 0; ">Municipality of Jasaan </p>
		<h2 style="font-family:Bodoni FLF;margin: 0; ">Barangay San Nicolas</h2>
		<br><hr style="border-top: 3px solid black ;width: 100%">
		<h2 style="font-family:Cardo; line-height: 0.5; ">OFFICE OF THE BARANGAY CAPTAIN</h2>
		<h1 style="font-family:DejaVu Serif; margin: 0; ">CERTIFICATION</h1>
		<h5 style="font-family:Cardo;margin: 0;font-size: 17px;">(Indigency) </h5>
		</div>
		<div style="display: flex; flex-direction:column; align-items: left; flex-grow: 1; font-weight: bold;">
		<h5 style="font-family:Alegreya; text-align: left; font-size: 20px">TO WHOM IT MAY CONCERN :</h5>
		<p style="font-family:Garamond; line-height: 2; font-size: 20px; ">This is to Certify that <span  id="certificateResname"  style="font-family:Garamond; display: inline-block; border-bottom: 1px solid black; width: 340px; ">  </span> <span id="certificateResage"   style="display: inline-block;
		    border-bottom: 1px solid black; width: 60px; line-height: 1;">  </span>, years old A bona fide resident of San Nicolas, Jasaan, Misamis Oriental a low income earner Family is Classified as an Indigent Resident  </p>
		<p style="font-family:Garamond; line-height: 1; font-size: 20px"> This Certification is issued for the purpose of Scholarship Program.</p>
		<p style="font-family:Garamond; line-height: 1; font-size:20px"> ISSUED this  <span id="certificateResday"  style="font-family:Garamond; display: inline-block; border-bottom: 1px solid black; width: 60px; ">  </span> day of  <span id="certificateResmonth"  style="line-height: 1; display: inline-block; border-bottom: 1px solid black; width: 60px; ">  </span> 2024 at Barangay San Nicolas Purok Mangga Misamis Oriental </p>
		</div>
		<div style="display: flex; flex-direction:column; justify-content: flex-end; align-items: end; font-weight: bold;">

			<div style="align-items: center; ">
				<p style="font-family:DejaVu Serif;text-align: left; margin: 0">With Authority of  </p>
				<h3 style="font-family:Alegreya; font-size: 25px; line-height: 0.5;">HON. WARREN  M. MANGO</h3>
				<p style="font-family:Alegreya; line-height: 0.1;">Barangay Captain </p>
			</div>


			<div style="align-items: center; margin-top: 30px; ">
				<p style="font-family:Cardo; text-align: left; margin: 0">By: </p>
				<h3 style="font-family:Alegreya; font-size: 25px; line-height: 0.1;">HON. ALEX L. CABINGAS</h3>
				<p style="font-family:Alegreya; ">Barangay Kagawad </p>
			</div>

		</div>
		<div style="display: flex; flex-direction:column; justify-content: flex-start; flex-grow: 1; font-weight: bold; text-align: left; margin: 20px 0;">
			<p style="font-family:Alegreya; line-height: 0.5;">Not valid without dry seal :</p>
		</div>
		</div>
		</div>

		<div style="display: flex; flex-direction:row; justify-content: flex-end; align-items: end; font-weight: bold; margin-top: 10px; margin-right: 50px">
			<div style=" display: flex; align-items: center; column-gap: 10px ">
				<button onclick="openCertificate()" class="btn" style="color:black; border: 1px solid  black;background-color: #7ED957; width: 50px; ">Edit</button>

				<button id="printCertificate" class="btn" style="color:black; border: 1px solid black; background-color: #FFDE59 ; width: 50px;">Print</button>
			</div>
		</div>


	</div>

	<div  id="clearanceDiv"  style="justify-content:center; align-items:center; padding:20px; left:800px; height:950px; width: 1000px; display: none; position:absolute;">

		<div id="clearancePrint" class="container" style=" justify-content:center; height: 800px; position: relative; display: flex; align-items: center; margin: 20px ; border: 2px solid black; padding: 20px;">
		<div class="image" style="position: absolute; left: 30px; top: 10px"><img src="./barangay.png" width="80" height="80" alt="" loading="lazy"></div>
		<div class="text" style="flex-grow: 1; text-align: center;">
		<div style="display: flex; flex-direction:column; align-items: center; flex-grow: 1; font-weight: bold;">
		<p style="font-family:Cardo; margin: 0; ">Republic of the Philippines</p>
		<p style="font-family:Cardo; margin: 0; ">Province of Misamis Oriental </p>
		<p style="font-family:Cardo; margin: 0; ">Municipality of Jasaan </p>
		<h2 style="font-family:Bodoni FLF; margin: 0; ">Barangay San Nicolas</h2>
		<br><hr style="border-top: 3px solid black ;width: 100%">
		<h2 style="font-family:Cardo;line-height: 0.5;">OFFICE OF THE BARANGAY CAPTAIN</h2>
		<h1 style="font-family:DejaVu Serif; margin: 0;">BARANGAY CLEARANCE</h1>
		</div>
		<div style="line-height: 2.5; display: flex; flex-direction:column; align-items: left; flex-grow: 1; font-weight: bold;">
		<h3 style="font-family:Alegreya; text-align: left; font-size: 20px;">TO WHOM IT MAY CONCERN :</h3>
		<p style="font-family:Garamond; line-height: 2; font-size: 20px; ">This is to Certify that <span  id="clearanceResname"  style="display: inline-block; border-bottom: 1px solid black; width: 340px; ">  </span> <span id="clearanceResage"  style="display: inline-block; border-bottom: 1px solid black; width: 60px; ">  </span> years old  Residents of San Nicolas Purok Mangga is known to be of Good  Moral and Law -abiding citizen in the Community. </p>
		<p style="font-family:Garamond; line-height: 2; font-size: 20px"> To Certify further, that she/he has no derogatory and/or criminal records filed in this Barangay .</p>
		<p style="font-family:Garamond;  font-size: 20px"> ISSUED this <span id="clearanceResday"  style="display: inline-block; border-bottom: 1px solid black; width: 60px; ">  </span> day of <span id="clearanceResmonth" style="display: inline-block; border-bottom: 1px solid black; width: 60px; ">  </span> 2024 at Barangay San Nicolas Purok Mangga</p>
		<p style="font-family:Garamond; line-height: 1; font-size: 20px">Upon request of the interested for whatever legal purposes it may serve</p>
		</div>
		<div style="display: flex; flex-direction:column; justify-content: flex-end; align-items: end; font-weight: bold; margin-top: 50px"><div style="align-items: center; ">
		<h3 style="font-family:Alegreya;line-height: 0.5;">WARREN  M. MANGO</h3>
		<p style="font-family:Alegreya;line-height: 0.5;">Barangay Captain </p>
		</div></div>
		<div style="display: flex; flex-direction:column; justify-content: flex-start; flex-grow: 1; font-weight: bold; text-align: left;">
		<p style="font-family:Garamond; line-height: 0.3;">O.R No <span id="clearanceResornum"  style="display: inline-block; border-bottom: 1px solid black; width: 130px; ">  </span>  </p>
		<p style="font-family:Garamond;line-height: 0.3;">Date Issued: <span id="clearanceResdate"  style="display: inline-block; border-bottom: 1px solid black; width: 130px; ">  </span>  </p>
		<p style="font-family:Garamond;line-height: 0.3;">Doc. Stamp: Paid </p>
		</div>
		</div>
		</div>

		<div style="display: flex; flex-direction:row; justify-content: flex-end; align-items: end; font-weight: bold; margin-top: 10px; margin-right: 50px">
			<div style=" display: flex; align-items: center; column-gap: 10px ">
				<button onclick="openClearance()" class="btn" style="color:black;border: 1px solid  black;background-color: #7ED957; width: 50px; ">Edit</button>

				<button id="printClearance" class="btn" style="color:black;border: 1px solid  black;background-color: #FFDE59 ; width: 50px;">Print</button>
			</div>
		</div>
	</div>

</div>




</div>
</div>


            <!-- Certificate Modal -->
            <div class="modal fade" id="AddCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="margin: 0 auto;" id="exampleModalLabel">Issue Certificate</h5>
                    <button type="button" class="close" onclick="closeAddModal()" aria-label="Close">

                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card shadow-lg border-0 rounded-lg mt-12">
                        <div class="card-body">
                            <form action='query/certificate.php' method='post' id='myform2'>
	                            <input id="action_name"  name="action_name" type="hidden"  value="certificate" />
                              <div class="row mb-12">
                                <div class="col-md-12">
					                        <div class="form-group row mb-3">
											    <label for="resident_id2" class="col-sm-4 col-form-label">Resident</label>
											    <div class="col-sm-8">

													<select class="form-select" name="resident_id2" id="resident_id2">
												    	<?php
													    	foreach ($resident as $value) :
													    		echo '<option value="'.$value['resident_id'].'"> '.$value['resident_fname']. " " .$value['resident_mname']. " ".$value['resident_lname'] . '</option>';
													    	endforeach;

												    	?>                      
						                          </select>
												    
												</div>
										  </div>
						                      <div class="form-group row mb-3">
											    <label for="issue_ornum2" class="col-sm-4 col-form-label">OR Number</label>
											    <div class="col-sm-8">
												    <input type="text" class="form-control" id="issue_ornum2" name="issue_ornum2" placeholder="OR Number">
											    </div>
											  </div>

						                      <div class="form-group row mb-3">
											    <label for="issue_date2" class="col-sm-4 col-form-label">Date Issue</label>
											    <div class="col-sm-8">
												    <input type="date" class="form-control" id="issue_date2" name="issue_date2" placeholder="Last Name">
											    </div>
											  </div>


						                      <div class="form-group row mb-3">
											    <label for="issue_expire2" class="col-sm-4 col-form-label">Date Expire</label>
											    <div class="col-sm-8">
												    <input type="date" class="form-control" id="issue_expire2" name="issue_expire2" placeholder="Last Name">
											    </div>
											  </div>
                                 	
                                </div>
                              </div>

                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
				  <style>
	   .btn-primary:hover, .btn-primary.hover {
  /* Same hover effect styles as before */
  background-color: gray;
  color: white;
  border-color: #4CAF50;
  cursor: pointer;
}

.btn-danger:hover {
  /* Hover effect styles */
  background-color: gray; /* Change background color on hover to a darker red */
  color: white; /* Change text color on hover */
  border-color: #d33; /* Change border color on hover (optional) */
  cursor: pointer; /* Indicate clickable element on hover */
}
  </style>
                    <button type="button" class="btn btn-primary" id="submitCertificate">
                    	<i class="fa fa-refresh" style="color: black"></i>
                    	Add Clearance
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="closeAddModal()">
                    	<i class="fa fa-close" style="color: black"></i>
                    Close</button>
                  </div>
                </div>
              </div>
            </div>


<!-- clearance Modal -->
            <div class="modal fade" id="AddClearance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="margin: 0 auto;" id="exampleModalLabel">Issue Clearance</h5>
                    <button type="button" class="close" onclick="closeAddModal()" aria-label="Close">

                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card shadow-lg border-0 rounded-lg mt-12">
                        <div class="card-body">
                            <form action='query/certificate.php' method='post' id='myform3'>
	                            <input id="action_name"  name="action_name" type="hidden"  value="clearance" />
                              <div class="row mb-12">
                                <div class="col-md-12">
					                        <div class="form-group row mb-3">
											    <label for="resident_id1" class="col-sm-4 col-form-label">Resident</label>
											    <div class="col-sm-8">

													<select class="form-select" name="resident_id1" id="resident_id1">
												    	<?php
													    	foreach ($resident as $value) :
													    		echo '<option value="'.$value['resident_id'].'"> '.$value['resident_fname']. " " .$value['resident_mname']. " ".$value['resident_lname'] . '</option>';
													    	endforeach;

												    	?>                      
						                          </select>
												    
												</div>
										  </div>
						                      <div class="form-group row mb-3">
											    <label for="issue_ornum1" class="col-sm-4 col-form-label">OR Number</label>
											    <div class="col-sm-8">
												    <input type="text" class="form-control" id="issue_ornum1" name="issue_ornum1" placeholder="OR Number">
											    </div>
											  </div>

						                      <div class="form-group row mb-3">
											    <label for="issue_date1" class="col-sm-4 col-form-label">Date Issue</label>
											    <div class="col-sm-8">
												    <input type="date" class="form-control" id="issue_date1" name="issue_date1" placeholder="Last Name">
											    </div>
											  </div>


						                      <div class="form-group row mb-3">
											    <label for="issue_expire1" class="col-sm-4 col-form-label">Date Expire</label>
											    <div class="col-sm-8">
												    <input type="date" class="form-control" id="issue_expire1" name="issue_expire1" placeholder="Last Name">
											    </div>
											  </div>
                                 	
                                </div>
                              </div>

                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
				  <style>
	   .btn-primary:hover, .btn-primary.hover {
  /* Same hover effect styles as before */
  background-color: gray;
  color: white;
  border-color: #4CAF50;
  cursor: pointer;
}

.btn-danger:hover {
  /* Hover effect styles */
  background-color: gray; /* Change background color on hover to a darker red */
  color: white; /* Change text color on hover */
  border-color: #d33; /* Change border color on hover (optional) */
  cursor: pointer; /* Indicate clickable element on hover */
}
  </style>
                    <button type="button" class="btn btn-primary" id="submitClearance">
                    	<i class="fa fa-refresh" style="color: black"></i>
                    	Add Clearance
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="closeAddModal()">
                    	<i class="fa fa-close" style="color: black"></i>
                    Close</button>
                  </div>
                </div>
              </div>
            </div>



    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

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


			$(document).ready(function(){
			    $('#printCertificate').on('click', function(){
			        var content = $('#certificatePrint').html();
			            var printWindow = window.open('', '_blank');
			    printWindow.document.write('<html><head><title>Print</title>');
			    printWindow.document.write('<style>@media print { #contentToPrint { display: block !important; } }</style>');
			    printWindow.document.write('</head><body>');
			    printWindow.document.write(content);
			    printWindow.document.write('</body></html>');
			    printWindow.document.close();
			    printWindow.print();
			    });

			    $('#printClearance').on('click', function(){
			        var content = $('#clearancePrint').html();
			            var printWindow = window.open('', '_blank');
			    printWindow.document.write('<html><head><title>Print</title>');
			    printWindow.document.write('<style>@media print { #contentToPrint { display: block !important; } }</style>');
			    printWindow.document.write('</head><body>');
			    printWindow.document.write(content);
			    printWindow.document.write('</body></html>');
			    printWindow.document.close();
			    printWindow.print();
			    });

			});

var monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

            $('#submitCertificate').click(function(){
                $.post($('#myform2').attr('action'),
                    $('#myform2 :input').serializeArray(),
                        function(data){

                            	console.log(data)
                            $.each(JSON.parse(data), function(index, item) {

								var date = new Date(item.issue_date);
								var month = date.getMonth();
								var day = date.getDate();
                               $("#certificateResname").text(item.resident_fname + '  ' + item.resident_mname + '  ' + item.resident_lname  );
                               $("#certificateResage").text(item.resident_age);
                               $("#certificateResday").text(day);
                               $("#certificateResmonth").text(monthNames[month]);
                            });                       	

                        	closeAddModal();  
                             
                        }
                );
            });
            
            
            
            $('#submitClearance').click(function(){
                $.post($('#myform3').attr('action'),
                    $('#myform3 :input').serializeArray(),
                        function(data){
                            	console.log(data)
                            $.each(JSON.parse(data), function(index, item) {
								var date = new Date(item.issue_date);
								var month = date.getMonth();
								var day = date.getDate();
                               $("#clearanceResname").text(item.resident_fname + '  ' + item.resident_mname + '  ' + item.resident_lname  );
                               $("#clearanceResage").text(item.resident_age);
                               $("#clearanceResornum").text(item.issue_ornum);
                               $("#clearanceResdate").text(item.issue_date);
                               $("#clearanceResday").text(day);
                               $("#clearanceResmonth").text(monthNames[month]);
                            });                      	

                        	closeAddModal();  
                             
                        }
                );
            });

            function showCertificate() {
	            document.getElementById('certificateDiv').style.display = 'block';
	            document.getElementById('clearanceDiv').style.display = 'none';
		        $('#certli').addClass('active');
		        $('#clearli').removeClass('active');
            }

            function showClearance() {
                document.getElementById('certificateDiv').style.display = 'none';
                document.getElementById('clearanceDiv').style.display = 'block';
		        $('#clearli').addClass('active');
		        $('#certli').removeClass('active');
            }

            function openClearance() {

                $('#AddClearance').modal('show');
            }
            function openCertificate() {
                $('#AddCertificate').modal('show');
            }

            function closeAddModal() {
                $('#AddClearance').modal('hide');
                $('#AddCertificate').modal('hide');
            }



    </script>
</body></html>