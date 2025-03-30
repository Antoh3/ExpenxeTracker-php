<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense analysis</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<body>
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>
    <div class="main">
        <div class="cards">
            <?php 
            $userid=$_SESSION['detsuid'];
            $query = mysqli_query($con,"SELECT ExpenseItem,SUM(ExpenseCost) as 
                total_expense FROM tblexpense where (UserId='$userid') GROUP BY ExpenseItem");

            $expenses = [];
            while($row = mysqli_fetch_assoc($query)){
                $expenses[] = $row;
            }
            ?>
            <!-- <div class="card">
                <div class="card-content">
                    <div class="number">$5000</div>
                    <div class="card-name">Salary</div>
                </div>
                <div class="icon-box">
                    <img src="images/dollar.png">
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">$400</div>
                    <div class="card-name">Rent</div>
                </div>
                <div class="icon-box">
                    <img src="images/money icon.png">
                </div>
            </div> -->
            <div class="card">
                <?php foreach($expenses as $expense) {?> 
                    <div class="card-content">
                        <div class="number">
                            <?php echo ucfirst($expense['ExpenseItem']); ?>
                        </div>
                        <div class="card-name">
                            <?php echo number_format($expense['total_expense'], 2) . ' $'; ?>
                        </div>
                    </div>
                    <div class="icon-box">
                        <img src="images/food.png">
                    </div>
                <?php }?> 
            </div> 
            
        </div>
        <div class="charts">
            <div class="chart">
                <h2>Earnings(past 12 months)</h2>
                <canvas id="lineChart"></canvas>
            </div>
            <div class="chart" id="doughnut-chart">
                <h2>Expenses</h2>
                <canvas id="doughnut"></canvas>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="chart.js"></script>
    <!-- <script src="chart2.js"></script> -->
</body>
</html>
<?php } ?>