
<?php
session_start();

include('includes/config.php');
$conn=new PDO('mysql:host=localhost; dbname=librar', 'root', '') or die(mysql_error());
$caption="";
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  move_uploaded_file($temp,"files/".$name);
$query=$conn->query("insert into upload(name)values('$name')");
if($query){
header("location:sa.php");
}
else{
die(mysql_error());
}
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	
 
	  <div class="content-wrapper">
	    <div class="container">
 <section class="content">
  <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
			
		
		<div style="overflow-x:auto;"> 
				<table class="table table-bordered table-striped" id="example">
			<thead>
			                        <th>semester</th>
			                        <th>Course NO</th>
			        				<th>LECTURE</th>
			        				<th>ACTION</th>
									
			        				
			        			</thead>
								<tbody>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$semester=$row['semester'];
				$course=$row['course'];
				$name=$row['name'];
			?>
			<tr>
			<td>
			&nbsp;<?php echo $semester ;?>
			</td>
			<td>
			&nbsp;<?php echo $course ;?>
			</td>
			<td>
			&nbsp;<?php echo $name ;?>
			</td>
			<td>
			<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>">Download</a></button>
			</td>
			</tr>
			<?php }?>
			</tbody>
		</table>

	</div>
	</div>
	</div>
	</div>
	 </section>
	     
	    </div>
	  </div>
  
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</div>

</body>
</html> 
