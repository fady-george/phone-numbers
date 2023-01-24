<?php
include("./Helpers/DatabaseConnection.php");
include("./Helpers/consoleLog.php");



class PhoneNumber
{

    public function fetchPhoneNumbers($path)
    {
        $db = (new DatabaseConnection())->makeConnection($path);
        $query = $db->query("SELECT * from customer;");
        $index = 0;
        while ($row = $query->fetchArray()) {
            $phones[$index++] = $row['phone'];
        }
        $db->close();
        debug_to_console("Operation done successfully\n");
        return $phones;
    }
}
