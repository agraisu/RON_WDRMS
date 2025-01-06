<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 3000);
//require_once './main_funtions.php';

$dbhost = DB_HOST; //db host
$dbuser = DB_USER; //db user name
$dbpass = DB_PASS; //db password
$dbname = DB_NAME; //db to work with

/**
 * Get a database backup based on the initial selection query
 *
 */
class MySQLDump {

    var $tables = array();
    var $connected = false;
    var $output;
    var $droptableifexists = false;
    var $mysql_error;

    function connect($host, $user, $pass, $db) {
        $return = true;
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_set_charset($conn, "utf8");
        if (!$conn) {
            $this->mysql_error = mysql_error();
            $return = false;
        }
        $this->connected = $return;
        return $return;
    }

    function list_tables() {
        $return = true;
        if (!$this->connected) {
            $return = false;
        }
        $this->tables = array();
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = mysqli_query($conn, "SHOW TABLES");

        while ($row = mysqli_fetch_array($sql)) {
            array_push($this->tables, $row[0]);
        }
        return $return;
    }

    function list_values($tablename) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = mysqli_query($conn, "SELECT * FROM $tablename");
        $this->output .= "\n\n-- Dumping data for table: $tablename\n\n";
        while ($row = mysqli_fetch_array($sql)) {
            $broj_polja = count($row) / 2;
            $this->output .= "INSERT INTO `$tablename` VALUES(";
            $buffer = '';
            for ($i = 0; $i < $broj_polja; $i++) {
                $vrednost = $row[$i];
                // echo "<pre>$vrednost</pre>";
                if (!is_integer($vrednost)) {
                    $vrednost = "'" . mysqli_real_escape_string($conn, $vrednost) . "'";
                }
                $buffer .= $vrednost . ', ';
            }
            $buf = substr($buffer, 0, count($buffer) - 3);
            $this->output .= $buf . ");\n";
        }
    }

    function dump_table($tablename) {
        $this->output = "";
        $this->get_table_structure($tablename);
        $this->list_values($tablename);
    }

    function get_table_structure($tablename) {
        $this->output .= "\n\n-- Dumping structure for table: `{$tablename}`\n\n";
        if ($this->droptableifexists) {
            $this->output .= "DROP TABLE IF EXISTS `{$tablename}`;\n";
        }
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = mysqli_query($conn, "SHOW CREATE TABLE {$tablename}");
        if ($sql) {
            $row = mysqli_fetch_array($sql);
            $this->output .= $row[1];
            $this->output .= ";\n\n";
        } else {
            $this->output .= "-- Error in getting create of `{$tablename}`";
        }
    }

}
