<?php
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Loader;

Loader::IncludeModule('iblock');

$arResult = [];

/** @noinspection PhpDynamicAsStaticMethodCallInspection */
$arRes = \CIBlockRSS::GetNewsEx('lenta.ru', 80, '/rss/', '');
/** @noinspection PhpDynamicAsStaticMethodCallInspection */
$arRes = \CIBlockRSS::FormatArray($arRes);

if (count($arRes['item']) > 0):?>
    <?foreach ($arRes['item'] as $i => $item):?>
        <ul>
            <li><?=$item['title'];?></li>
            <li><?=$item['link'];?></li>
            <li><?=$item['description'];?></li>
        </ul>
        <?
        if ($i == 4) {
            break;
        }
        ?>
    <?endforeach;?>
<?endif;?>