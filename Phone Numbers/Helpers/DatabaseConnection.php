<?php
require("./App/Interface/DBconnectionInterface.php");

   class DatabaseConnection implements DBconnectionInterface{
      public function makeConnection($path = '')
      {
         $db = new SQLite3($path);
         if(!$db) {
            debug_to_console($db->lastErrorMsg());
         } else {
            debug_to_console("Opened database successfully\n");
         }
         return $db;
      }
   }
