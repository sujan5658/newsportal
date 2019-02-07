<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:login.php");
    }
    else if($_SESSION['admin']!="valid"){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>व्यवस्थापक विभाग</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="image/logo.jpg">
	<!--Custom Font-->
	<link href="css/font.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
        .photograph{
            border-radius: 10px;
            padding: 15px;
            padding-left: 25px;
            width: 335px;
            transition: transform .3s;
        }
        .photograph:hover{
            -ms-transform: scale(1.05);
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
            border: 2px solid red;
            border-radius: 20px;
        }
        .youtube_video{
            width: 500px;
        }
    </style>
</head>
<body>
    <?php
        include_once ("includes/navbar.php");
        include_once ("includes/sidebar.php");
    ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php
            require_once ("bootstrap.php");
        ?>
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>