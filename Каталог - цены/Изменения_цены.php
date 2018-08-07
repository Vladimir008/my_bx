<?
/*AddEventHandler("catalog", "OnGetOptimalPriceResult", "OnGetOptimalPriceResultCustom");
 function OnGetOptimalPriceResultCustom(&$result){
 
 $result['PRICE']['PRICE'] = 1000;
 $result['RESULT_PRICE']['DISCOUNT_PRICE'] = 1000;
 $result['RESULT_PRICE']['BASE_PRICE'] = 1000;
 $result['RESULT_PRICE']['UNROUND_BASE_PRICE'] = 1000;
 $result['RESULT_PRICE']['UNROUND_DISCOUNT_PRICE'] = 1000;
 }
 */
$eventManager = Bitrix\Main\EventManager::getInstance(&$result);
$eventManager->addEventHandler('catalog', 'OnGetOptimalPriceResult', function(&$result){
	$result['PRICE']['PRICE'] = 1000;
	$result['RESULT_PRICE']['DISCOUNT_PRICE'] = 1000;
	$result['RESULT_PRICE']['BASE_PRICE'] = 1000;
	$result['RESULT_PRICE']['UNROUND_BASE_PRICE'] = 1000;
	$result['RESULT_PRICE']['UNROUND_DISCOUNT_PRICE'] = 1000;
});
?>