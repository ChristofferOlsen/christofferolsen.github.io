<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Christoffers Dronesystem</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway|Passion+One' rel='stylesheet' type='text/css'>
</head>
	<body>
		
	<section class="section sectionMap">

			<?php 
				for($i = 0; $i < 10; $i++){

					$randomWidth = rand(0,98);
					$randomHeight = rand(0,75); ?>
						<div class="accident" id="accident<?php echo $i;?>" style="left:<?php echo $randomWidth;?>%; top: <?php echo $randomHeight; ?>%; "></div>
				<?php }
			 ?>
		<img src="img/map.png" alt="" id="map">
		<div class="form">

			<div id="left">
				<div class="stats">
				<p id="overskrift">Control panel</p>
				</div>	
			</div>
			<div id="center">
				<div id="droneTotal">
					<div class="droneNumberTotal">
						<p id="droneCount">0</p>
						<p>Total number of drones</p>
					</div>
					<button class="btn" id="btnAdd">Add drone</button>
				</div>
				<div id="droneAttendance">
					<div class="droneAttendance droneNumbers">
						<p id="accidentsCalled">0</p>
						<p>Accidents visited</p>
					</div>
					<button class="btn" id="btnDelete">Delete drone</button>
				</div>
			</div>
		</div>
	</section>

	<div id="dronebase">
			
	</div>

<style>
	*{
		margin: 0; 
		padding: 0;
	}

	body{
		font-family: 'Raleway', sans-serif;
	}

	#map{
		width: 100%;
		height: 100%;
		z-index: 0;
	}

	.accident{
		background-image: url("img/ex.jpg");
		height: 20px;
		width: 20px;
		background-size: 100%;
		position: absolute;
		z-index: 1;
	}

	#overskrift{
		font-size: 20px;
	}
	.stats{
		height: 40px;
		width: 150px;
		text-align: center;
		padding-top: 10px;
		border-bottom-style: solid;
	}

	.stats p {
		padding-top: 2px;
	}

	.droneNumberTotal{
		padding-bottom: 5px;
	}

	.droneAttendance{
		padding-bottom: 5px;
	}

	#center{
		text-align: center;
	}

	#droneTotal{
		display: inline-block;
	}

	#droneAttendance{
		display: inline-block;
		padding-left: 75px;
	}

	#dronebase{
		width: 100%;
		height: 50px;
		position: absolute;
		top:665px;

	}

	.form{
		position: absolute;
		display: inline-block;
		height: 170px;
		width: 100%;
		background-color: #13232f;
		border: 2px 2px 2px;
		z-index: 100;
		top: 715px;
		color: white;
	}
			
	.btn{
		width:200px;
		height:50px;
		font-size: 15px;
		background-color: white;
		color: black;
		font-family: 'Passion One', cursive;
		
	}

	

	#btnAdd:hover{
		border: 2px solid #4CAF50;
		color: #4CAF50;
	}

	#btnDelete:hover{
		border: 2px solid red;
		color: red;
	}

	.drone{
		position: absolute;
		z-index: 2000;
		top: 730px;
		left: 49.5%;
		width: 20px;
		height: 20px;
		border-radius: 50%;
		background-color: white;
	}

	.drone.active{
		background-color: red;
		animation: blinker 1s linear infinite;

	}
	@keyframes blinker {  
    50% { opacity: 0.0; }
	}

}

</style>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
	
	var droneCount = 0;
	var callsToAccidents = 0;

	function droneAdd() {
		$(".sectionMap").append("<div id='drone"+ droneCount +"' class='drone'></div>");
		$("#drone"+droneCount).on("click",function(event){
			// console.log(event);
			$(".drone.active").removeClass("active");
			event.target.classList.toggle("active");
			

		});
		droneCount++;
		$("#droneCount").html(droneCount);
	};

	$("#btnAdd").on("click",droneAdd);

	$(".accident").on("click",callDroneToAccident);

	function callDroneToAccident(droneEvent) {
		var positionAccidentX = $(droneEvent.target).css("left");
		var positionAccidentY = $(droneEvent.target).css("top");
		// console.log(positionAccidentX);
		// console.log(positionAccidentY);
		moveDroneTo(positionAccidentX,positionAccidentY);
		
		var selectedDrones = $(".drone.active").length;
		console.log(selectedDrones);
		if( selectedDrones > 0 ){
			callsToAccidents++;
			$("#accidentsCalled").html(callsToAccidents);
		}
	};

	function moveDroneTo(x, y) {
		$(".drone.active").animate({
			left: x,
			top: y
		});
	};

	$("#btnDelete").on("click",droneRemove);

	function droneRemove() {
		
		if (droneCount > 0){
			droneCount--;	
			$("#drone"+droneCount).remove();
			$("#droneCount").html(droneCount);
		};
	};
	

</script>

	</body>
</html>