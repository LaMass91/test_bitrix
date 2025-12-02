<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if (empty($arResult)) {
    return "";
}

// Генерация JSON-LD для Schema.org
$breadcrumbList = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => []
];

$itemSize = count($arResult);
$htmlItems = [];

for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsbx($arResult[$index]["TITLE"]);
    $link = $arResult[$index]["LINK"];

    // Формируем JSON-LD элемент
    if ($link !== "" && $index !== $itemSize - 1) {
        $breadcrumbList['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $title,
            'item' => $link
        ];
    } else {
        $breadcrumbList['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $title
            // "item" не указываем для текущей страницы
        ];
    }

    // Формируем чистую HTML-разметку (без schema.org)
    $arrow = ($index > 0) ? '<i class="bx-breadcrumb-item-angle fa fa-angle-right"></i>' : '';

    if ($link !== "" && $index !== $itemSize - 1) {
        $htmlItems[] = $arrow . '
            <div class="bx-breadcrumb-item">
                <a class="bx-breadcrumb-item-link" href="' . $link . '" title="' . $title . '">
                    <span class="bx-breadcrumb-item-text">' . $title . '</span>
                </a>
            </div>';
    } else {
        $htmlItems[] = $arrow . '
            <div class="bx-breadcrumb-item">
                <span class="bx-breadcrumb-item-text">' . $title . '</span>
            </div>';
    }
}

// JSON-LD
$jsonLd = '<script type="application/ld+json">' . json_encode($breadcrumbList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';

// Собираем итоговую строку
$strReturn = '';

// Подключаем CSS, если нужно (оставляем как в оригинале)
$css = $APPLICATION->GetCSSArray();
if (!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css)) {
    $strReturn .= '<link href="' . CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css") . '" type="text/css" rel="stylesheet" />' . "\n";
}

$strReturn .= $jsonLd;
$strReturn .= '<div class="bx-breadcrumb">' . implode('', $htmlItems) . '</div>';

return $strReturn;