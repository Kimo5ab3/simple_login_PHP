<?php

//database data

class database {

    public $servername;
    public $admin;
    public $password;
    public $databasename;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->admin = 'root';
        $this->password = '';
        $this->databasename = 'users';
    }

}

?>