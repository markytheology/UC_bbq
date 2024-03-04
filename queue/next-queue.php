<?php
include '../DBConnection.php';
$conn = OpenCon();

//Start the session
session_start();

$windowNumber = $_SESSION['windowsss'];
if (isset($_SESSION['id'])) {
    $loggedInUserId = $_SESSION['id'];

    //Fetch the window value for the currently logged-in user
    $userQuery = "SELECT * FROM user_table WHERE id = $loggedInUserId";
    $userResult = $conn->query($userQuery);

    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $office = $userRow['office'];
        $windowId = $userRow['windows'];
        $servedBy = $userRow['fullname'];

        $departmentIdQuery = "SELECT id FROM transaction_types WHERE department = '$office'";
        $departmentIdResult = $conn->query($departmentIdQuery);

        if ($departmentIdResult->num_rows > 0) {
            $departmentIdRow = $departmentIdResult->fetch_assoc();
            $departmentId = $departmentIdRow['id'];

            //Fetch the next queue for the specified window
            $sql = "SELECT * FROM transaction_table WHERE status = '1' AND transaction_department = '$departmentId' ORDER BY created_on ASC LIMIT 1";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $queue_id = $row['id'];

                //Update status in transaction_table with the window value
                $updateStatusQuery = "UPDATE transaction_table SET transaction_window = '$windowNumber', status = '2', served_by = '$servedBy', updated_on=NOW() WHERE id=$queue_id";

                $updateStatusResult = $conn->query($updateStatusQuery);

                if ($updateStatusResult) {
                    //Store queue ID in session variable
                    $_SESSION['nowServingQueueId'] = $queue_id;

                    //Display queue ID
                    echo $queue_id;
                } else {
                    echo "Error updating status in transaction_table";
                }
            } else {
                echo "-";
            }
        } else {
            echo "Error: Office not found for the logged-in user";
        }
    } else {
        echo " ";
    }
} else {
    echo "User ID not found in session";
}

$conn->close();



// session_start();
// if (isset($_SESSION['id'])) {
//     $loggedInUserId = $_SESSION['id'];

//     // Fetch the window value for the currently logged-in user
//     $userQuery = "SELECT * FROM user_table WHERE id = $loggedInUserId";
//     $userResult = $conn->query($userQuery);

//     echo $loggedInUserId;

//     if ($userResult->num_rows > 0) {
//         $userRow = $userResult->fetch_assoc();
//         // $offize = $userRow['office'];
//         // $windowId = $userRow['windows'];
//         $office = $userRow ['office'];
//         $windowId = $userRow['windows'];
//         $servedBy = $userRow['fullname'];

//         echo  $userRow ['office'];

//         $departmentIdQuery = "SELECT id FROM transaction_types WHERE department = '$office'";
//         $departmentIdResult = $conn->query($departmentIdQuery);

//         if ($departmentIdResult->num_rows > 0) {
//             $departmentIdRow = $departmentIdResult->fetch_assoc();
//             // $departmentId = $departmentIdRow['id'];
//             $departmentId = '3';

//             echo  $departmentId;

//             // Fetch the next queue for the specified window
//             $sql = "SELECT * FROM transaction_table WHERE status = '1' AND transaction_department = '$departmentId' ORDER BY created_on ASC LIMIT 1";
//             $result = $conn->query($sql);

//             if ($result->num_rows > 0) {
//                 $row = $result->fetch_assoc();
//                 $queue_id = $row['id'];

//                 echo $queue_id;

//                 // Update status in transaction_table with the window value
//                 $updateStatusQuery = "UPDATE transaction_table SET transaction_window = '$windowId', status='2', served_by = '$servedBy', updated_on=NOW() WHERE id=$queue_id";

//                 $updateStatusResult = $conn->query($updateStatusQuery);

//                 if ($updateStatusResult) {
//                     // Store queue ID in session variable
//                     $_SESSION['nowServingQueueId'] = $queue_id;

//                     // Display queue ID
//                     echo $queue_id;
//                 } else {
//                     echo "Error updating status in transaction_table";
//                 }
//             } else {
//                 echo "No queues found for the specified window";
//             }
//         } else {
//             echo "Error: Office not found for the logged-in user";
//         }
//     } else {
//         echo "No Pending Queue For this Depatment";
//     }
// } else {
//     echo "User ID not found in session";
// }

// $conn->close();
// ?>
