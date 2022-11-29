<!--
 ***   ***        ****             *   *          ***   ***
***** *****       *   *            *   *         ***** *****
***********       *   *            ** **         ***********
 *********        ****     *****   * * *          *********                                            
  *******         * *              *   *           *******
   *****          *  *             *   *            *****
    ***           *   *            *   *             ***
     *                                                *
-->
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	if(isset($_POST['submit']))
	{		
		$id=$_POST['id'];
		$name=$_POST['name'];
	  
		$sql ="INSERT INTO trainees(id,name) VALUES(:id, :name)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':id', $id, PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query->execute();
		$msg=" Download the delay list Successfully";
  }    

  if(isset($_GET['del']))
  {
  $id=$_GET['del'];
  
  $sql = "delete from trainees WHERE id=:id";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':id',$id, PDO::PARAM_STR);
  $query -> execute();
  
  $msg=" Deleted successfully";
  }

 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Manage Users</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage  trainees</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Delay 
							<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Download the delay list</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal"  name="submit">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Date<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                            <input type="date" name="id" class="form-control" required>
                            </div>
                           
                           
           
                           

							
                                <button class="btn btn-primary" name="submit" type="submit">download</button>
                                </form>
                               
							</div>
						</div>
				</div></div>
							</div>
							<div class="panel-body">
								
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                                <th>ID</th>
												<th>Imagew</th>
                                                <th>Name</th>
												<th>Date</th>
												<th>time in</th>
												<th>period of delay</th>

                                              
										</tr>
									</thead>
									
									<tbody>

									

<?php $sql = "SELECT * from  trainees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
                                            <td><?php echo htmlentities($result->id);?></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                       
	
										</tr>
										<?php }} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>
		
</body>
</html>
<?php } ?>
