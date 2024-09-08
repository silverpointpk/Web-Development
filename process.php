<?php
//Task1: Display Current Date and time based on selected time zone
if (isset($_POST['timezone'])) {
    $timezone = $_POST['timezone'];
    date_default_timezone_set($timezone);

    $current_dateTime = date("Y-m-d H:i:s");
    $long_formate_Date = date("l,F,j,Y");
    $time_am_pm = date("h:i A");

    echo "<h2>Current Date & Time</h2>";

    echo "<p>Y-m-d H:i:s: $current_dateTime</p>";

    echo "<p>Long Formate:$long_formate_Date</p>";

    echo "<p>$time_am_pm</P>";

    echo "<a href='Assignment3.php'>Go Back</a>";

    exit();
}
//Task2:Form Handling-Validate and Process form Data
if (isset($_POST['submit.form'])) {
    $Full_Name = $_POST['$Full_Name'];
    $Email = $_POST['Email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $errors = [];

    if (empty($Full_Name)) {
        $errors[] = "Full Name is required.";
    }
    if (!($Email)) {
        $errors[] = "Invalid Email address";
    }
    if (empty($dob)) {
        $errors[] = "Invalid Date of Birth.";
    }

    if (isset($_FILES['Profile_picture'])) {
        $file = $_FILES['Profile_picture'];
        $file_size = $file['size'];
        $file_name = basename($file['name']);
        $allowed_file_type = ['image/jpeg', 'image/png'];
        $max_file_size = 2 * 1024 * 1024; //2MB

        if ($file_size > $max_file_size) {
            $errors[] = "Profile picture must not exceed 2MB";
        }
    }
if (empty($errors)){
$user_data = "Name: $Full_Name, Email: $email, DOB: $dob\n";
file_put_contents('users.txt', $user_data);

//Display user information and Uploaded file
echo"<h2>Registration Successful</h2>";
echo"<p>Full Name: $Full_Name</p>";
echo"<p>Email:$email</p>";
echo"<p>Date of Birth: $dob</p>";
echo"<p>Gender: $gender</p>";
echo "<p>Profile Picture: <img src='$upload_path' alt='Profile Picture' width='150'></p>";
        echo "<a href='Assignment3.php'>Go Back</a>";
}
else{
    echo"<h2>Errors:</h2>";
    foreach ($errors as $errors){
        echo"<p>$error</p>";
    }
    echo"<a href='Assignment.php'>Go Back</a>";
}
}
?>