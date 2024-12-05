<?php
// Include the header at the beginning of the page
include 'header.php';

// Variables and Arrays
$name = "Maryum";
$age = 20;
$hobbies = array("Scorlig", "Working", "Singing");

// Conditional Statements
if ($age >= 18) {
    echo "<p>You are an adult.</p>";
} else {
    echo "<p>You are a minor.</p>";
}

// Loops: Using a for loop to iterate over the $hobbies array
echo "<h2>My Hobbie</h2>";
for ($i = 0; $i <count($hobbies); $i++) {
    echo "<p>" . $hobbies[$i] . "</p>";
}

// Associative Array and Foreach Loop
$personalInfo = array("name" => $name,  "age" => $age, "hobbies" => $hobbies,);
echo "<h2>Personal Information</h2>";
foreach ($personalInfo as $key => $value) {
    if (is_array($value)) {
        echo "<p>$key: " . implode(", ", $value) . "</p>";
    } else {
        echo "<p>$key: $value</p>";
    }
}

// Functions
function displayInfo($name, $age)
{
    echo "<h2>Display Information</h2>";
    echo "<p>Name: $name, Age: $age</p>";
}
// Call the displayInfo function with your name and age
displayInfo($name, $age);

// Switch Statement
$day = "Wednesday";
echo "<h2>Days of the Week</h2>";

switch ($day) {
    case "Monday";
        echo "Start of the work week!";
        break;
    case "Tuesday";
        echo "Keep going, it's Tuesday!";
        break;
    case "Wednesday";
        echo "Halfway through the week!";
        break;
    case "Thursday";
        echo "Almost there, it's Thursday!";
        break;
    case "Friday";
        echo "Last work day of the week!";
        break;
    case "Saturday";
        echo "Enjoy your weekend!";
        break;
    case "Sunday";
        echo "Relax and recharge for the week ahead!";
        break;
    default:
        echo "Invalid Day!";
        break;
}

// Require the footer at the end of the page
require 'footer.php';
