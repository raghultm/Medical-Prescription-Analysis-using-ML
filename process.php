<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Doctor Prescription Analysis</title>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='process_style.css'>
    <link rel='icon' href='logo.jpg' type='image/x-icon'>
    <style>
        body {
            background-image: url('health1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body>

<?php
// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);            
    $data = stripslashes($data);   
    $data = htmlspecialchars($data);
    return $data;
}

// Function to connect to the database
function connectToDatabase() {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "doctor"; 

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Handle form submission
if(isset($_POST['submit'])) {
    // Check if all details are entered
    if(empty($_POST['patient_id'])) {
        echo "<div class='error'><h2>Please enter patient ID.</h2></div>";
    } else {
        $conn = connectToDatabase();
        $patient_id = sanitize($_POST['patient_id']);

        // Fetch records based on patient_id
        $sql_select = "SELECT * FROM patient WHERE patient_id=$patient_id";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='container'>
                        <h2>Patient Information</h2>
                        <div class='patient-info'>
                            <div class='info-row'>
                                <span class='label'>Patient ID:</span><span class='value'>" . $row["patient_id"]. "</span>
                            </div>
                            <div class='info-row'>
                                <span class='label'>Patient Name:</span><span class='value'>" . $row["patient_name"]. "</span>
                            </div>
                            <div class='info-row'>
                                <span class='label'>Hospital Name:</span><span class='value'>" . $row["hospital_name"]. "</span>
                            </div>
                            <div class='info-row'>
                                <span class='label'>Date:</span><span class='value'>" . $row["date"]. "</span>
                            </div>
                            <div class='info-row'>
                                <span class='label'>Prescription:</span><span class='value'>" . $row["prescription"]. "</span>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo 
            " <div class='no-patient'><h2>No patients found.</h2></div>";
        }

        $conn->close();
    }
}
?>
<?php include 'navbar.html'; ?>
</body>
</html>
