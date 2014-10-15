<?
$arUrlRewrite = array(
    array(
        "CONDITION" => "#/press-center/media-corporation/(20[0-9]{2})(/?)#",
        "RULE" => "YEAR=\$1",
        "ID" => "",
        "PATH" => "/press-center/media-corporation/index.php",
    ),
    array(
        "CONDITION" => "#/press-center/media-corporation/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/press-center/media-corporation/element.php",
    ),
    array(
        "CONDITION" => "#/press-center/press-releases/(20[0-9]{2})(/?)#",
        "RULE" => "YEAR=\$1",
        "ID" => "",
        "PATH" => "/press-center/press-releases/index.php",
    ),
    array(
        "CONDITION" => "#/press-center/press-releases/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/press-center/press-releases/element.php",
    ),
    array(
        "CONDITION" => "#/press-center/corporate-media/(20[0-9]{2})(/?)#",
        "RULE" => "YEAR=\$1",
        "ID" => "",
        "PATH" => "/press-center/corporate-media/index.php",
    ),
    array(
        "CONDITION" => "#/about/first-person/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/about/first-person/index.php",
    ),
    array(
        "CONDITION" => "#/press-center/news/(20[0-9]{2})(/?)#",
        "RULE" => "YEAR=\$1",
        "ID" => "",
        "PATH" => "/press-center/news/index.php",
    ),
    array(
        "CONDITION" => "#/press-center/news/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/press-center/news/element.php",
    ),

    array(
        "CONDITION" => "#/enterprises/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/enterprises/element.php",
    ),
    array(
        "CONDITION" => "#/products/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/products/element.php",
    ),
    array(
        "CONDITION" => "#/purchases/purchases-usc/([a-zA-Z0-9_-]+)(/?)#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "",
        "PATH" => "/purchases/purchases-usc/element.php",
    ),
);

?>