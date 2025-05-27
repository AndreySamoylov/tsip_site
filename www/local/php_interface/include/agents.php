<?php

function ImportFilms()
{
    $dataBaseHelper = new \helpers\DatabaseHelper();
    $dataBaseHelper->connect();

    $el = new \CIBlockElement;

    foreach ($dataBaseHelper->getFilms() as $film) {
        $properties = array();
        $properties['RELEASE_DATE'] = $film['release_date'];
        $properties['DIRECTOR'] = $film['stage_director'];
        $properties['COUNTRY'] = $film['country'];
        $properties['BUDGET'] = $film['budget'];
        $properties['FEES'] = $film['fees'];
        $properties['GENRES'] = implode(', ', $film['GENRES']);
        $arLoadProductArray = Array(
            "NAME"           => $film['title'],
            "ACTIVE"         => "Y",            // активен
            "IBLOCK_SECTION_ID" => false,       // элемент лежит в корне раздела
            "IBLOCK_ID"      => FILMS_IBLOCK_ID,
            "PREVIEW_TEXT"   => $film['description'],
            "PROPERTY_VALUES"=> $properties,
        );

        if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            \CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => "FILMS_IMPORT",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => $PRODUCT_ID,
                "DESCRIPTION" => "Элемент успешно добавлен",
            ));
        } else {
            \CEventLog::Add(array(
                "SEVERITY" => "ERROR",
                "AUDIT_TYPE_ID" => "FILMS_IMPORT",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => $PRODUCT_ID,
                "DESCRIPTION" =>  "Error: ".$el->LAST_ERROR,
            ));
        }
    }

    \CEventLog::Add(array(
        "SEVERITY" => "INFO",
        "AUDIT_TYPE_ID" => "FILMS_IMPORT",
        "MODULE_ID" => "iblock",
        "DESCRIPTION" => "Импорт завершен",
    ));

    return "ImportFilms();";
}
