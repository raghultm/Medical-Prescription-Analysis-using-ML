<?php
session_start(); // Start the session

// Function to sanitize user input
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

// Handling form submission
if (isset($_POST['submit'])) {
    // Sanitize and retrieve form data
    $patient_id = sanitize($_POST['patient_id']);
    $patient_name = sanitize($_POST['patient_name']);
    $hospital_name = sanitize($_POST['hospital_name']);
    $prescription_img = sanitize($_POST['prescription_img']);
    $date = sanitize($_POST['date']);
   // sample1.png
    // $file_path = "c:/final/project/" + imagepath;

    // Connect to the database
    $conn = connectToDatabase();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO patient (patient_id, patient_name, hospital_name, date, prescription_img) VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("issss", $patient_id, $patient_name, $hospital_name, $date, $prescription_img);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        $_SESSION['success_message'] = "Prescription recorded successfully";
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
 // Adjust the Python script path
$python_script = "C:\\Users\\DELL\\AppData\\Local\\Programs\\Python\\Python38\\python.exe C:\\xampp\\htdocs\\final\\final_project.py";

// Escape arguments properly
$escaped_patient_id = escapeshellarg($patient_id);
$escaped_prescription_img = escapeshellarg($prescription_img);

// Execute the Python script
exec("$python_script $escaped_patient_id $escaped_prescription_img", $python_output, $return_status);

// Check return status and handle errors if necessary
if ($return_status !== 0) {
    // Handle error, maybe log it or set an error message in session
}
  
    // Redirect to the insert page to prevent form resubmission
    header("Location: insert.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .success-message {
            background-color: #dff0d8; /* Greenish background color */
            color: #3c763d; /* Dark green text color */
            padding: 10px; /* Padding around the message */
            border: 1px solid #d6e9c6; /* Light green border */
            margin-bottom: 10px; /* Space between messages */
        }
    </style>
</head>
<body>
<?php include 'navbar.html'; ?>
    <?php
    // Display success or error message if set
    if (isset($_SESSION['success_message'])) {
        echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']); // Clear the session variable
    } elseif (isset($_SESSION['error_message'])) {
        echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']); // Clear the session variable
    }
    ?>
</body>
</html>
