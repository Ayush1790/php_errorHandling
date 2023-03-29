<!-- task 1 -->
<h1>Task 1 : die()</h1>
<?php
if (!file_exists("test.txt")) {
    // comment out this function to check the working of this function
    // die("file not found");
}
?>
<hr>
<!-- task 2 -->
<h1>Task 2 set_error_handler()</h1>
<?php
function customError($errno, $errstr, $errfile, $errline)
{
    switch ($errno) {
        case E_USER_ERROR:
            echo "Error:[$errno]$errstr<br>";
            echo "Ending";
            break;
        case E_USER_WARNING:
            echo "Warning:[$errno]$errstr<br>";
            break;
        case E_USER_NOTICE:
            echo "Notice:[$errno]$errstr<br>";
            break;
        default:
            echo $errstr . " " . $errfile . " in " . $errline;
    }
    error_log('[' . date("F j, Y, g:i a e O") . ']' . " " . $errstr . "\n", 3, "./error.log"); //set the error in log
}

set_error_handler("customError");
$value = 1;
echo "value=" . $value . "<br>";
if ($value > 0) {
    trigger_error("Value Should be less then 1");
}
?>
<hr>
<!-- task 3 -->
<h1>Task 3 trigger_error()</h1>
<form action="#" method="GET">
    <input type="text" name="input">
</form>
<?php
if (isset($_GET['input']) && !is_numeric($_GET['input'])) {
    trigger_error("Please Enter Only numbers", E_USER_ERROR);
} elseif (isset($_GET['input']) && is_numeric($_GET['input'])) {
    echo "Success";
}
?>
<hr>
<!-- task 4 -->
<h1>Task 4 E_USER_WARNING</h1>
<form action="#" method="GET">
    <input type="number" name="input">
</form>
<?php
if (isset($_GET['input'])) {
    if ($_GET['input'] > 1) {
        trigger_error("Number should be less than or equal to 1", E_USER_WARNING);
    }
}
?>
<hr>
<!-- task 5 -->
<h1>Task 5 E_USER_NOTICE and E_USER_ERROR</h1>
<?php
if (file_exists("test.txt")) {
    trigger_error("File Exist", E_USER_NOTICE);
} else {
    trigger_error("File Not Exist", E_USER_ERROR);
}
?>
<hr>
<!-- task 6 -->
<h1>Task 6 Custom Error</h1>
<a href="Home">Home</a>
<a href="Menu">Menu</a>
<hr>
<!-- task 7 -->
<h1>Task 7 log file</h1>
<p>log is set in <a href="error.log">error.log</a> file </p>
<hr>
<!-- task 8 -->
<h1>Task 8 Files</h1>
<?php
echo ($test);
//custom error handle is define in line no 13
?>
<hr>
<!-- task 9 -->
<h1>Task 9 error_get_last()</h1>
<a href="err_get_last.php">click me </a>to show error_get_last();
<hr>
<!-- task 10 -->
<h1>Task 10 Database logs</h1>
<form action="#" method="GET">
    <input type="text" placeholder="Enter Database Name" name="dbname">
    <input type="submit" value="submit">
</form>
<?php
if (isset($_GET['dbname'])) {
    $host = "mysql-server";
    $uname = "root";
    $pwd = "secret";
    $db = $_GET['dbname'];
    $conn = mysqli_connect($host, $uname, $pwd, $db);
    if (!$conn) {
        trigger_error("Database Not Found", E_USER_ERROR);
    }
}
?>