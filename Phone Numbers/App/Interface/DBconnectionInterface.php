<?php
interface DBconnectionInterface{ // if we need to change the DB from sqlite3
    public function makeConnection($path = '');
}