<?php

define("RUNNER", __FILE__);

require "bootstrap.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "poster.php";
}

require "viewer.php";
