<?php
// Define the file name
$filename = 'allen.txt';

// Check if the file exists
if (file_exists($filename)) {
    // Read the contents of the file
    $contents = file_get_contents($filename);
    echo "File contents:\n" . $contents . "\n";
} else {
    echo "File does not exist. Creating the file...\n";
    // Create the file and write some initial content
    $initialContent = "Hello i'm Allen \n this is Group 2\nThis is a sample file.";
    file_put_contents($filename, $initialContent);
    echo "File created and initial content written.\n";
}

// Append new content to the file
$newContent = "\nAdding a new line to the file.";
file_put_contents($filename, $newContent, FILE_APPEND);

// Read the file into an array, each line as an element
$fileArray = file($filename);
echo "File contents as an array:\n";
print_r($fileArray);
?>