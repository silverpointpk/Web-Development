<?php
// Constants for library open and close times
define("OPEN_TIME", "09:00 AM");
define("CLOSE_TIME", "05:00 AM");

// Variables for storing library information
$Libraryname = "Central PublicLibrary";
$Libraryaddress = "123 Main Street, Cityville";
$Librarybooks = 50000;

echo "Welcome to '$Libraryname' located at $Libraryaddress.<br>";
echo "We have a total of $Librarybooks books available.<br>";
echo "The library is open from " . OPEN_TIME . " to " . CLOSE_TIME . ".<br>";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == "add_book") { // Add Book Form was submitted
    $_title = $_POST['Title'];
    $_Author = $_POST['Author'];
    $_Genre = $_POST['Genre'];
    $_Year = $_POST['Year'];
    // Process the form data (e.g., save to database, display confirmation, etc.)
    echo "<h1>Book Added Successfully</h1>";
    echo "<p><strong>Title:</strong> $title</p>";
    echo "<p><strong>Author:</strong> $author</p>";
    echo "<p><strong>Genre:</strong> $genre</p>";
    echo "<p><strong>Publication Year:</strong> $year</p>";
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['form_type']) && $_GET['form_type'] == "search_books") {
    // Search Books Form was submitted
    $searchTitle = $_GET['searchTitle'];
    $searchAuthor = $_GET['searchAuthor'];

    // Process the form data (e.g., search in database, display results, etc.)
    echo "<h1>Search Result</h1>";
    if (!empty($searchTitle)) {
        echo "<p><strong>Title:</strong> $searchTitle</p>";
    }
    if (!empty($searchAuthor)) {
        echo "<p><strong>Author:</strong> $searchAuthor</p>";
    }
}
