<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Закупки");
$APPLICATION->SetPageProperty("title", "Закупки ОСК");
$APPLICATION->SetPageProperty("keywords", "Закупки ОСК");
$APPLICATION->SetPageProperty("description", "Закупки ОСК");
$_ENV['NEXT_ELEMENT'] = array(
    'DETAIL_PAGE_URL' => '/press-center/',
    'NAME' => 'Пресс-центр',
);
?>

<?/*
** Сторонний виджет закупок:
*/?>

<style>
.fabrikant-block {}
.fabrikant-block .f-widget-root a:hover {color: #dd0103 !important;}
.fabrikant-block .f-widget-root a:visited {color: #5e32ae !important;}
.fabrikant-block .f-widget-root .f-list table thead tr th {color: #5b758c !important; font-style: italic;}
.fabrikant-block .f-widget-root .f-list table thead tr th + th {font-size: 10px!important; color: #000000!important; font-style: normal !important;}

.fabrikant-block .f-widget-root .f-list table tbody tr td {color: #5b758c !important; font-style: italic;}
.fabrikant-block .f-widget-root .f-list table tbody tr td + td {color: #000000!important; font-style: normal !important;}

.fabrikant-block .f-widget-root .f-list table tbody tr:hover {background: #f1f6fa !important;}
.fabrikant-block .f-widget-root .f-list table thead {border-bottom: #9dacba 1px solid!important;}
.fabrikant-block .f-widget-root .f-list table {border: none !important;}
.fabrikant-block .f-widget-root .f-list table thead tr th {border: none !important;}
.fabrikant-block .f-widget-root .f-list table tbody tr td {border: none !important;}
</style>
<script>
    $( document ).ready(function() {
        $('.section_button').on('click', function(){
            if(!$(this).hasClass('selected')){
                $('.section').hide();
                $('.section_'+$(this).attr('section')).show();
                $('.section_button').parent('div').removeClass('selected');
                $(this).parent('div').addClass('selected');
            }
        });
    });
</script>

    <div class="block clear">
        <div class="als-switcher">
            <div class="list_search_block">
                <div class="sub_filter filter_month">
                    <div class="item switcher_item for_jn_view <? if(empty($_REQUEST['status'])): ?>selected<? endif; ?>"><span class="pseudo section_button" section="aoa">ОАО “ОСК”</span></div>
                    <div class="item switcher_item for_jn_view <? if(!empty($_REQUEST['status'])): ?>selected<? endif; ?>"><span class="pseudo section_button" section="group">Общества Группы ОАО “ОСК”</span></div>
                </div>
            </div>
        </div>
    </div>

<div class="block second section section_aoa" <? if(!empty($_REQUEST['status'])): ?>style="display: none;"<? endif; ?>>
	<div class="fabrikant-block">
		<script type="text/javascript" charset="utf-8" id="fabrikant_widget" src="https://ws.fabrikant.ru/soap/tradelist/pub/v2/widget.php?key=a71d4fe7f8705cf4fbfd52ba56461ed9"></script>
	</div>
</div>
<div class="block second section section_group" <? if(empty($_REQUEST['status'])): ?>style="display: none;"<? endif; ?>>
        <?php

        class Fabrikant_SimpleTradeList
        {
            const URL = 'http://osk:osksoap@ws.fabrikant.ru/soap/tradelist/pub/tradelist.php';

            const LOGIN = 'osk';

            const PASSWORD = 'osksoap';

            const UID = '9329b25c7adb0a196a2f66d9a802f9ca';

            //Количество записей на странице
            const PER_PAGE = 10;

            const STATUS_ACTUAL = 'actual';

            const STATUS_ARCHIVE = 'archive';

            const METHOD_GET_LIST = 'GetTradeList';

            const METHOD_GET_TRADE = 'GetTrade';

            private $page;

            private $status;

            private $tradeId;

            private $method;

            private $perPage;

            private $requestParams;

            public function __construct()
            {
                $this->parseRequestUri();

                $this->page = $this->getInt('page', 1);
                if ($this->page < 1)
                {
                    $this->page = 1;
                }

                $this->tradeId = $this->getFromRequest('trade', '');
                $tradeIdText = $this->getFromRequest('trade', '');

                $this->status = $this->getFromRequest('status', self::STATUS_ACTUAL);
                if ($this->status != self::STATUS_ARCHIVE)
                {
                    $this->status = self::STATUS_ACTUAL;
                }

                $this->perPage = $this->getInt('perpage', self::PER_PAGE);

                if ($tradeIdText != '')
                {
                    $this->method = self::METHOD_GET_TRADE;
                }
                else
                {
                    $this->method = self::METHOD_GET_LIST;
                }

            }

            public function run()
            {
                $params = array(
                    'uid' => self::UID,
                    'page' => $this->page,
                    'perpage' => $this->perPage,
                    'status' => $this->status,
                    'method' => $this->method
                );
                if ($this->tradeId)
                {
                    $params['trade'] = $this->tradeId;
                }

                $urlParts = array();
                foreach($params as $k => $v)
                {
                    $urlParts[] = "$k=".urlencode($v);
                }
                $url = self::URL."?".implode('&', $urlParts);
                echo iconv("CP1251", "UTF-8", file_get_contents($url));
            }

            private function getFromRequest($key, $default)
            {
                if (array_key_exists($key, $this->requestParams))
                {
                    return $this->requestParams[$key];
                }
                return $default;
            }

            private function getInt($key, $default = 0)
            {
                return intval($this->getFromRequest($key, $default));
            }

            private function parseRequestUri()
            {
                $requestUri = $_SERVER['REQUEST_URI'];
                $parts = parse_url($requestUri);
                $this->requestParams = array();
                if (array_key_exists('query', $parts) && $parts['query'])
                {
                    $queryItems = explode('&', $parts['query']);
                    foreach($queryItems as $item)
                    {
                        $a = explode('=', $item, 2);
                        $key = $a[0];
                        $value = count($a) > 1 ? $a[1] : '';
                        $this->requestParams[$key] = $value;
                    }
                }
            }
        }

        function fabrikant_tradelist_error($errno, $errstr, $errfile, $errline, $errcontext)
        {
            $errorMsg = "OSK ERROR:\n"
                .$errno.": $errstr\n"
                ."in $errfile at line $errline\n\n";
            mailError($errorMsg);
            return false;
        }

        function fabrikant_tradelist_exception(Exception $exp)
        {
            $expmessage = 'Исключение '.get_class($exp)
                .'. Текст исключения:'.$exp->getMessage()
                .'. <br>Backtrace:<br><pre>'.$exp->getTraceAsString().'</pre>';
            mailError($expmessage);
            return false;
        }

        function mailError($errMsg)
        {
            mail('safronova@fabrikant.ru', 'OSK error', $errMsg);
        }

        $controller = new Fabrikant_SimpleTradeList();
        $controller->run();
        ?>

    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>