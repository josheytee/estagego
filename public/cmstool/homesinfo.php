<?php

// Global variable for table object
$homes = NULL;

//
// Table class for homes
//
class chomes extends cTable {
	var $id;
	var $page_title;
	var $h1;
	var $h2_orange;
	var $h2;
	var $caption;
	var $caption2;
	var $appstore_url;
	var $googleplay_url;
	var $video_url;
	var $total_users;
	var $total_downloads;
	var $total_household;
	var $total_cities;
	var $total_countries;
	var $metatags;
	var $keywords;
	var $description;
	var $created_at;
	var $updated_at;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'homes';
		$this->TableName = 'homes';
		$this->TableType = 'TABLE';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = ew_AllowAddDeleteRow(); // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new cBasicSearch($this->TableVar);

		// id
		$this->id = new cField('homes', 'homes', 'x_id', 'id', '`id`', '`id`', 19, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// page_title
		$this->page_title = new cField('homes', 'homes', 'x_page_title', 'page_title', '`page_title`', '`page_title`', 200, -1, FALSE, '`page_title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['page_title'] = &$this->page_title;

		// h1
		$this->h1 = new cField('homes', 'homes', 'x_h1', 'h1', '`h1`', '`h1`', 200, -1, FALSE, '`h1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['h1'] = &$this->h1;

		// h2_orange
		$this->h2_orange = new cField('homes', 'homes', 'x_h2_orange', 'h2_orange', '`h2_orange`', '`h2_orange`', 200, -1, FALSE, '`h2_orange`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['h2_orange'] = &$this->h2_orange;

		// h2
		$this->h2 = new cField('homes', 'homes', 'x_h2', 'h2', '`h2`', '`h2`', 200, -1, FALSE, '`h2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['h2'] = &$this->h2;

		// caption
		$this->caption = new cField('homes', 'homes', 'x_caption', 'caption', '`caption`', '`caption`', 200, -1, FALSE, '`caption`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['caption'] = &$this->caption;

		// caption2
		$this->caption2 = new cField('homes', 'homes', 'x_caption2', 'caption2', '`caption2`', '`caption2`', 200, -1, FALSE, '`caption2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['caption2'] = &$this->caption2;

		// appstore_url
		$this->appstore_url = new cField('homes', 'homes', 'x_appstore_url', 'appstore_url', '`appstore_url`', '`appstore_url`', 200, -1, FALSE, '`appstore_url`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['appstore_url'] = &$this->appstore_url;

		// googleplay_url
		$this->googleplay_url = new cField('homes', 'homes', 'x_googleplay_url', 'googleplay_url', '`googleplay_url`', '`googleplay_url`', 200, -1, FALSE, '`googleplay_url`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['googleplay_url'] = &$this->googleplay_url;

		// video_url
		$this->video_url = new cField('homes', 'homes', 'x_video_url', 'video_url', '`video_url`', '`video_url`', 200, -1, FALSE, '`video_url`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['video_url'] = &$this->video_url;

		// total_users
		$this->total_users = new cField('homes', 'homes', 'x_total_users', 'total_users', '`total_users`', '`total_users`', 3, -1, FALSE, '`total_users`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->total_users->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['total_users'] = &$this->total_users;

		// total_downloads
		$this->total_downloads = new cField('homes', 'homes', 'x_total_downloads', 'total_downloads', '`total_downloads`', '`total_downloads`', 3, -1, FALSE, '`total_downloads`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->total_downloads->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['total_downloads'] = &$this->total_downloads;

		// total_household
		$this->total_household = new cField('homes', 'homes', 'x_total_household', 'total_household', '`total_household`', '`total_household`', 3, -1, FALSE, '`total_household`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->total_household->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['total_household'] = &$this->total_household;

		// total_cities
		$this->total_cities = new cField('homes', 'homes', 'x_total_cities', 'total_cities', '`total_cities`', '`total_cities`', 3, -1, FALSE, '`total_cities`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->total_cities->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['total_cities'] = &$this->total_cities;

		// total_countries
		$this->total_countries = new cField('homes', 'homes', 'x_total_countries', 'total_countries', '`total_countries`', '`total_countries`', 3, -1, FALSE, '`total_countries`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->total_countries->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['total_countries'] = &$this->total_countries;

		// metatags
		$this->metatags = new cField('homes', 'homes', 'x_metatags', 'metatags', '`metatags`', '`metatags`', 200, -1, FALSE, '`metatags`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['metatags'] = &$this->metatags;

		// keywords
		$this->keywords = new cField('homes', 'homes', 'x_keywords', 'keywords', '`keywords`', '`keywords`', 200, -1, FALSE, '`keywords`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['keywords'] = &$this->keywords;

		// description
		$this->description = new cField('homes', 'homes', 'x_description', 'description', '`description`', '`description`', 201, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['description'] = &$this->description;

		// created_at
		$this->created_at = new cField('homes', 'homes', 'x_created_at', 'created_at', '`created_at`', 'DATE_FORMAT(`created_at`, \'%Y/%m/%d\')', 135, 5, FALSE, '`created_at`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->created_at->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['created_at'] = &$this->created_at;

		// updated_at
		$this->updated_at = new cField('homes', 'homes', 'x_updated_at', 'updated_at', '`updated_at`', 'DATE_FORMAT(`updated_at`, \'%Y/%m/%d\')', 135, 5, FALSE, '`updated_at`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->updated_at->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['updated_at'] = &$this->updated_at;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`homes`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = "";
		ew_AddFilter($sWhere, $this->TableFilter);
		return $sWhere;
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (@$this->PageID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Check if User ID security allows view all
	function UserIDAllow($id = "") {
		$allow = EW_USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		ew_AddFilter($sFilter, $this->CurrentFilter);
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(), $this->SqlGroupBy(),
			$this->SqlHaving(), $this->SqlOrderBy(), $sFilter, $sSort);
	}

	// Get ORDER BY clause
	function GetOrderBy() {
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql("", "", "", "", $this->SqlOrderBy(), "", $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		global $conn;
		$cnt = -1;
		if ($this->TableType == 'TABLE' || $this->TableType == 'VIEW') {
			$sSql = "SELECT COUNT(*) FROM" . substr($sSql, 13);
			$sOrderBy = $this->GetOrderBy();
			if (substr($sSql, strlen($sOrderBy) * -1) == $sOrderBy)
				$sSql = substr($sSql, 0, strlen($sSql) - strlen($sOrderBy)); // Remove ORDER BY clause
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") EW_COUNT_TABLE";
		}
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);

		//$sSql = $this->SQL();
		$sSql = $this->GetSQL($this->CurrentFilter, "");
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		global $conn;
		$origFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $conn->Execute($sSql)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Update Table
	var $UpdateTable = "`homes`";

	// INSERT statement
	function InsertSQL(&$rs) {
		global $conn;
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]))
				continue;
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		while (substr($names, -1) == ",")
			$names = substr($names, 0, -1);
		while (substr($values, -1) == ",")
			$values = substr($values, 0, -1);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	function Insert(&$rs) {
		global $conn;
		return $conn->Execute($this->InsertSQL($rs));
	}

	// UPDATE statement
	function UpdateSQL(&$rs, $where = "") {
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]))
				continue;
			$sql .= $this->fields[$name]->FldExpression . "=";
			$sql .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		while (substr($sql, -1) == ",")
			$sql = substr($sql, 0, -1);
		$filter = $this->CurrentFilter;
		ew_AddFilter($filter, $where);
		if ($filter <> "")	$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	function Update(&$rs, $where = "", $rsold = NULL) {
		global $conn;
		return $conn->Execute($this->UpdateSQL($rs, $where));
	}

	// DELETE statement
	function DeleteSQL(&$rs, $where = "") {
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if ($rs) {
		}
		$filter = $this->CurrentFilter;
		ew_AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	function Delete(&$rs, $where = "") {
		global $conn;
		return $conn->Execute($this->DeleteSQL($rs, $where));
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "homeslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function GetListUrl() {
		return "homeslist.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			return $this->KeyUrl("homesview.php", $this->UrlParm($parm));
		else
			return $this->KeyUrl("homesview.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
	}

	// Add URL
	function GetAddUrl() {
		return "homesadd.php";
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		return $this->KeyUrl("homesedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		return $this->KeyUrl("homesadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("homesdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		global $EW_COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = ew_StripSlashes($_POST["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = ew_StripSlashes($_GET["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET)) {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		foreach ($arKeys as $key) {
			$ar[] = $key;
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		//$this->CurrentFilter = $sFilter;
		//$sSql = $this->SQL();

		$sSql = $this->GetSQL($sFilter, "");
		$rs = $conn->Execute($sSql);
		return $rs;
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->id->setDbValue($rs->fields('id'));
		$this->page_title->setDbValue($rs->fields('page_title'));
		$this->h1->setDbValue($rs->fields('h1'));
		$this->h2_orange->setDbValue($rs->fields('h2_orange'));
		$this->h2->setDbValue($rs->fields('h2'));
		$this->caption->setDbValue($rs->fields('caption'));
		$this->caption2->setDbValue($rs->fields('caption2'));
		$this->appstore_url->setDbValue($rs->fields('appstore_url'));
		$this->googleplay_url->setDbValue($rs->fields('googleplay_url'));
		$this->video_url->setDbValue($rs->fields('video_url'));
		$this->total_users->setDbValue($rs->fields('total_users'));
		$this->total_downloads->setDbValue($rs->fields('total_downloads'));
		$this->total_household->setDbValue($rs->fields('total_household'));
		$this->total_cities->setDbValue($rs->fields('total_cities'));
		$this->total_countries->setDbValue($rs->fields('total_countries'));
		$this->metatags->setDbValue($rs->fields('metatags'));
		$this->keywords->setDbValue($rs->fields('keywords'));
		$this->description->setDbValue($rs->fields('description'));
		$this->created_at->setDbValue($rs->fields('created_at'));
		$this->updated_at->setDbValue($rs->fields('updated_at'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// id
		// page_title
		// h1
		// h2_orange
		// h2
		// caption
		// caption2
		// appstore_url
		// googleplay_url
		// video_url
		// total_users
		// total_downloads
		// total_household
		// total_cities
		// total_countries
		// metatags
		// keywords
		// description
		// created_at
		// updated_at
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// page_title
		$this->page_title->ViewValue = $this->page_title->CurrentValue;
		$this->page_title->ViewCustomAttributes = "";

		// h1
		$this->h1->ViewValue = $this->h1->CurrentValue;
		$this->h1->ViewCustomAttributes = "";

		// h2_orange
		$this->h2_orange->ViewValue = $this->h2_orange->CurrentValue;
		$this->h2_orange->ViewCustomAttributes = "";

		// h2
		$this->h2->ViewValue = $this->h2->CurrentValue;
		$this->h2->ViewCustomAttributes = "";

		// caption
		$this->caption->ViewValue = $this->caption->CurrentValue;
		$this->caption->ViewCustomAttributes = "";

		// caption2
		$this->caption2->ViewValue = $this->caption2->CurrentValue;
		$this->caption2->ViewCustomAttributes = "";

		// appstore_url
		$this->appstore_url->ViewValue = $this->appstore_url->CurrentValue;
		$this->appstore_url->ViewCustomAttributes = "";

		// googleplay_url
		$this->googleplay_url->ViewValue = $this->googleplay_url->CurrentValue;
		$this->googleplay_url->ViewCustomAttributes = "";

		// video_url
		$this->video_url->ViewValue = $this->video_url->CurrentValue;
		$this->video_url->ViewCustomAttributes = "";

		// total_users
		$this->total_users->ViewValue = $this->total_users->CurrentValue;
		$this->total_users->ViewCustomAttributes = "";

		// total_downloads
		$this->total_downloads->ViewValue = $this->total_downloads->CurrentValue;
		$this->total_downloads->ViewCustomAttributes = "";

		// total_household
		$this->total_household->ViewValue = $this->total_household->CurrentValue;
		$this->total_household->ViewCustomAttributes = "";

		// total_cities
		$this->total_cities->ViewValue = $this->total_cities->CurrentValue;
		$this->total_cities->ViewCustomAttributes = "";

		// total_countries
		$this->total_countries->ViewValue = $this->total_countries->CurrentValue;
		$this->total_countries->ViewCustomAttributes = "";

		// metatags
		$this->metatags->ViewValue = $this->metatags->CurrentValue;
		$this->metatags->ViewCustomAttributes = "";

		// keywords
		$this->keywords->ViewValue = $this->keywords->CurrentValue;
		$this->keywords->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// created_at
		$this->created_at->ViewValue = $this->created_at->CurrentValue;
		$this->created_at->ViewValue = ew_FormatDateTime($this->created_at->ViewValue, 5);
		$this->created_at->ViewCustomAttributes = "";

		// updated_at
		$this->updated_at->ViewValue = $this->updated_at->CurrentValue;
		$this->updated_at->ViewValue = ew_FormatDateTime($this->updated_at->ViewValue, 5);
		$this->updated_at->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// page_title
		$this->page_title->LinkCustomAttributes = "";
		$this->page_title->HrefValue = "";
		$this->page_title->TooltipValue = "";

		// h1
		$this->h1->LinkCustomAttributes = "";
		$this->h1->HrefValue = "";
		$this->h1->TooltipValue = "";

		// h2_orange
		$this->h2_orange->LinkCustomAttributes = "";
		$this->h2_orange->HrefValue = "";
		$this->h2_orange->TooltipValue = "";

		// h2
		$this->h2->LinkCustomAttributes = "";
		$this->h2->HrefValue = "";
		$this->h2->TooltipValue = "";

		// caption
		$this->caption->LinkCustomAttributes = "";
		$this->caption->HrefValue = "";
		$this->caption->TooltipValue = "";

		// caption2
		$this->caption2->LinkCustomAttributes = "";
		$this->caption2->HrefValue = "";
		$this->caption2->TooltipValue = "";

		// appstore_url
		$this->appstore_url->LinkCustomAttributes = "";
		$this->appstore_url->HrefValue = "";
		$this->appstore_url->TooltipValue = "";

		// googleplay_url
		$this->googleplay_url->LinkCustomAttributes = "";
		$this->googleplay_url->HrefValue = "";
		$this->googleplay_url->TooltipValue = "";

		// video_url
		$this->video_url->LinkCustomAttributes = "";
		$this->video_url->HrefValue = "";
		$this->video_url->TooltipValue = "";

		// total_users
		$this->total_users->LinkCustomAttributes = "";
		$this->total_users->HrefValue = "";
		$this->total_users->TooltipValue = "";

		// total_downloads
		$this->total_downloads->LinkCustomAttributes = "";
		$this->total_downloads->HrefValue = "";
		$this->total_downloads->TooltipValue = "";

		// total_household
		$this->total_household->LinkCustomAttributes = "";
		$this->total_household->HrefValue = "";
		$this->total_household->TooltipValue = "";

		// total_cities
		$this->total_cities->LinkCustomAttributes = "";
		$this->total_cities->HrefValue = "";
		$this->total_cities->TooltipValue = "";

		// total_countries
		$this->total_countries->LinkCustomAttributes = "";
		$this->total_countries->HrefValue = "";
		$this->total_countries->TooltipValue = "";

		// metatags
		$this->metatags->LinkCustomAttributes = "";
		$this->metatags->HrefValue = "";
		$this->metatags->TooltipValue = "";

		// keywords
		$this->keywords->LinkCustomAttributes = "";
		$this->keywords->HrefValue = "";
		$this->keywords->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

		// created_at
		$this->created_at->LinkCustomAttributes = "";
		$this->created_at->HrefValue = "";
		$this->created_at->TooltipValue = "";

		// updated_at
		$this->updated_at->LinkCustomAttributes = "";
		$this->updated_at->HrefValue = "";
		$this->updated_at->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	function ExportDocument(&$Doc, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$Doc)
			return;

		// Write header
		$Doc->ExportTableHeader();
		if ($Doc->Horizontal) { // Horizontal format, write header
			$Doc->BeginExportRow();
			if ($ExportPageType == "view") {
				if ($this->id->Exportable) $Doc->ExportCaption($this->id);
				if ($this->page_title->Exportable) $Doc->ExportCaption($this->page_title);
				if ($this->h1->Exportable) $Doc->ExportCaption($this->h1);
				if ($this->h2_orange->Exportable) $Doc->ExportCaption($this->h2_orange);
				if ($this->h2->Exportable) $Doc->ExportCaption($this->h2);
				if ($this->caption->Exportable) $Doc->ExportCaption($this->caption);
				if ($this->caption2->Exportable) $Doc->ExportCaption($this->caption2);
				if ($this->appstore_url->Exportable) $Doc->ExportCaption($this->appstore_url);
				if ($this->googleplay_url->Exportable) $Doc->ExportCaption($this->googleplay_url);
				if ($this->video_url->Exportable) $Doc->ExportCaption($this->video_url);
				if ($this->total_users->Exportable) $Doc->ExportCaption($this->total_users);
				if ($this->total_downloads->Exportable) $Doc->ExportCaption($this->total_downloads);
				if ($this->total_household->Exportable) $Doc->ExportCaption($this->total_household);
				if ($this->total_cities->Exportable) $Doc->ExportCaption($this->total_cities);
				if ($this->total_countries->Exportable) $Doc->ExportCaption($this->total_countries);
				if ($this->metatags->Exportable) $Doc->ExportCaption($this->metatags);
				if ($this->keywords->Exportable) $Doc->ExportCaption($this->keywords);
				if ($this->description->Exportable) $Doc->ExportCaption($this->description);
				if ($this->created_at->Exportable) $Doc->ExportCaption($this->created_at);
				if ($this->updated_at->Exportable) $Doc->ExportCaption($this->updated_at);
			} else {
				if ($this->id->Exportable) $Doc->ExportCaption($this->id);
				if ($this->page_title->Exportable) $Doc->ExportCaption($this->page_title);
				if ($this->h1->Exportable) $Doc->ExportCaption($this->h1);
				if ($this->h2_orange->Exportable) $Doc->ExportCaption($this->h2_orange);
				if ($this->h2->Exportable) $Doc->ExportCaption($this->h2);
				if ($this->caption->Exportable) $Doc->ExportCaption($this->caption);
				if ($this->caption2->Exportable) $Doc->ExportCaption($this->caption2);
				if ($this->appstore_url->Exportable) $Doc->ExportCaption($this->appstore_url);
				if ($this->googleplay_url->Exportable) $Doc->ExportCaption($this->googleplay_url);
				if ($this->video_url->Exportable) $Doc->ExportCaption($this->video_url);
				if ($this->total_users->Exportable) $Doc->ExportCaption($this->total_users);
				if ($this->total_downloads->Exportable) $Doc->ExportCaption($this->total_downloads);
				if ($this->total_household->Exportable) $Doc->ExportCaption($this->total_household);
				if ($this->total_cities->Exportable) $Doc->ExportCaption($this->total_cities);
				if ($this->total_countries->Exportable) $Doc->ExportCaption($this->total_countries);
				if ($this->metatags->Exportable) $Doc->ExportCaption($this->metatags);
				if ($this->keywords->Exportable) $Doc->ExportCaption($this->keywords);
				if ($this->created_at->Exportable) $Doc->ExportCaption($this->created_at);
				if ($this->updated_at->Exportable) $Doc->ExportCaption($this->updated_at);
			}
			$Doc->EndExportRow();
		}

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($RowCnt > 1 && ($RowCnt - 1) % $this->ExportPageBreakCount == 0)
						$Doc->ExportPageBreak();
				}
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				$Doc->BeginExportRow($RowCnt); // Allow CSS styles if enabled
				if ($ExportPageType == "view") {
					if ($this->id->Exportable) $Doc->ExportField($this->id);
					if ($this->page_title->Exportable) $Doc->ExportField($this->page_title);
					if ($this->h1->Exportable) $Doc->ExportField($this->h1);
					if ($this->h2_orange->Exportable) $Doc->ExportField($this->h2_orange);
					if ($this->h2->Exportable) $Doc->ExportField($this->h2);
					if ($this->caption->Exportable) $Doc->ExportField($this->caption);
					if ($this->caption2->Exportable) $Doc->ExportField($this->caption2);
					if ($this->appstore_url->Exportable) $Doc->ExportField($this->appstore_url);
					if ($this->googleplay_url->Exportable) $Doc->ExportField($this->googleplay_url);
					if ($this->video_url->Exportable) $Doc->ExportField($this->video_url);
					if ($this->total_users->Exportable) $Doc->ExportField($this->total_users);
					if ($this->total_downloads->Exportable) $Doc->ExportField($this->total_downloads);
					if ($this->total_household->Exportable) $Doc->ExportField($this->total_household);
					if ($this->total_cities->Exportable) $Doc->ExportField($this->total_cities);
					if ($this->total_countries->Exportable) $Doc->ExportField($this->total_countries);
					if ($this->metatags->Exportable) $Doc->ExportField($this->metatags);
					if ($this->keywords->Exportable) $Doc->ExportField($this->keywords);
					if ($this->description->Exportable) $Doc->ExportField($this->description);
					if ($this->created_at->Exportable) $Doc->ExportField($this->created_at);
					if ($this->updated_at->Exportable) $Doc->ExportField($this->updated_at);
				} else {
					if ($this->id->Exportable) $Doc->ExportField($this->id);
					if ($this->page_title->Exportable) $Doc->ExportField($this->page_title);
					if ($this->h1->Exportable) $Doc->ExportField($this->h1);
					if ($this->h2_orange->Exportable) $Doc->ExportField($this->h2_orange);
					if ($this->h2->Exportable) $Doc->ExportField($this->h2);
					if ($this->caption->Exportable) $Doc->ExportField($this->caption);
					if ($this->caption2->Exportable) $Doc->ExportField($this->caption2);
					if ($this->appstore_url->Exportable) $Doc->ExportField($this->appstore_url);
					if ($this->googleplay_url->Exportable) $Doc->ExportField($this->googleplay_url);
					if ($this->video_url->Exportable) $Doc->ExportField($this->video_url);
					if ($this->total_users->Exportable) $Doc->ExportField($this->total_users);
					if ($this->total_downloads->Exportable) $Doc->ExportField($this->total_downloads);
					if ($this->total_household->Exportable) $Doc->ExportField($this->total_household);
					if ($this->total_cities->Exportable) $Doc->ExportField($this->total_cities);
					if ($this->total_countries->Exportable) $Doc->ExportField($this->total_countries);
					if ($this->metatags->Exportable) $Doc->ExportField($this->metatags);
					if ($this->keywords->Exportable) $Doc->ExportField($this->keywords);
					if ($this->created_at->Exportable) $Doc->ExportField($this->created_at);
					if ($this->updated_at->Exportable) $Doc->ExportField($this->updated_at);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
