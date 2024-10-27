<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg10.php" ?>
<?php include_once "ewmysql10.php" ?>
<?php include_once "phpfn10.php" ?>
<?php include_once "homesinfo.php" ?>
<?php include_once "usersinfo.php" ?>
<?php include_once "userfn10.php" ?>
<?php

//
// Page class
//

$homes_list = NULL; // Initialize page object first

class chomes_list extends chomes {

	// Page ID
	var $PageID = 'list';

	// Project ID
	var $ProjectID = "{B5C7A834-3426-4989-B956-81B68DFE8162}";

	// Table name
	var $TableName = 'homes';

	// Page object name
	var $PageObjName = 'homes_list';

	// Grid form hidden field names
	var $FormName = 'fhomeslist';
	var $FormActionName = 'k_action';
	var $FormKeyName = 'k_key';
	var $FormOldKeyName = 'k_oldkey';
	var $FormBlankRowName = 'k_blankrow';
	var $FormKeyCountName = 'key_count';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sMessage . "</div>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-error ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<table class=\"ewStdTable\"><tr><td><div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div></td></tr></table>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p>" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Footer exists, display
			echo "<p>" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm;
		if ($this->UseTokenInUrl) {
			if ($objForm)
				return ($this->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language, $UserAgent;

		// User agent
		$UserAgent = ew_UserAgent();
		$GLOBALS["Page"] = &$this;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (homes)
		if (!isset($GLOBALS["homes"])) {
			$GLOBALS["homes"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["homes"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "homesadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "homesdelete.php";
		$this->MultiUpdateUrl = "homesupdate.php";

		// Table object (users)
		if (!isset($GLOBALS['users'])) $GLOBALS['users'] = new cusers();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'homes', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();

		// List options
		$this->ListOptions = new cListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "span";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Other options
		$this->OtherOptions['addedit'] = new cListOptions();
		$this->OtherOptions['addedit']->Tag = "span";
		$this->OtherOptions['addedit']->TagClassName = "ewAddEditOption";
		$this->OtherOptions['detail'] = new cListOptions();
		$this->OtherOptions['detail']->Tag = "span";
		$this->OtherOptions['detail']->TagClassName = "ewDetailOption";
		$this->OtherOptions['action'] = new cListOptions();
		$this->OtherOptions['action']->Tag = "span";
		$this->OtherOptions['action']->TagClassName = "ewActionOption";
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up curent action

		// Get grid add count
		$gridaddcnt = @$_GET[EW_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Setup other options
		$this->SetupOtherOptions();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $OtherOptions = array(); // Other options
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $Pager;
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $StartRowCnt = 1;
	var $RowCnt = 0;
	var $Attrs = array(); // Row attributes and cell attributes
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;	
	var $MultiSelectKey;
	var $Command;
	var $RestoreSearch = FALSE;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";

		// Get command
		$this->Command = strtolower(@$_GET["cmd"]);
		if ($this->IsPageRequest()) { // Validate request

			// Process custom action first
			$this->ProcessCustomAction();

			// Handle reset command
			$this->ResetCmd();

			// Set up Breadcrumb
			$this->SetupBreadcrumb();

			// Hide list options
			if ($this->Export <> "") {
				$this->ListOptions->HideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->CurrentAction == "gridadd" || $this->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide export options
			if ($this->Export <> "" || $this->CurrentAction <> "")
				$this->ExportOptions->HideAllOptions();

			// Hide other options
			if ($this->Export <> "") {
				foreach ($this->OtherOptions as &$option)
					$option->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session if not searching / reset
			if ($this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall" && $this->CheckSearchParms())
				$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->CheckSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->LoadDefault();
			if ($this->BasicSearch->Keyword != "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Build search criteria
		ew_AddFilter($this->SearchWhere, $sSrchAdvanced);
		ew_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} else {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		ew_AddFilter($sFilter, $this->DbDetailFilter);
		ew_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$this->setSessionWhere($sFilter);
		$this->CurrentFilter = "";
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $this->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$objForm->Index = $rowindex;
			$sThisKey = strval($objForm->GetValue("k_key"));
		}
		return $sWrkFilter;
	}

	// Set up key values
	function SetupKeyValues($key) {
		$arrKeyFlds = explode($GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arrKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $this->page_title, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->h1, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->h2_orange, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->h2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->caption, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->caption2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->appstore_url, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->googleplay_url, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->video_url, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->metatags, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->keywords, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->description, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		if ($Keyword == EW_NULL_VALUE) {
			$sWrk = $Fld->FldExpression . " IS NULL";
		} elseif ($Keyword == EW_NOT_NULL_VALUE) {
			$sWrk = $Fld->FldExpression . " IS NOT NULL";
		} else {
			$sFldExpression = ($Fld->FldVirtualExpression <> $Fld->FldExpression) ? $Fld->FldVirtualExpression : $Fld->FldBasicSearchExpression;
			$sWrk = $sFldExpression . ew_Like(ew_QuotedValue("%" . $Keyword . "%", EW_DATATYPE_STRING));
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security;
		$sSearchStr = "";
		$sSearchKeyword = $this->BasicSearch->Keyword;
		$sSearchType = $this->BasicSearch->Type;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "=") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
			$this->Command = "search";
		}
		if ($this->Command == "search") {
			$this->BasicSearch->setKeyword($sSearchKeyword);
			$this->BasicSearch->setType($sSearchType);
		}
		return $sSearchStr;
	}

	// Check if search parm exists
	function CheckSearchParms() {

		// Check basic search
		if ($this->BasicSearch->IssetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Load advanced search default values
	function LoadAdvancedSearchDefault() {
		return FALSE;
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		$this->BasicSearch->UnsetSession();
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->Load();
	}

	// Set up sort parameters
	function SetUpSortOrder() {

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$this->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$this->CurrentOrderType = @$_GET["ordertype"];
			$this->UpdateSort($this->id); // id
			$this->UpdateSort($this->page_title); // page_title
			$this->UpdateSort($this->h1); // h1
			$this->UpdateSort($this->h2_orange); // h2_orange
			$this->UpdateSort($this->h2); // h2
			$this->UpdateSort($this->caption); // caption
			$this->UpdateSort($this->caption2); // caption2
			$this->UpdateSort($this->appstore_url); // appstore_url
			$this->UpdateSort($this->googleplay_url); // googleplay_url
			$this->UpdateSort($this->video_url); // video_url
			$this->UpdateSort($this->total_users); // total_users
			$this->UpdateSort($this->total_downloads); // total_downloads
			$this->UpdateSort($this->total_household); // total_household
			$this->UpdateSort($this->total_cities); // total_cities
			$this->UpdateSort($this->total_countries); // total_countries
			$this->UpdateSort($this->metatags); // metatags
			$this->UpdateSort($this->keywords); // keywords
			$this->UpdateSort($this->created_at); // created_at
			$this->UpdateSort($this->updated_at); // updated_at
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		$sOrderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($this->SqlOrderBy() <> "") {
				$sOrderBy = $this->SqlOrderBy();
				$this->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)
	function ResetCmd() {

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$sOrderBy = "";
				$this->setSessionOrderBy($sOrderBy);
				$this->id->setSort("");
				$this->page_title->setSort("");
				$this->h1->setSort("");
				$this->h2_orange->setSort("");
				$this->h2->setSort("");
				$this->caption->setSort("");
				$this->caption2->setSort("");
				$this->appstore_url->setSort("");
				$this->googleplay_url->setSort("");
				$this->video_url->setSort("");
				$this->total_users->setSort("");
				$this->total_downloads->setSort("");
				$this->total_household->setSort("");
				$this->total_cities->setSort("");
				$this->total_countries->setSort("");
				$this->metatags->setSort("");
				$this->keywords->setSort("");
				$this->created_at->setSort("");
				$this->updated_at->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->Add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->Add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<label class=\"checkbox\"><input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew_SelectAllKey(this);\"></label>";
		if (count($this->CustomActions) > 0) $item->Visible = TRUE;
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->Phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		$this->ListOptions->ButtonClass = "btn-small"; // Class for button group

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	function SetupOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;
			$option->ButtonClass = "btn-small"; // Class for button group
			$item = &$option->Add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->Phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->Phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->Phrase("ButtonActions");
	}

	// Render other options
	function RenderOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];
			foreach ($this->CustomActions as $action => $name) {

				// Add custom action
				$item = &$option->Add("custom_" . $action);
				$item->Body = "<a class=\"ewAction ewCustomAction\" href=\"\" onclick=\"ew_SubmitSelected(document.fhomeslist, '" . ew_CurrentUrl() . "', null, '" . $action . "');return false;\">" . $name . "</a>";
			}

			// Hide grid edit, multi-delete and multi-update
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->GetItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$item = &$option->GetItem("multidelete");
				if ($item) $item->Visible = FALSE;
				$item = &$option->GetItem("multiupdate");
				if ($item) $item->Visible = FALSE;
			}
	}

	// Process custom action
	function ProcessCustomAction() {
		global $conn, $Language, $Security;
		$sFilter = $this->GetKeyFilter();
		$UserAction = @$_POST["useraction"];
		if ($sFilter <> "" && $UserAction <> "") {
			$this->CurrentFilter = $sFilter;
			$sSql = $this->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rs = $conn->Execute($sSql);
			$conn->raiseErrorFn = '';
			$rsuser = ($rs) ? $rs->GetRows() : array();
			if ($rs)
				$rs->Close();

			// Call row custom action event
			if (count($rsuser) > 0) {
				$conn->BeginTrans();
				foreach ($rsuser as $row) {
					$Processed = $this->Row_CustomAction($UserAction, $row);
					if (!$Processed) break;
				}
				if ($Processed) {
					$conn->CommitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage(str_replace('%s', $UserAction, $Language->Phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->RollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $UserAction, $Language->Phrase("CustomActionCancelled")));
					}
				}
			}
		}
	}

	function RenderListOptionsExt() {
		global $Security, $Language;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[EW_TABLE_START_REC];
				$this->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		$this->BasicSearch->Keyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		if ($this->BasicSearch->Keyword <> "") $this->Command = "search";
		$this->BasicSearch->Type = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn;

		// Call Recordset Selecting event
		$this->Recordset_Selecting($this->CurrentFilter);

		// Load List page SQL
		$sSql = $this->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Language;
		$sFilter = $this->KeyFilter();

		// Call Row Selecting event
		$this->Row_Selecting($sFilter);

		// Load SQL based on filter
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row = &$rs->fields;
		$this->Row_Selected($row);
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

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->page_title->DbValue = $row['page_title'];
		$this->h1->DbValue = $row['h1'];
		$this->h2_orange->DbValue = $row['h2_orange'];
		$this->h2->DbValue = $row['h2'];
		$this->caption->DbValue = $row['caption'];
		$this->caption2->DbValue = $row['caption2'];
		$this->appstore_url->DbValue = $row['appstore_url'];
		$this->googleplay_url->DbValue = $row['googleplay_url'];
		$this->video_url->DbValue = $row['video_url'];
		$this->total_users->DbValue = $row['total_users'];
		$this->total_downloads->DbValue = $row['total_downloads'];
		$this->total_household->DbValue = $row['total_household'];
		$this->total_cities->DbValue = $row['total_cities'];
		$this->total_countries->DbValue = $row['total_countries'];
		$this->metatags->DbValue = $row['metatags'];
		$this->keywords->DbValue = $row['keywords'];
		$this->description->DbValue = $row['description'];
		$this->created_at->DbValue = $row['created_at'];
		$this->updated_at->DbValue = $row['updated_at'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$this->CurrentFilter = $this->KeyFilter();
			$sSql = $this->SQL();
			$this->OldRecordset = ew_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		} else {
			$this->OldRecordset = NULL;
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language;
		global $gsLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->GetViewUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->InlineEditUrl = $this->GetInlineEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->InlineCopyUrl = $this->GetInlineCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

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

			// created_at
			$this->created_at->LinkCustomAttributes = "";
			$this->created_at->HrefValue = "";
			$this->created_at->TooltipValue = "";

			// updated_at
			$this->updated_at->LinkCustomAttributes = "";
			$this->updated_at->HrefValue = "";
			$this->updated_at->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$PageCaption = $this->TableCaption();
		$url = ew_CurrentUrl();
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->Add("list", "<span id=\"ewPageCaption\">" . $PageCaption . "</span>", $url, $this->TableVar);
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($homes_list)) $homes_list = new chomes_list();

// Page init
$homes_list->Page_Init();

// Page main
$homes_list->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$homes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var homes_list = new ew_Page("homes_list");
homes_list.PageID = "list"; // Page ID
var EW_PAGE_ID = homes_list.PageID; // For backward compatibility

// Form object
var fhomeslist = new ew_Form("fhomeslist");
fhomeslist.FormKeyCountName = '<?php echo $homes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhomeslist.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fhomeslist.ValidateRequired = true;
<?php } else { ?>
fhomeslist.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

var fhomeslistsrch = new ew_Form("fhomeslistsrch");
</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $Breadcrumb->Render(); ?>
<?php if ($homes_list->ExportOptions->Visible()) { ?>
<div class="ewListExportOptions"><?php $homes_list->ExportOptions->Render("body") ?></div>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$homes_list->TotalRecs = $homes->SelectRecordCount();
	} else {
		if ($homes_list->Recordset = $homes_list->LoadRecordset())
			$homes_list->TotalRecs = $homes_list->Recordset->RecordCount();
	}
	$homes_list->StartRec = 1;
	if ($homes_list->DisplayRecs <= 0 || ($homes->Export <> "" && $homes->ExportAll)) // Display all records
		$homes_list->DisplayRecs = $homes_list->TotalRecs;
	if (!($homes->Export <> "" && $homes->ExportAll))
		$homes_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$homes_list->Recordset = $homes_list->LoadRecordset($homes_list->StartRec-1, $homes_list->DisplayRecs);
$homes_list->RenderOtherOptions();
?>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($homes->Export == "" && $homes->CurrentAction == "") { ?>
<form name="fhomeslistsrch" id="fhomeslistsrch" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>">
<table class="ewSearchTable"><tr><td>
<div class="accordion" id="fhomeslistsrch_SearchGroup">
	<div class="accordion-group">
		<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#fhomeslistsrch_SearchGroup" href="#fhomeslistsrch_SearchBody"><?php echo $Language->Phrase("Search") ?></a>
		</div>
		<div id="fhomeslistsrch_SearchBody" class="accordion-body collapse in">
			<div class="accordion-inner">
<div id="fhomeslistsrch_SearchPanel">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="homes">
<div class="ewBasicSearch">
<div id="xsr_1" class="ewRow">
	<div class="btn-group ewButtonGroup">
	<div class="input-append">
	<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" class="input-large" value="<?php echo ew_HtmlEncode($homes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo $Language->Phrase("Search") ?>">
	<button class="btn btn-primary ewButton" name="btnsubmit" id="btnsubmit" type="submit"><?php echo $Language->Phrase("QuickSearchBtn") ?></button>
	</div>
	</div>
	<div class="btn-group ewButtonGroup">
	<a class="btn ewShowAll" href="<?php echo $homes_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>
</div>
<div id="xsr_2" class="ewRow">
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="="<?php if ($homes_list->BasicSearch->getType() == "=") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($homes_list->BasicSearch->getType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($homes_list->BasicSearch->getType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</div>
			</div>
		</div>
	</div>
</div>
</td></tr></table>
</form>
<?php } ?>
<?php } ?>
<?php $homes_list->ShowPageHeader(); ?>
<?php
$homes_list->ShowMessage();
?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="fhomeslist" id="fhomeslist" class="ewForm form-horizontal" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="homes">
<div id="gmp_homes" class="ewGridMiddlePanel">
<?php if ($homes_list->TotalRecs > 0) { ?>
<table id="tbl_homeslist" class="ewTable ewTableSeparate">
<?php echo $homes->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$homes_list->RenderListOptions();

// Render list options (header, left)
$homes_list->ListOptions->Render("header", "left");
?>
<?php if ($homes->id->Visible) { // id ?>
	<?php if ($homes->SortUrl($homes->id) == "") { ?>
		<td><div id="elh_homes_id" class="homes_id"><div class="ewTableHeaderCaption"><?php echo $homes->id->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->id) ?>',1);"><div id="elh_homes_id" class="homes_id">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->id->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->id->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->id->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->page_title->Visible) { // page_title ?>
	<?php if ($homes->SortUrl($homes->page_title) == "") { ?>
		<td><div id="elh_homes_page_title" class="homes_page_title"><div class="ewTableHeaderCaption"><?php echo $homes->page_title->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->page_title) ?>',1);"><div id="elh_homes_page_title" class="homes_page_title">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->page_title->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->page_title->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->page_title->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->h1->Visible) { // h1 ?>
	<?php if ($homes->SortUrl($homes->h1) == "") { ?>
		<td><div id="elh_homes_h1" class="homes_h1"><div class="ewTableHeaderCaption"><?php echo $homes->h1->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->h1) ?>',1);"><div id="elh_homes_h1" class="homes_h1">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->h1->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->h1->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->h1->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->h2_orange->Visible) { // h2_orange ?>
	<?php if ($homes->SortUrl($homes->h2_orange) == "") { ?>
		<td><div id="elh_homes_h2_orange" class="homes_h2_orange"><div class="ewTableHeaderCaption"><?php echo $homes->h2_orange->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->h2_orange) ?>',1);"><div id="elh_homes_h2_orange" class="homes_h2_orange">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->h2_orange->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->h2_orange->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->h2_orange->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->h2->Visible) { // h2 ?>
	<?php if ($homes->SortUrl($homes->h2) == "") { ?>
		<td><div id="elh_homes_h2" class="homes_h2"><div class="ewTableHeaderCaption"><?php echo $homes->h2->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->h2) ?>',1);"><div id="elh_homes_h2" class="homes_h2">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->h2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->h2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->h2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->caption->Visible) { // caption ?>
	<?php if ($homes->SortUrl($homes->caption) == "") { ?>
		<td><div id="elh_homes_caption" class="homes_caption"><div class="ewTableHeaderCaption"><?php echo $homes->caption->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->caption) ?>',1);"><div id="elh_homes_caption" class="homes_caption">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->caption->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->caption->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->caption->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->caption2->Visible) { // caption2 ?>
	<?php if ($homes->SortUrl($homes->caption2) == "") { ?>
		<td><div id="elh_homes_caption2" class="homes_caption2"><div class="ewTableHeaderCaption"><?php echo $homes->caption2->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->caption2) ?>',1);"><div id="elh_homes_caption2" class="homes_caption2">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->caption2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->caption2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->caption2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->appstore_url->Visible) { // appstore_url ?>
	<?php if ($homes->SortUrl($homes->appstore_url) == "") { ?>
		<td><div id="elh_homes_appstore_url" class="homes_appstore_url"><div class="ewTableHeaderCaption"><?php echo $homes->appstore_url->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->appstore_url) ?>',1);"><div id="elh_homes_appstore_url" class="homes_appstore_url">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->appstore_url->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->appstore_url->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->appstore_url->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->googleplay_url->Visible) { // googleplay_url ?>
	<?php if ($homes->SortUrl($homes->googleplay_url) == "") { ?>
		<td><div id="elh_homes_googleplay_url" class="homes_googleplay_url"><div class="ewTableHeaderCaption"><?php echo $homes->googleplay_url->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->googleplay_url) ?>',1);"><div id="elh_homes_googleplay_url" class="homes_googleplay_url">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->googleplay_url->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->googleplay_url->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->googleplay_url->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->video_url->Visible) { // video_url ?>
	<?php if ($homes->SortUrl($homes->video_url) == "") { ?>
		<td><div id="elh_homes_video_url" class="homes_video_url"><div class="ewTableHeaderCaption"><?php echo $homes->video_url->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->video_url) ?>',1);"><div id="elh_homes_video_url" class="homes_video_url">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->video_url->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->video_url->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->video_url->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->total_users->Visible) { // total_users ?>
	<?php if ($homes->SortUrl($homes->total_users) == "") { ?>
		<td><div id="elh_homes_total_users" class="homes_total_users"><div class="ewTableHeaderCaption"><?php echo $homes->total_users->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->total_users) ?>',1);"><div id="elh_homes_total_users" class="homes_total_users">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->total_users->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->total_users->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->total_users->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->total_downloads->Visible) { // total_downloads ?>
	<?php if ($homes->SortUrl($homes->total_downloads) == "") { ?>
		<td><div id="elh_homes_total_downloads" class="homes_total_downloads"><div class="ewTableHeaderCaption"><?php echo $homes->total_downloads->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->total_downloads) ?>',1);"><div id="elh_homes_total_downloads" class="homes_total_downloads">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->total_downloads->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->total_downloads->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->total_downloads->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->total_household->Visible) { // total_household ?>
	<?php if ($homes->SortUrl($homes->total_household) == "") { ?>
		<td><div id="elh_homes_total_household" class="homes_total_household"><div class="ewTableHeaderCaption"><?php echo $homes->total_household->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->total_household) ?>',1);"><div id="elh_homes_total_household" class="homes_total_household">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->total_household->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->total_household->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->total_household->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->total_cities->Visible) { // total_cities ?>
	<?php if ($homes->SortUrl($homes->total_cities) == "") { ?>
		<td><div id="elh_homes_total_cities" class="homes_total_cities"><div class="ewTableHeaderCaption"><?php echo $homes->total_cities->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->total_cities) ?>',1);"><div id="elh_homes_total_cities" class="homes_total_cities">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->total_cities->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->total_cities->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->total_cities->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->total_countries->Visible) { // total_countries ?>
	<?php if ($homes->SortUrl($homes->total_countries) == "") { ?>
		<td><div id="elh_homes_total_countries" class="homes_total_countries"><div class="ewTableHeaderCaption"><?php echo $homes->total_countries->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->total_countries) ?>',1);"><div id="elh_homes_total_countries" class="homes_total_countries">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->total_countries->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->total_countries->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->total_countries->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->metatags->Visible) { // metatags ?>
	<?php if ($homes->SortUrl($homes->metatags) == "") { ?>
		<td><div id="elh_homes_metatags" class="homes_metatags"><div class="ewTableHeaderCaption"><?php echo $homes->metatags->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->metatags) ?>',1);"><div id="elh_homes_metatags" class="homes_metatags">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->metatags->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->metatags->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->metatags->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->keywords->Visible) { // keywords ?>
	<?php if ($homes->SortUrl($homes->keywords) == "") { ?>
		<td><div id="elh_homes_keywords" class="homes_keywords"><div class="ewTableHeaderCaption"><?php echo $homes->keywords->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->keywords) ?>',1);"><div id="elh_homes_keywords" class="homes_keywords">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->keywords->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($homes->keywords->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->keywords->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->created_at->Visible) { // created_at ?>
	<?php if ($homes->SortUrl($homes->created_at) == "") { ?>
		<td><div id="elh_homes_created_at" class="homes_created_at"><div class="ewTableHeaderCaption"><?php echo $homes->created_at->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->created_at) ?>',1);"><div id="elh_homes_created_at" class="homes_created_at">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->created_at->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->created_at->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->created_at->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($homes->updated_at->Visible) { // updated_at ?>
	<?php if ($homes->SortUrl($homes->updated_at) == "") { ?>
		<td><div id="elh_homes_updated_at" class="homes_updated_at"><div class="ewTableHeaderCaption"><?php echo $homes->updated_at->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $homes->SortUrl($homes->updated_at) ?>',1);"><div id="elh_homes_updated_at" class="homes_updated_at">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $homes->updated_at->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($homes->updated_at->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($homes->updated_at->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$homes_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($homes->ExportAll && $homes->Export <> "") {
	$homes_list->StopRec = $homes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($homes_list->TotalRecs > $homes_list->StartRec + $homes_list->DisplayRecs - 1)
		$homes_list->StopRec = $homes_list->StartRec + $homes_list->DisplayRecs - 1;
	else
		$homes_list->StopRec = $homes_list->TotalRecs;
}
$homes_list->RecCnt = $homes_list->StartRec - 1;
if ($homes_list->Recordset && !$homes_list->Recordset->EOF) {
	$homes_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $homes_list->StartRec > 1)
		$homes_list->Recordset->Move($homes_list->StartRec - 1);
} elseif (!$homes->AllowAddDeleteRow && $homes_list->StopRec == 0) {
	$homes_list->StopRec = $homes->GridAddRowCount;
}

// Initialize aggregate
$homes->RowType = EW_ROWTYPE_AGGREGATEINIT;
$homes->ResetAttrs();
$homes_list->RenderRow();
while ($homes_list->RecCnt < $homes_list->StopRec) {
	$homes_list->RecCnt++;
	if (intval($homes_list->RecCnt) >= intval($homes_list->StartRec)) {
		$homes_list->RowCnt++;

		// Set up key count
		$homes_list->KeyCount = $homes_list->RowIndex;

		// Init row class and style
		$homes->ResetAttrs();
		$homes->CssClass = "";
		if ($homes->CurrentAction == "gridadd") {
		} else {
			$homes_list->LoadRowValues($homes_list->Recordset); // Load row values
		}
		$homes->RowType = EW_ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$homes->RowAttrs = array_merge($homes->RowAttrs, array('data-rowindex'=>$homes_list->RowCnt, 'id'=>'r' . $homes_list->RowCnt . '_homes', 'data-rowtype'=>$homes->RowType));

		// Render row
		$homes_list->RenderRow();

		// Render list options
		$homes_list->RenderListOptions();
?>
	<tr<?php echo $homes->RowAttributes() ?>>
<?php

// Render list options (body, left)
$homes_list->ListOptions->Render("body", "left", $homes_list->RowCnt);
?>
	<?php if ($homes->id->Visible) { // id ?>
		<td<?php echo $homes->id->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_id" class="control-group homes_id">
<span<?php echo $homes->id->ViewAttributes() ?>>
<?php echo $homes->id->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->page_title->Visible) { // page_title ?>
		<td<?php echo $homes->page_title->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_page_title" class="control-group homes_page_title">
<span<?php echo $homes->page_title->ViewAttributes() ?>>
<?php echo $homes->page_title->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->h1->Visible) { // h1 ?>
		<td<?php echo $homes->h1->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_h1" class="control-group homes_h1">
<span<?php echo $homes->h1->ViewAttributes() ?>>
<?php echo $homes->h1->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->h2_orange->Visible) { // h2_orange ?>
		<td<?php echo $homes->h2_orange->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_h2_orange" class="control-group homes_h2_orange">
<span<?php echo $homes->h2_orange->ViewAttributes() ?>>
<?php echo $homes->h2_orange->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->h2->Visible) { // h2 ?>
		<td<?php echo $homes->h2->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_h2" class="control-group homes_h2">
<span<?php echo $homes->h2->ViewAttributes() ?>>
<?php echo $homes->h2->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->caption->Visible) { // caption ?>
		<td<?php echo $homes->caption->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_caption" class="control-group homes_caption">
<span<?php echo $homes->caption->ViewAttributes() ?>>
<?php echo $homes->caption->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->caption2->Visible) { // caption2 ?>
		<td<?php echo $homes->caption2->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_caption2" class="control-group homes_caption2">
<span<?php echo $homes->caption2->ViewAttributes() ?>>
<?php echo $homes->caption2->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->appstore_url->Visible) { // appstore_url ?>
		<td<?php echo $homes->appstore_url->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_appstore_url" class="control-group homes_appstore_url">
<span<?php echo $homes->appstore_url->ViewAttributes() ?>>
<?php echo $homes->appstore_url->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->googleplay_url->Visible) { // googleplay_url ?>
		<td<?php echo $homes->googleplay_url->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_googleplay_url" class="control-group homes_googleplay_url">
<span<?php echo $homes->googleplay_url->ViewAttributes() ?>>
<?php echo $homes->googleplay_url->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->video_url->Visible) { // video_url ?>
		<td<?php echo $homes->video_url->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_video_url" class="control-group homes_video_url">
<span<?php echo $homes->video_url->ViewAttributes() ?>>
<?php echo $homes->video_url->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->total_users->Visible) { // total_users ?>
		<td<?php echo $homes->total_users->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_total_users" class="control-group homes_total_users">
<span<?php echo $homes->total_users->ViewAttributes() ?>>
<?php echo $homes->total_users->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->total_downloads->Visible) { // total_downloads ?>
		<td<?php echo $homes->total_downloads->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_total_downloads" class="control-group homes_total_downloads">
<span<?php echo $homes->total_downloads->ViewAttributes() ?>>
<?php echo $homes->total_downloads->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->total_household->Visible) { // total_household ?>
		<td<?php echo $homes->total_household->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_total_household" class="control-group homes_total_household">
<span<?php echo $homes->total_household->ViewAttributes() ?>>
<?php echo $homes->total_household->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->total_cities->Visible) { // total_cities ?>
		<td<?php echo $homes->total_cities->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_total_cities" class="control-group homes_total_cities">
<span<?php echo $homes->total_cities->ViewAttributes() ?>>
<?php echo $homes->total_cities->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->total_countries->Visible) { // total_countries ?>
		<td<?php echo $homes->total_countries->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_total_countries" class="control-group homes_total_countries">
<span<?php echo $homes->total_countries->ViewAttributes() ?>>
<?php echo $homes->total_countries->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->metatags->Visible) { // metatags ?>
		<td<?php echo $homes->metatags->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_metatags" class="control-group homes_metatags">
<span<?php echo $homes->metatags->ViewAttributes() ?>>
<?php echo $homes->metatags->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->keywords->Visible) { // keywords ?>
		<td<?php echo $homes->keywords->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_keywords" class="control-group homes_keywords">
<span<?php echo $homes->keywords->ViewAttributes() ?>>
<?php echo $homes->keywords->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->created_at->Visible) { // created_at ?>
		<td<?php echo $homes->created_at->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_created_at" class="control-group homes_created_at">
<span<?php echo $homes->created_at->ViewAttributes() ?>>
<?php echo $homes->created_at->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($homes->updated_at->Visible) { // updated_at ?>
		<td<?php echo $homes->updated_at->CellAttributes() ?>><span id="el<?php echo $homes_list->RowCnt ?>_homes_updated_at" class="control-group homes_updated_at">
<span<?php echo $homes->updated_at->ViewAttributes() ?>>
<?php echo $homes->updated_at->ListViewValue() ?></span>
</span><a id="<?php echo $homes_list->PageObjName . "_row_" . $homes_list->RowCnt ?>"></a></td>
	<?php } ?>
<?php

// Render list options (body, right)
$homes_list->ListOptions->Render("body", "right", $homes_list->RowCnt);
?>
	</tr>
<?php
	}
	if ($homes->CurrentAction <> "gridadd")
		$homes_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($homes->CurrentAction == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($homes_list->Recordset)
	$homes_list->Recordset->Close();
?>
<div class="ewGridLowerPanel">
<?php if ($homes->CurrentAction <> "gridadd" && $homes->CurrentAction <> "gridedit") { ?>
<form name="ewPagerForm" class="ewForm form-horizontal" action="<?php echo ew_CurrentPage() ?>">
<table class="ewPager">
<tr><td>
<?php if (!isset($homes_list->Pager)) $homes_list->Pager = new cPrevNextPager($homes_list->StartRec, $homes_list->DisplayRecs, $homes_list->TotalRecs) ?>
<?php if ($homes_list->Pager->RecordCount > 0) { ?>
<table cellspacing="0" class="ewStdTable"><tbody><tr><td>
	<?php echo $Language->Phrase("Page") ?>&nbsp;
<div class="input-prepend input-append">
<!--first page button-->
	<?php if ($homes_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $homes_list->PageUrl() ?>start=<?php echo $homes_list->Pager->FirstButton->Start ?>"><i class="icon-step-backward"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-step-backward"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($homes_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $homes_list->PageUrl() ?>start=<?php echo $homes_list->Pager->PrevButton->Start ?>"><i class="icon-prev"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-prev"></i></a>
	<?php } ?>
<!--current page number-->
	<input class="input-mini" type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $homes_list->Pager->CurrentPage ?>">
<!--next page button-->
	<?php if ($homes_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $homes_list->PageUrl() ?>start=<?php echo $homes_list->Pager->NextButton->Start ?>"><i class="icon-play"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-play"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($homes_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $homes_list->PageUrl() ?>start=<?php echo $homes_list->Pager->LastButton->Start ?>"><i class="icon-step-forward"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-step-forward"></i></a>
	<?php } ?>
</div>
	&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $homes_list->Pager->PageCount ?>
</td>
<td>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $homes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $homes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $homes_list->Pager->RecordCount ?>
</td>
</tr></tbody></table>
<?php } else { ?>
	<?php if ($homes_list->SearchWhere == "0=101") { ?>
	<p><?php echo $Language->Phrase("EnterSearchCriteria") ?></p>
	<?php } else { ?>
	<p><?php echo $Language->Phrase("NoRecord") ?></p>
	<?php } ?>
<?php } ?>
</td>
</tr></table>
</form>
<?php } ?>
<div class="ewListOtherOptions">
<?php
	foreach ($homes_list->OtherOptions as &$option)
		$option->Render("body", "bottom");
?>
</div>
</div>
</td></tr></table>
<script type="text/javascript">
fhomeslistsrch.Init();
fhomeslist.Init();
<?php if (EW_MOBILE_REFLOW && ew_IsMobile()) { ?>
ew_Reflow();
<?php } ?>
</script>
<?php
$homes_list->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$homes_list->Page_Terminate();
?>
