<!DOCTYPE html>
<html>
<head>
    <title>Pure PHP POST Test</title>
</head>
<body>
    <h1>Pure PHP POST Test (No CodeIgniter)</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>POST Data Received:</h2>";
    echo "<pre>";
    echo "=== RAW \$_POST ===\n";
    var_dump($_POST);
    echo "\n\n";

    echo "=== RAW \$_SERVER ===\n";
    echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
    echo "CONTENT_TYPE: " . ($_SERVER['CONTENT_TYPE'] ?? 'NOT SET') . "\n";
    echo "CONTENT_LENGTH: " . ($_SERVER['CONTENT_LENGTH'] ?? 'NOT SET') . "\n";
    echo "\n";

    echo "=== php://input ===\n";
    echo file_get_contents('php://input');
    echo "\n\n";

    echo "=== PHP Configuration ===\n";
    echo "post_max_size: " . ini_get('post_max_size') . "\n";
    echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
    echo "max_input_vars: " . ini_get('max_input_vars') . "\n";
    echo "max_input_time: " . ini_get('max_input_time') . "\n";
    echo "</pre>";

    if (empty($_POST)) {
        echo "<h3 style='color: red;'>❌ POST DATA IS EMPTY!</h3>";
        echo "<p>This is a server/PHP configuration issue, NOT a CodeIgniter issue.</p>";
    } else {
        echo "<h3 style='color: green;'>✅ POST DATA RECEIVED!</h3>";
    }

    echo "<hr>";
}
?>

    <h2>Test Form</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label><br>
        <input type="text" name="username" value="TestUser" style="padding: 5px; font-size: 14px;"><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="TestPass123" style="padding: 5px; font-size: 14px;"><br><br>

        <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer;">
            Submit Pure PHP Form
        </button>
    </form>

    <hr>
    <h3>Current Server Info:</h3>
    <pre>
    PHP Version: <?php echo phpversion(); ?>

    Server Software: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?>

    Document Root: <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?>

    Script Filename: <?php echo $_SERVER['SCRIPT_FILENAME'] ?? 'Unknown'; ?>

    Request Method: <?php echo $_SERVER['REQUEST_METHOD']; ?>

    Query String: <?php echo $_SERVER['QUERY_STRING'] ?? 'Empty'; ?>
    </pre>

</body>
</html>
