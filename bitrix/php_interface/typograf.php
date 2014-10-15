<?
AddEventHandler('fileman', 'OnBeforeHTMLEditorScriptsGet', array('SALTypograf', 'OnBeforeHTMLEditorScriptsGet'));

class SALTypograf
{
	public static function Format($data, $charset = 'UTF-8', $entityType = 4, $useBr = 0, $useP = 0, $maxNobr = 3, $quotA = 'laquo raquo', $quotB = 'bdquo ldquo')
	{
		if (!CModule::IncludeModule('webservice')) {
			return false;
		}
		if (ToUpper($charset) != 'UTF-8') {
			$data = $GLOBALS['APPLICATION']->ConvertCharset($data, $charset, 'UTF-8');
		}

		$request = new CSOAPRequest("ProcessText", "http://typograf.artlebedev.ru/webservices/");

		$request->addParameter("text", htmlspecialchars($data));
		$request->addParameter("entityType", $entityType);
		$request->addParameter("useBr", $useBr);
		$request->addParameter("useP", $useP);
		$request->addParameter("maxNobr", $maxNobr);
		$request->addParameter("quotA", $quotA);
		$request->addParameter("quotB", $quotB);

		$client = new CSOAPClient('typograf.artlebedev.ru', '/webservices/typograf.asmx');
		$response = $client->send($request);

		return $response->Value['ProcessTextResult'];
	}

	function OnBeforeHTMLEditorScriptsGet($editorName, $arEditorParams)
	{
		return Array(
			"JS" => Array('sal_typograf.js')
		);
	}
}