<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_csrf_status extends CI_Controller {

    public function index() {
        echo "<h2>CSRF Configuration Status</h2>";
        echo "<pre>";

        // Check config
        echo "=== CONFIG VALUES ===\n";
        echo "csrf_protection: " . var_export($this->config->item('csrf_protection'), true) . "\n";
        echo "csrf_token_name: " . var_export($this->config->item('csrf_token_name'), true) . "\n";
        echo "csrf_cookie_name: " . var_export($this->config->item('csrf_cookie_name'), true) . "\n";
        echo "csrf_expire: " . var_export($this->config->item('csrf_expire'), true) . "\n";
        echo "csrf_regenerate: " . var_export($this->config->item('csrf_regenerate'), true) . "\n";
        echo "csrf_exclude_uris: " . var_export($this->config->item('csrf_exclude_uris'), true) . "\n";
        echo "\n";

        // Check if security library is filtering
        echo "=== SECURITY LIBRARY ===\n";
        echo "Security class loaded: " . (isset($this->security) ? 'YES' : 'NO') . "\n";

        if (method_exists($this->security, 'csrf_verify')) {
            echo "csrf_verify method exists: YES\n";
        } else {
            echo "csrf_verify method exists: NO\n";
        }
        echo "\n";

        // Test form POST
        echo "=== TEST FORM ===\n";
        echo "</pre>";

        ?>
        <form method="POST" action="<?php echo base_url('index.php/test_csrf_status/receive'); ?>">
            <label>Test Field:</label><br>
            <input type="text" name="test_field" value="TestValue123" style="padding: 5px;"><br><br>
            <button type="submit" style="padding: 10px;">Submit Without CSRF Token</button>
        </form>

        <p><strong>This form has NO CSRF token</strong>. If CSRF is truly disabled, it should work.</p>
        <?php
    }

    public function receive() {
        echo "<h2>POST Received</h2>";
        echo "<pre>";

        echo "=== RAW \$_POST ===\n";
        var_dump($_POST);
        echo "\n\n";

        echo "=== CI INPUT ===\n";
        echo "test_field: " . var_export($this->input->post('test_field'), true) . "\n";
        echo "\n";

        if (!empty($_POST)) {
            echo "✅ POST DATA RECEIVED!\n";
            echo "CSRF is truly disabled.\n";
        } else {
            echo "❌ POST DATA EMPTY!\n";
            echo "CSRF might still be enabled or something is blocking POST.\n";
        }

        echo "</pre>";
        echo "<br><a href='" . base_url('index.php/test_csrf_status') . "'>Back</a>";
    }
}
