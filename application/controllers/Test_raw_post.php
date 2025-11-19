<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_raw_post extends CI_Controller {

    public function index() {
        ?>
        <h2>Test Raw POST</h2>
        <p>Form sederhana untuk test apakah POST data sampai ke server</p>

        <form method="POST" action="<?php echo base_url('index.php/test_raw_post/receive'); ?>">
            <label>Test Username:</label><br>
            <input type="text" name="username" value="TestUser123" style="padding: 5px;">
            <br><br>

            <label>Test Password:</label><br>
            <input type="text" name="password" value="TestPass456" style="padding: 5px;">
            <br><br>

            <button type="submit" style="padding: 10px;">Submit Test</button>
        </form>

        <hr>
        <h3>Debug Info:</h3>
        <pre>
        Current URL: <?php echo current_url(); ?>

        Base URL: <?php echo base_url(); ?>

        Request Method: <?php echo $_SERVER['REQUEST_METHOD']; ?>

        PHP Version: <?php echo phpversion(); ?>

        CodeIgniter Version: <?php echo CI_VERSION; ?>
        </pre>
        <?php
    }

    public function receive() {
        echo "<h2>POST Data Received</h2>";
        echo "<pre>";

        echo "=== RAW \$_POST ===\n";
        var_dump($_POST);
        echo "\n\n";

        echo "=== RAW \$_REQUEST ===\n";
        var_dump($_REQUEST);
        echo "\n\n";

        echo "=== php://input ===\n";
        echo file_get_contents('php://input');
        echo "\n\n";

        echo "=== CI input->post() ===\n";
        echo "username: " . var_export($this->input->post('username'), true) . "\n";
        echo "password: " . var_export($this->input->post('password'), true) . "\n";
        echo "\n";

        echo "=== CI input->post() with FALSE (no XSS) ===\n";
        echo "username: " . var_export($this->input->post('username', FALSE), true) . "\n";
        echo "password: " . var_export($this->input->post('password', FALSE), true) . "\n";
        echo "\n";

        echo "=== All CI POST ===\n";
        var_dump($this->input->post());
        echo "\n";

        echo "</pre>";

        echo "<br><a href='" . base_url('index.php/test_raw_post') . "'>Back to Form</a>";
    }
}
