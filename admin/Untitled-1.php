<div class="row">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body bk-primary text-light">
                    <div class="stat-panel text-center">
<?php 
$sql ="SELECT id from department";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$bg=$query->rowCount();
?>
                        <div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
                        <div class="stat-panel-title text-uppercase">Total department</div>
                    </div>
                </div>
                <a href="department.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body bk-success text-light">
                    <div class="stat-panel text-center">

<?php 
$sql1 ="SELECT id from employees ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>
                        <div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
                        <div class="stat-panel-title text-uppercase">Total employees</div>
                    </div>
                </div>
                <a href="employee.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>

                        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body bk-danger text-light">
                    <div class="stat-panel text-center">

<?php 

$sql12 ="SELECT id from task";
$query12 = $dbh -> prepare($sql12);;
$query12->execute();
$results12=$query12->fetchAll(PDO::FETCH_OBJ);
$regbd2=$query12->rowCount();
?>
                        <div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
                        <div class="stat-panel-title text-uppercase">Total Task</div>
                    </div>
                </div>
                <a href="task.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</div>