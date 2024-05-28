<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Doctor Prescription Analysis</title>
   <link rel="stylesheet" href="style.css">
   <script src="scan.js"> </script><!-- Link to your JavaScript file -->
   <link rel="icon" href="logo.jpg" type="image/x-icon">
</head>
<body>
<?php include 'navbar.html'; ?>
<style>
      body {
         background-image: url('doctorimg2.jpg');
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center;
      }
   </style>
    <div class="container">
        <h2>Upload the Patient Details</h2> 
        <form method="POST" action="insert.php">
            <!-- Patient ID input field -->
            Patient Id: <br><input type="text"  name="patient_id" placeholder="Patient Id" required><br>
            <!-- Patient Name input field -->
            Patient Name: <br><input type="text"   name="patient_name" placeholder="Patient Name" required><br>
              <!-- Hospital Name input field -->
            Hospital Name: <br><input type="text" name="hospital_name" placeholder="Hospital Name" required><br>

            Prescription Image: <br><input type="file" name="prescription_img" placeholder="prescription Image" required><br>

            <!-- Date input field (readonly, value auto-populated with current date) -->
            Date: <input type="date" name="date" required><br>
            <!-- Submit button for submitting the form -->
            <button type="submit" name="submit">Submit Prescription</button>
        </form> <!-- Closing form tag -->
    </div>

    <!-- Video element for camera feed -->
    <video id="videoElement" autoplay></video>

    <!-- Container for camera scanning and prescription analysis -->
    <div class="container">
        <h2>Scan the Prescription</h2>
        <!-- Button to start camera -->
        <button onclick="startCamera()">Scan</button>
        <!-- Button to capture image -->
        <button onclick="captureImage()">Capture</button>
        <!-- Image element to display the captured image -->
        <img id="capturedImage" style="display: none;">
        <!-- Anchor tag to download the captured image -->
        <a id="downloadLink" download="image.png" style="display: none;">Download Captured Image</a>
    </div>
</body>
</html>