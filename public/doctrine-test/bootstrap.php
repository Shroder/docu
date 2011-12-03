<?php
set_include_path(get_include_path() . PATH_SEPARATOR . "../classes");
require_once("classes/Doctrine_Node.php");
require_once "Entities/Article.php";
require_once "Entities/Bid.php";
require_once "Entities/Agency.php";
require_once "Entities/Jurisdiction.php";
require_once "Entities/State.php";

if (!class_exists("Doctrine\Common\Version", false)) {
    require_once "bootstrap_doctrine.php";
}