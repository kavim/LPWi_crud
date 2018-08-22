 <?php

function autoload($class) {
if (file_exists( "../classes/$class.php")) {
include_once "../classes/$class.php";
}else {
include_once "classes/$class.php";
}

}

spl_autoload_register("autoload");


