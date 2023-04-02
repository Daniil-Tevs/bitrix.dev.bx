<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Task details");

$APPLICATION->IncludeComponent('up:task.details', '', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");