<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
	<?php
require_once 'DbConnect.php';
	
$response = array();

$result = mysqli_query($conn,"SELECT * FROM Emp");

echo "<table class=\"table\">
<thead class=\"thead-dark\">
<tr>
<th>ID</th>
<th>Name</th>
<th>Salary</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['empno'] . "</td>";
echo "<td>" . $row['ename'] . "</td>";
echo "<td>" . $row['salary'] . "</td>";
echo "</tr>";
}
echo " </tbody></table>";

?>

<br><br>

<div class="card text-center" style="margin-left: 20%; margin-right: 20%">
	  <div class="card-header">
    Calculate Tax for employee
  </div>
<form id = "f1" action="https://harsh.software/dbms/api/calculate.php" target="_self" method="post">
  <div class="form-group">

    <input type="text" class="form-control" id="currSalary" name="currSalary" placeholder="Enter Employee ID here" >
  </div>
  <input type="submit" form="f1" class="btn btn-primary" value = "Calculate Tax" id="calc">

 	
</form>
<br>
<form id="f2" action="https://harsh.software/dbms/api/add.php?apicall=add" target="_self" method="post">
  <div class="form-group" >

    <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter name here" >
    <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Employee Salary" >
  </div>
  <button type="submit" form="f2" id="adduser" class="btn btn-primary">Add</button>

 
</form>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>