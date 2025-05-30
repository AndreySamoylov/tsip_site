<?php

namespace helpers;

use Bitrix\Main\Loader;

class IblockHelper
{
    public static function deleteElements($iblockId): void
    {
        Loader::includeModule("iblock");

        $arSelect = Array("ID", "NAME");
        $arFilter = Array(
            "IBLOCK_ID" => $iblockId,
            "ACTIVE_DATE"=>"Y",
            "ACTIVE"=>"Y"
        );
        $result = \CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($element = $result->Fetch())
        {
            \CIBlockElement::Delete($element['ID']);
        }
    }
}
