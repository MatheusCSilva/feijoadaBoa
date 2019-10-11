<?php

require_once(__DIR__ . '/vendor/autoload.php');
/*
$apiInstance = new Swagger\Client\Api\EmployeesApiControllerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body_limit = 56; // int | The amount of employees returned
$page_limit = 56; // int | The pages to  return employees info

try {
    $result = $apiInstance->employeesGet($body_limit, $page_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApiControllerApi->employeesGet: ', $e->getMessage(), PHP_EOL;
}
*/


// include("lib/Api/EmployeesApiControllerApi.php");
include("lib/Api/EmployeesApiControllerApi.php");
include("lib/Model/Employee.php");
// define variables and set to empty values
$nameErr = $idErr = $titleErr = "";
$name = $id = $title = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name =$_POST["name"];
  }
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = $_POST["title"];
  }
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else {
    $id = $_POST["id"];
  }

  $e = array('employee_name' => $name, 'employee_title' => $title, 'id' => $id);
  $emp = new Employee();
  $api = new EmployeesApiControllerApi();
  $api->employeesPost($emp);
}

/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>UnitTest</title>
</head>

<body>

  <div class="contain">
    <div class="row">
      <div class="col">
        <div class="insideCol">
          <center>
            <h5>Employees List</h5>
          </center>
          <p>
            <?php
            echo $emp;
            ?>
          </p>

        </div>
      </div>
      <div class="col getEmp">
        <div class="insideCol">
          <center>
            <h5>Get Employee (by ID)</h5>
          </center>
          <div class="getInside" style="padding: 5px; transform: scale(0.9)">
            <form method="post" action="index.php">
              <label> ID: </label>
              <input type="number" name="id">
              <span class="error"><?php echo $idErr; ?></span>
              <br><br>
              <label> Nome: </label> <input type="text" name="name">
              <span class="error"><?php echo $nameErr; ?></span>
              <br><br>
              <label> Title: </label>
              <input type="text" name="title">
              <span class="error"><?php echo $titleErr; ?></span>
              <br><br>
              <input type="submit" name="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col">
        <div class="insideCol">
          <center>
            <h5>Delete Employee (by ID)</h5>
          </center>
        </div>
      </div>
      <div class="col">
        <div class="insideCol">
          <center>
            <h5>Update Employee</h5>
          </center>
        </div>
      </div>
    </div>
  </div>



  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>