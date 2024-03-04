<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        body {
            position: relative;
            height: 100vh;
            margin: 0;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('image/uc background.jpg');
            background-size: cover; /* Fixed height of 500px, width adjusted proportionally */
            background-position: center center;
            background-repeat: no-repeat;
            opacity: 0.3; /* Adjust opacity here */
        }
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            z-index: 1;
        }

        .action-button {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<?php


?>

<div class="button-container">
    <a href="form/queue-home.php"></a>
    <a href="login/desktop.php?department=ADMIN&window=1" class="action-button">Welcome</a>
    <a href="Monitor/edp-queue.php"></a>
</div>

</body>
</html>