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
    <title>Barangay Information Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

	<header>
		<div style="width: 20%; display: flex; justify-content: flex-start;">

	    <img src="./logo.png" style="width: 100px; height: 89px;" alt="" loading="lazy"  />
	    <a href="index.php" style="font-size: 30px;"><i><h4 style="font-family:Bodoni FLF; line-height: 1.1; margin: 0">Barangay <br/>Information</h4></i></a>
			
		</div>
		<div style="left: 405px; position:absolute; height: 70px; width: 1468px; background: white; display: flex; justify-content: flex-end">
		<button class="btn" style="font-size:16px; box-shadow: 2px 2px black; border-radius: 50px;align-items: center; justify-content:center; display:flex; height:40px; border: 1px solid black; color: black; width:100px;" onclick="location.href='profile.php';"><?= ucwords($_SESSION['user_type']); ?> <span style="color: green; padding: 0 10px">●</span></button>
		</div>
	</header>

	<div class="parent" style="height: 813px;">

	  <nav style="width:388px;">
	    <ul>
	        <li style="box-sizing:border-box; border: 1px solid black"><img src="./icons/home.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" />
	        	<a href="index.php">Dashboard</a>
	        </li>
	        <li style="box-sizing:border-box; border: 1px solid black" class="active"><img src="./icons/information.png" width="30" height="30" alt="" loading="lazy" style="margin-right: 20px" /><a href="information.php">Barangay Information</a>
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
	        <li style="box-sizing:border-box; border: 1px solid black" class="logout"><img src="./icons/sign.png" width="30" height="30" alt="" loading="lazy"/><a href="#">Logout</a></li>
	    </ul>
	  </nav>
	  
	   <!--Content-->
        <div class="content" style="display: flex; flex-direction:row; justify-content: space-evenly; align-items: flex-start; padding: 10px; margin: 15px;">


            <div style="height: 710px; text-align: center; padding: 10px 20px; background-color: #CCC14F; width: 20%;  font-size: 12px;  border: 2px solid grey; margin: 10px" >
                <div style="display: flex; flex-direction:row; justify-content: flex-start; align-items: center; padding: 10px 20px;" >
                    
                    <img src="./barangay.png" width="35" height="35" alt="" loading="lazy" style="margin-right: 20px;" />
                    
                <div style="text-align: center; padding-left: 25px;">
                        <p style="font-family:Bodoni FLF; font-weight: bold;">VISION</p>
                    </div>
                </div>
				<style>
					p{
						font-size: 15px;
					}
				</style>
                <div style="text-align: center;">
                    <p style="font-family:Bodoni FLF; font-size: 17px;">An environmentally peaceful, well developed eco-tourism infrastructure community propelled with economic committed leaders working towards best for the community, unified in all platforms in achieving a resourceful and productive society the influence of terrific radical affiliations. far from the influence of terrific radical affiliations .</p>
                </div> 

                <div style="display: flex; flex-direction:row; justify-content: center; align-items: center; padding: 10px 20px;" >
                    <p style="font-family:Bodoni FLF;font-weight: bold;">MISSION</p>
                </div>
                <div style="text-align: center;">                    
			    	<p style="font-family:Bodoni FLF;font-size: 17px;">To extend to the public the best knowledge and abilities of barangay officials enthusiastically serve without prejudices of time and effort, enabling the policy thrust in "mamayan muna, hindi mamaya na" through crafting valuable and best policies, plans and programs to help the different sectors leading to economically sustaining society.</p>
                </div>

                <div style="display: flex; flex-direction:row; justify-content: center; align-items: center; padding: 10px 20px;" >
                    <p style="font-family:Bodoni FLF;font-weight: bold;">GOAL</p>
                </div>
                <div style="text-align: center;">
			    	<p style="font-family:Bodoni FLF;font-size: 17px;">Our major goal is to assist our society through the upliftment of fellow villagers' economic condition, environmental conservation in agriculture center manageable ecological capability underlying the spirit of camaraderie and solidarity</p>
                </div>

            </div>



            <div style="display: flex; flex-direction:column; justify-content: center; align-items: center;  width: 65%;" >
                <div style="display: flex; flex-direction:row; justify-content: flex-start; align-items: center; padding: 10px 20px; background-color: #CCC14F;" >
                    
                    <img src="./barangay.png" width="70" height="70" alt="" loading="lazy"/>
                    <div style="color:white; display: flex; flex-direction:column; justify-content: flex-start; align-items: center; padding: 5px; font-weight: bold; width:350px; justify-content:center;"> 
			            <p style="font-size:20px; font-family:Bodoni FLF; margin: 0; ">San Nicolas</p>
			            <p style="font-size:20px; font-family:Bodoni FLF; margin: 0; ">Municipality of Jasaan</p>
			            <p style="font-size:20px; font-family:Bodoni FLF; margin: 0; ">Province of Misamis Oriental</p>         


                    </div>
                </div>


                <div style="color:white; font-size:20px; font-family:Bodoni FLF; text-align: center; background-color: #b2935b; margin: 50px 0; padding: 7px; width: 400px">
		            <h5>HISTORY &amp; HISTORICAL POPULATION</h5>
                </div> 

                <div style="text-align: center; padding-top:80px; line-height:1.5;">
                    <p style="font-family:Bodoni FLF; font-size: 19px;">Barangay San Nicolas is located in the municipality of Jasaan, Misamis Oriental, Philippines. It is one of the 15 barangays that make up Jasaan, and it is considered an inland barangay. As of the 2020 census, Barangay San Nicolas has a population of 1,845 people.</p>
                </div>      

                <div style="text-align: center;line-height:1.5;">
                    <p style="font-family:Bodoni FLF; font-size: 19px;">The barangay is known for its agricultural industry, with rice and corn being the main crops grown. There are also a number of small businesses in the barangay, such as sari-sari stores and carinderias. Barangay San Nicolas is a close-knit community, and the residents are known for their hospitality. The barangay has a number of festivals and events throughout the year, such as the Araw ng San Nicolas and the Banig Festival.</p>
                </div>      
            </div>

            <div style="height:400px; margin-top:25px; display: flex; flex-direction:column; width: 20%; border: 2px solid grey;" >

                <div style="display: flex; flex-direction:row; justify-content: center; align-items: center; padding: 10px 20px; background-color: #D9D9D9;" >
                    <p style="font-weight:bold; font-family:Bodoni FLF; font-size: 20px;">SUMMARY DATA</p>
                </div>


                <div style="font-family:Bodoni FLF; margin-top:40px; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px;">
                    
	                <p>Type :</p>
	                <p style="text-align: center;text-decoration: underline; ">Barangay</p>    
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px; background-color: #F0EFEF;">
                  
	                <p>Island  group :</p>
	                <p style="text-align: center;text-decoration: underline; ">Mindanao</p>
	             
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px;">
	                <p>Region :</p>
	                <p style="text-align: right;text-decoration: underline; width: 60%;">Northern Mindanao (Region X)</p>
	             
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px; background-color: #F0EFEF;">
	                <p>Municipality :</p>
	                <p style="text-align: center;text-decoration: underline; ">Jasaan</p>
	             
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px;">
	                <p>Province :</p>
	                <p style="text-align: center;text-decoration: underline; ">Misamis Oriental</p>
	             
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px; background-color: #F0EFEF;">
	                <p>Postal code :</p>
	                <p style="text-align: center;text-decoration: underline; ">9003</p>
	             
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px;">
	                <p>Philippine major island(s) :</p>
	                <p style="text-align: center;text-decoration: underline; ">Mindanao</p>
                 
                </div>                
	            <div style="font-family:Bodoni FLF; display: flex; flex-direction:row; justify-content: space-between; align-items: center; padding: 5px; background-color: #F0EFEF;">

            </div>


        </div>

	</div>

</body>
</html>
