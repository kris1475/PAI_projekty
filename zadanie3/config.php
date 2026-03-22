<?php

require_once __DIR__ . '/lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('app');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');
