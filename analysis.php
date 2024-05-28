<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Doctor Prescription Analysis</title>
   <link rel="stylesheet" href="style.css">
   <link rel='stylesheet' href='process_style.css'>
   <link rel="stylesheet" href="index.css">
   <link rel="icon" href="logo.jpg" type="image/x-icon">
   
</head>
<body>

<style>
      body {
         background-image: url('health1.jpg');
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center;
      }
</style>
<div class="container">
    <h2>Medical Prescription Analysis</h2>
    <form method="POST" action="process.php">
        Patient Id: <br><input type="text" id="patient_id" name="patient_id" placeholder="Patient Id"  ><br>
        Patient Name: <br><input type="text" id="patient_name" name="patient_name" placeholder="Patient Name"  ><br>
        Hospital Name : <br><input type="text" id="hospital_name" name="hospital_name" placeholder="Hospital Name" ><br>
        Date: <br><input type="date" name="date" ><br> 
        <button type="submit" name="submit">Search Details</button>
    </form>
    
    <div id="output">
        <!-- PHP code to display results will be included here -->
        <?php include 'process.php'; ?>
    </div>
</div>
</body>
</html>
