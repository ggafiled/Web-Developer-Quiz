<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Emblem-question.svg/1200px-Emblem-question.svg.png" />
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Web-Developer-Quiz</title>
</head>

<body>
  <?php
  require('vendor/autoload.php');
  include("connectdb.php");

  $db->query("DELETE FROM number_db");
  $db->query("CREATE TABLE IF NOT EXISTS number_db (id INTEGER PRIMARY KEY AUTOINCREMENT, _value INTEGER);");

  if ($_POST["submit"]) {
    $input = $_POST["input"];
    echo $input;
    $database = explode(",", $input);
    foreach ($database as $key => $item) {
      $db->query("INSERT INTO number_db (_value) VALUES (".intval($item).");");
    }
  }

  function getANDcalculate()
  {
    global $db;
    $results = $db->query("SELECT CASE WHEN _value%3 == 0 THEN _value+5 ELSE _value END AS hit FROM number_db ORDER BY hit DESC;");
      while($row = $results->fetchArray()){
        echo $row['hit'].", ";
      }
  }

  ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Web-Developer-Quiz</a>
  </nav>
  <div class="container pt-3 justify-content-center align-items-center">
    <form class="pb-3" action="#" method="POST">
      <div class="row align-items-center">
        <div class="col-md-10">
          <input id="input" name="input" class="form-control form-control-lg" type="text" placeholder="กรอกข้อมูลตัวเลข คั่นด้วยเครื่องหมาย , ระหว่างตัวเลข">
        </div>
        <div class="col-md-2">
          <button id="submit" name="submit" type="submit" value="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
    <div class="card bg-light text-dark col-md-10">
      <div id="results" class="card-body">ข้อมูลจากการคำนวณ : <?php echo(getANDcalculate()); ?></div>
    </div>
  </div>
</body>

</html>