<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php 3rd Assignment</title>
</head>
<body>
    <!--Task 1: Display Date and Time-->
    <h2>Current Date and Time</h2>
    <form action="process.php" method="POST">
        <label for="timezone">Select Time Zone:</label>
        <select name="timezone" id="timezone" onchange="this.form.submit()">
            <?php
            $timezones = timezone_identifiers_list();
            foreach ($timezones as $zone) {
                echo "<option value=\"$zone\">$zone</option>";
            }
            ?>
        </select>
    </form>

    <!--Task2:Form Handling for User Information-->
    <h2>Form Handling for User Information</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        
        <label for="Full_Name">Full Name:</label><br>
        <input type="text" id="Full_Name" name="Full_Name" required><br><br>

        <label for="Email">Email</label><br>
        <input type="Email" id="Email" name="Email" required><br><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="gender">Gender</label><br>

        <input type="radio" id="Male" name="gender" value="Male" required>
        <label for="male">Male</label> <br>

        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">female</label><br><br>
        
        <label for="Profile picture">Profile picture</label><br>
        <input type="file" id="Profile picture" name="Profile picture" accept=".jpg, .png" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <!-- Task3: Display Content of users.txt-->
     <h2>Submitted User Data</h2>
     <div>
        <?php
        if (file_exists("user.txt"))
        {
           $content = file_get_contents("user.txt");
           echo nl2br($content);}
           else{
            echo "No user data found";
           }
        ?>
     </div>
</body>
</html>