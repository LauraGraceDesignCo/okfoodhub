<?php
require_once '../../core/includes.php';

$p = new Product;
$p->delete();

header("Location: /marketplace.php");
exit();
