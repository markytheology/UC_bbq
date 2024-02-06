<?php
include '../queue/queue.php';
$conn = OpenCon();

$sql = "SELECT * FROM transaction_table WHERE status = '2' AND transaction_department = '4' ORDER BY created_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result-> num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_number = $row["id"];
} else {
    $queue_number = "---";
}

$sql = "SELECT id From transaction_table WHERE status = 1 AND transaction_department = '4' AND transaction_id = 'Enrollment' ORDER BY created_on DESC LIMIT 5";
$result = $conn->query($sql);

$pendingList = '<ul class = "no-bullets">';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingList .= '<li>' . $task . '</li>';
  }
}
$pendingList .= '</ul>';

$sql = "SELECT id From transaction_table WHERE status = 1 AND transaction_department = '4' AND transaction_id = 'Printing' ORDER BY created_on DESC LIMIT 5";
$result = $conn->query($sql);

$pendingListt = '<ul class = "no-bullets">';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingListt .= '<li>' . $task . '</li>';
  }
}
$pendingListt .= '</ul>';

$sql = "SELECT * FROM user_table WHERE office = 'EDP' AND windows = '1' AND status = '1'";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $windows = $row["windows"];
} else {
    $windows = "-";
}



$sql = "SELECT * FROM user_table WHERE office = 'EDP' AND windows = '2' AND status = '1'";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $windowss = $row["windows"];
} else {
    $windowss = "-";
}

$sql = "SELECT * FROM user_table WHERE office = 'EDP' AND windows = '3' AND status = '1'";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $windowsss = $row["windows"];
} else {
    $windowsss = "-";
}

$sql = "SELECT * FROM user_table WHERE office = 'EDP' AND windows = '4' AND status = '1'";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $windowssss = $row["windows"];
} else {
    $windowssss = "-";
}



$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/monitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">


<div class="row">
        <div class="column left">
          <h3>EDP</h3>
          <h3 class="number-size-h1"><?php echo $windows; ?></h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingList; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="column left">
        <h3 style = "color: white;">EDP</h3>
          <h3 class="number-size-h1"><?php echo $windowss; ?></h3>
          <h3 style = "color: white;">EDP</h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingList; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="column left">
        <h3 style = "color: white;">EDP</h3>
          <h3 class="number-size-h1"><?php echo $windowsss; ?></h3>
          <h3 style = "color: white;">EDP</h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingList; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="column left">
        <h3 style = "color: white;">EDP</h3>
          <h3 class="number-size-h1"><?php echo $windowsss; ?></h3>
          <h3>Window</h3>
        </div>
        <div class="column middle">
          <h3>Waiting Number</h3>
          <h3 id="pendingQueue"><?php echo $pendingListt; ?></h3>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h3><span id="span-list" class="number-size-h1-sc"> <?php echo $queue_number; ?></span></h3>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
</body>
</html>