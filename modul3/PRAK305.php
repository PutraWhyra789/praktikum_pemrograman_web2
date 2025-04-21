<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            <input type="text" name="input" value="<?= $_POST['input'] ?? '' ?>" required>
            <input type="submit" value="Submit">
        </form>
        <?php
        if (isset($_POST['input'])) {
            $str = $_POST['input'];
            $len = strlen($str);
            $result = '';

            for ($i = 0; $i < $len; $i++) {
                $char = $str[$i];
                $result .= strtoupper($char) . str_repeat(strtolower($char), $len - 1);
            }
            echo "<h2>Input:</h2><p>$str</p>";
            echo "<h2>Output:</h2><p>$result</p>";
        }
        ?>
    </body>
</html>