<?php
// Define constants for library open and close times
define("OPEN_TIME", "09:00");
define("CLOSE_TIME", "17:00");

// Variables for storing library information
$libraryName = "Central Public Library";
$libraryAddress = "123 Main Street, Cityville";
$totalBooks = 0;

// Array to store multiple books
$books = [];
?>
<?php
// Include library configuration
require 'Assignment.php';

// Function to check if the library is open
function isLibraryOpen() {
    $currentTime = date("H:i");
    return ($currentTime >= OPEN_TIME && $currentTime <= CLOSE_TIME);
}

// Example holiday check function
function isHoliday() {
    $holidays = ["2024-12-25", "2024-01-01"]; // Add more holiday dates as needed
    return in_array(date("Y-m-d"), $holidays);
}

// Function to add a book to the library
function addBook(&$books, &$totalBooks, $title, $author, $genre, $year) {
    $books[] = [
        'title' => $title,
        'author' => $author,
        'genre' => $genre,
        'year' => $year,
        'available' => true
    ];
    $totalBooks++;
}

// Function to search books by title or author
function searchBooks($books, $searchTitle, $searchAuthor) {
    $results = [];
    foreach ($books as $book) {
        if ((!empty($searchTitle) && stripos($book['title'], $searchTitle) !== false) ||
            (!empty($searchAuthor) && stripos($book['author'], $searchAuthor) !== false)) {
            $results[] = $book;
        }
    }
    return $results;
}

// Error messages array
$errors = [];

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type'])) {
    if ($_POST['form_type'] == "add_book") {
        // Validate input
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $genre = $_POST['genre'] ?? '';
        $year = $_POST['year'] ?? '';

        if (empty($title) || empty($author) || empty($genre) || empty($year)) {
            $errors[] = "All fields are required.";
        } else {
            addBook($books, $totalBooks, $title, $author, $genre, $year);
            echo "<h1>Book Added Successfully</h1>";
            echo "<p><strong>Title:</strong> $title</p>";
            echo "<p><strong>Author:</strong> $author</p>";
            echo "<p><strong>Genre:</strong> $genre</p>";
            echo "<p><strong>Publication Year:</strong> $year</p>";
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['form_type'])) {
    if ($_GET['form_type'] == "search_books") {
        $searchTitle = $_GET['searchTitle'] ?? '';
        $searchAuthor = $_GET['searchAuthor'] ?? '';
        $results = searchBooks($books, $searchTitle, $searchAuthor);

        echo "<h1>Search Results</h1>";
        if (!empty($results)) {
            foreach ($results as $book) {
                echo "<p><strong>Title:</strong> {$book['title']}</p>";
                echo "<p><strong>Author:</strong> {$book['author']}</p>";
                echo "<p><strong>Genre:</strong> {$book['genre']}</p>";
                echo "<p><strong>Publication Year:</strong> {$book['year']}</p>";
                echo "<hr>";
            }
        } else {
            echo "<p>No books found.</p>";
        }
    }
}

// Display errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}

// Display list of all books
echo "<h2>All Books in the Library</h2>";
foreach ($books as $book) {
    echo "<p><strong>Title:</strong> {$book['title']} <strong>Author:</strong> {$book['author']} <strong>Genre:</strong> {$book['genre']} <strong>Year:</strong> {$book['year']}</p>";
}
?>
