<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg10.php" ?>
<?php include_once "ewmysql10.php" ?>
<?php include_once "phpfn10.php" ?>
<?php include_once "appdownloadsinfo.php" ?>
<?php include_once "usersinfo.php" ?>
<?php include_once "userfn10.php" ?>
<?php

//
// Page class
//

$appdownloads_list = NULL; // Initialize page object first

class cappdownloads_list extends cappdownloads {

	// Page ID
	var $PageID = 'list';

	// Project ID
	var $ProjectID = "{B5C7A834-3426-4989-B956-81B68DFE8162}";

	// Table name
	var $TableName = 'appdownloads';

	// Page object name
	var $PageObjName = 'appdownloads_list';

	// Grid form hidden field names
	var $FormName = 'fappdownloadslist';
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

		// Table object (appdownloads)
		if (!isset($GLOBALS["appdownloads"])) {
			$GLOBALS["appdownloads"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["appdownloads"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "appdownloadsadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "appdownloadsdelete.php";
		$this->MultiUpdateUrl = "appdownloadsupdate.php";

		// Table object (users)
		if (!isset($GLOBALS['users'])) $GLOBALS['users'] = new cusers();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'appdownloads', TRUE);

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
		$this->BuildBasicSearchSQL($sWhere, $this->title, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->content, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->image, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->image2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->url, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->url2, $Keyword);
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
			$this->UpdateSort($this->title); // title
			$this->UpdateSort($this->content); // content
			$this->UpdateSort($this->image); // image
			$this->UpdateSort($this->image2); // image2
			$this->UpdateSort($this->url); // url
			$this->UpdateSort($this->url2); // url2
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
				$this->title->setSort("");
				$this->content->setSort("");
				$this->image->setSort("");
				$this->image2->setSort("");
				$this->url->setSort("");
				$this->url2->setSort("");
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
				$item->Body = "<a class=\"ewAction ewCustomAction\" href=\"\" onclick=\"ew_SubmitSelected(document.fappdownloadslist, '" . ew_CurrentUrl() . "', null, '" . $action . "');return false;\">" . $name . "</a>";
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
		$this->title->setDbValue($rs->fields('title'));
		$this->content->setDbValue($rs->fields('content'));
		$this->image->Upload->DbValue = $rs->fields('image');
		$this->image2->Upload->DbValue = $rs->fields('image2');
		$this->url->setDbValue($rs->fields('url'));
		$this->url2->setDbValue($rs->fields('url2'));
		$this->created_at->setDbValue($rs->fields('created_at'));
		$this->updated_at->setDbValue($rs->fields('updated_at'));
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->title->DbValue = $row['title'];
		$this->content->DbValue = $row['content'];
		$this->image->Upload->DbValue = $row['image'];
		$this->image2->Upload->DbValue = $row['image2'];
		$this->url->DbValue = $row['url'];
		$this->url2->DbValue = $row['url2'];
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
		// title
		// content
		// image
		// image2
		// url
		// url2
		// created_at
		// updated_at

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewCustomAttributes = "";

			// content
			$this->content->ViewValue = $this->content->CurrentValue;
			$this->content->ViewCustomAttributes = "";

			// image
			if (!ew_Empty($this->image->Upload->DbValue)) {
				$this->image->ViewValue = $this->image->Upload->DbValue;
			} else {
				$this->image->ViewValue = "";
			}
			$this->image->ViewCustomAttributes = "";

			// image2
			if (!ew_Empty($this->image2->Upload->DbValue)) {
				$this->image2->ViewValue = $this->image2->Upload->DbValue;
			} else {
				$this->image2->ViewValue = "";
			}
			$this->image2->ViewCustomAttributes = "";

			// url
			$this->url->ViewValue = $this->url->CurrentValue;
			$this->url->ViewCustomAttributes = "";

			// url2
			$this->url2->ViewValue = $this->url2->CurrentValue;
			$this->url2->ViewCustomAttributes = "";

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

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// content
			$this->content->LinkCustomAttributes = "";
			$this->content->HrefValue = "";
			$this->content->TooltipValue = "";

			// image
			$this->image->LinkCustomAttributes = "";
			$this->image->HrefValue = "";
			$this->image->HrefValue2 = $this->image->UploadPath . $this->image->Upload->DbValue;
			$this->image->TooltipValue = "";

			// image2
			$this->image2->LinkCustomAttributes = "";
			$this->image2->HrefValue = "";
			$this->image2->HrefValue2 = $this->image2->UploadPath . $this->image2->Upload->DbValue;
			$this->image2->TooltipValue = "";

			// url
			$this->url->LinkCustomAttributes = "";
			$this->url->HrefValue = "";
			$this->url->TooltipValue = "";

			// url2
			$this->url2->LinkCustomAttributes = "";
			$this->url2->HrefValue = "";
			$this->url2->TooltipValue = "";

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
if (!isset($appdownloads_list)) $appdownloads_list = new cappdownloads_list();

// Page init
$appdownloads_list->Page_Init();

// Page main
$appdownloads_list->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appdownloads_list->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var appdownloads_list = new ew_Page("appdownloads_list");
appdownloads_list.PageID = "list"; // Page ID
var EW_PAGE_ID = appdownloads_list.PageID; // For backward compatibility

// Form object
var fappdownloadslist = new ew_Form("fappdownloadslist");
fappdownloadslist.FormKeyCountName = '<?php echo $appdownloads_list->FormKeyCountName ?>';

// Form_CustomValidate event
fappdownloadslist.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fappdownloadslist.ValidateRequired = true;
<?php } else { ?>
fappdownloadslist.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

var fappdownloadslistsrch = new ew_Form("fappdownloadslistsrch");
</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $Breadcrumb->Render(); ?>
<?php if ($appdownloads_list->ExportOptions->Visible()) { ?>
<div class="ewListExportOptions"><?php $appdownloads_list->ExportOptions->Render("body") ?></div>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$appdownloads_list->TotalRecs = $appdownloads->SelectRecordCount();
	} else {
		if ($appdownloads_list->Recordset = $appdownloads_list->LoadRecordset())
			$appdownloads_list->TotalRecs = $appdownloads_list->Recordset->RecordCount();
	}
	$appdownloads_list->StartRec = 1;
	if ($appdownloads_list->DisplayRecs <= 0 || ($appdownloads->Export <> "" && $appdownloads->ExportAll)) // Display all records
		$appdownloads_list->DisplayRecs = $appdownloads_list->TotalRecs;
	if (!($appdownloads->Export <> "" && $appdownloads->ExportAll))
		$appdownloads_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$appdownloads_list->Recordset = $appdownloads_list->LoadRecordset($appdownloads_list->StartRec-1, $appdownloads_list->DisplayRecs);
$appdownloads_list->RenderOtherOptions();
?>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($appdownloads->Export == "" && $appdownloads->CurrentAction == "") { ?>
<form name="fappdownloadslistsrch" id="fappdownloadslistsrch" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>">
<table class="ewSearchTable"><tr><td>
<div class="accordion" id="fappdownloadslistsrch_SearchGroup">
	<div class="accordion-group">
		<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#fappdownloadslistsrch_SearchGroup" href="#fappdownloadslistsrch_SearchBody"><?php echo $Language->Phrase("Search") ?></a>
		</div>
		<div id="fappdownloadslistsrch_SearchBody" class="accordion-body collapse in">
			<div class="accordion-inner">
<div id="fappdownloadslistsrch_SearchPanel">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appdownloads">
<div class="ewBasicSearch">
<div id="xsr_1" class="ewRow">
	<div class="btn-group ewButtonGroup">
	<div class="input-append">
	<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" class="input-large" value="<?php echo ew_HtmlEncode($appdownloads_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo $Language->Phrase("Search") ?>">
	<button class="btn btn-primary ewButton" name="btnsubmit" id="btnsubmit" type="submit"><?php echo $Language->Phrase("QuickSearchBtn") ?></button>
	</div>
	</div>
	<div class="btn-group ewButtonGroup">
	<a class="btn ewShowAll" href="<?php echo $appdownloads_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>
</div>
<div id="xsr_2" class="ewRow">
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="="<?php if ($appdownloads_list->BasicSearch->getType() == "=") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($appdownloads_list->BasicSearch->getType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>
	<label class="inline radio ewRadio" style="white-space: nowrap;"><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($appdownloads_list->BasicSearch->getType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
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
<?php $appdownloads_list->ShowPageHeader(); ?>
<?php
$appdownloads_list->ShowMessage();
?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="fappdownloadslist" id="fappdownloadslist" class="ewForm form-horizontal" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="appdownloads">
<div id="gmp_appdownloads" class="ewGridMiddlePanel">
<?php if ($appdownloads_list->TotalRecs > 0) { ?>
<table id="tbl_appdownloadslist" class="ewTable ewTableSeparate">
<?php echo $appdownloads->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$appdownloads_list->RenderListOptions();

// Render list options (header, left)
$appdownloads_list->ListOptions->Render("header", "left");
?>
<?php if ($appdownloads->id->Visible) { // id ?>
	<?php if ($appdownloads->SortUrl($appdownloads->id) == "") { ?>
		<td><div id="elh_appdownloads_id" class="appdownloads_id"><div class="ewTableHeaderCaption"><?php echo $appdownloads->id->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->id) ?>',1);"><div id="elh_appdownloads_id" class="appdownloads_id">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->id->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->id->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->id->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->title->Visible) { // title ?>
	<?php if ($appdownloads->SortUrl($appdownloads->title) == "") { ?>
		<td><div id="elh_appdownloads_title" class="appdownloads_title"><div class="ewTableHeaderCaption"><?php echo $appdownloads->title->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->title) ?>',1);"><div id="elh_appdownloads_title" class="appdownloads_title">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->title->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->title->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->title->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->content->Visible) { // content ?>
	<?php if ($appdownloads->SortUrl($appdownloads->content) == "") { ?>
		<td><div id="elh_appdownloads_content" class="appdownloads_content"><div class="ewTableHeaderCaption"><?php echo $appdownloads->content->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->content) ?>',1);"><div id="elh_appdownloads_content" class="appdownloads_content">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->content->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->content->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->content->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->image->Visible) { // image ?>
	<?php if ($appdownloads->SortUrl($appdownloads->image) == "") { ?>
		<td><div id="elh_appdownloads_image" class="appdownloads_image"><div class="ewTableHeaderCaption"><?php echo $appdownloads->image->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->image) ?>',1);"><div id="elh_appdownloads_image" class="appdownloads_image">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->image->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->image->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->image->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->image2->Visible) { // image2 ?>
	<?php if ($appdownloads->SortUrl($appdownloads->image2) == "") { ?>
		<td><div id="elh_appdownloads_image2" class="appdownloads_image2"><div class="ewTableHeaderCaption"><?php echo $appdownloads->image2->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->image2) ?>',1);"><div id="elh_appdownloads_image2" class="appdownloads_image2">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->image2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->image2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->image2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->url->Visible) { // url ?>
	<?php if ($appdownloads->SortUrl($appdownloads->url) == "") { ?>
		<td><div id="elh_appdownloads_url" class="appdownloads_url"><div class="ewTableHeaderCaption"><?php echo $appdownloads->url->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->url) ?>',1);"><div id="elh_appdownloads_url" class="appdownloads_url">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->url->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->url->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->url->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->url2->Visible) { // url2 ?>
	<?php if ($appdownloads->SortUrl($appdownloads->url2) == "") { ?>
		<td><div id="elh_appdownloads_url2" class="appdownloads_url2"><div class="ewTableHeaderCaption"><?php echo $appdownloads->url2->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->url2) ?>',1);"><div id="elh_appdownloads_url2" class="appdownloads_url2">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->url2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->url2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->url2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->created_at->Visible) { // created_at ?>
	<?php if ($appdownloads->SortUrl($appdownloads->created_at) == "") { ?>
		<td><div id="elh_appdownloads_created_at" class="appdownloads_created_at"><div class="ewTableHeaderCaption"><?php echo $appdownloads->created_at->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->created_at) ?>',1);"><div id="elh_appdownloads_created_at" class="appdownloads_created_at">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->created_at->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->created_at->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->created_at->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php if ($appdownloads->updated_at->Visible) { // updated_at ?>
	<?php if ($appdownloads->SortUrl($appdownloads->updated_at) == "") { ?>
		<td><div id="elh_appdownloads_updated_at" class="appdownloads_updated_at"><div class="ewTableHeaderCaption"><?php echo $appdownloads->updated_at->FldCaption() ?></div></div></td>
	<?php } else { ?>
		<td><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $appdownloads->SortUrl($appdownloads->updated_at) ?>',1);"><div id="elh_appdownloads_updated_at" class="appdownloads_updated_at">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $appdownloads->updated_at->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($appdownloads->updated_at->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($appdownloads->updated_at->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></td>
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$appdownloads_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appdownloads->ExportAll && $appdownloads->Export <> "") {
	$appdownloads_list->StopRec = $appdownloads_list->TotalRecs;
} else {

	// Set the last record to display
	if ($appdownloads_list->TotalRecs > $appdownloads_list->StartRec + $appdownloads_list->DisplayRecs - 1)
		$appdownloads_list->StopRec = $appdownloads_list->StartRec + $appdownloads_list->DisplayRecs - 1;
	else
		$appdownloads_list->StopRec = $appdownloads_list->TotalRecs;
}
$appdownloads_list->RecCnt = $appdownloads_list->StartRec - 1;
if ($appdownloads_list->Recordset && !$appdownloads_list->Recordset->EOF) {
	$appdownloads_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $appdownloads_list->StartRec > 1)
		$appdownloads_list->Recordset->Move($appdownloads_list->StartRec - 1);
} elseif (!$appdownloads->AllowAddDeleteRow && $appdownloads_list->StopRec == 0) {
	$appdownloads_list->StopRec = $appdownloads->GridAddRowCount;
}

// Initialize aggregate
$appdownloads->RowType = EW_ROWTYPE_AGGREGATEINIT;
$appdownloads->ResetAttrs();
$appdownloads_list->RenderRow();
while ($appdownloads_list->RecCnt < $appdownloads_list->StopRec) {
	$appdownloads_list->RecCnt++;
	if (intval($appdownloads_list->RecCnt) >= intval($appdownloads_list->StartRec)) {
		$appdownloads_list->RowCnt++;

		// Set up key count
		$appdownloads_list->KeyCount = $appdownloads_list->RowIndex;

		// Init row class and style
		$appdownloads->ResetAttrs();
		$appdownloads->CssClass = "";
		if ($appdownloads->CurrentAction == "gridadd") {
		} else {
			$appdownloads_list->LoadRowValues($appdownloads_list->Recordset); // Load row values
		}
		$appdownloads->RowType = EW_ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appdownloads->RowAttrs = array_merge($appdownloads->RowAttrs, array('data-rowindex'=>$appdownloads_list->RowCnt, 'id'=>'r' . $appdownloads_list->RowCnt . '_appdownloads', 'data-rowtype'=>$appdownloads->RowType));

		// Render row
		$appdownloads_list->RenderRow();

		// Render list options
		$appdownloads_list->RenderListOptions();
?>
	<tr<?php echo $appdownloads->RowAttributes() ?>>
<?php

// Render list options (body, left)
$appdownloads_list->ListOptions->Render("body", "left", $appdownloads_list->RowCnt);
?>
	<?php if ($appdownloads->id->Visible) { // id ?>
		<td<?php echo $appdownloads->id->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_id" class="control-group appdownloads_id">
<span<?php echo $appdownloads->id->ViewAttributes() ?>>
<?php echo $appdownloads->id->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->title->Visible) { // title ?>
		<td<?php echo $appdownloads->title->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_title" class="control-group appdownloads_title">
<span<?php echo $appdownloads->title->ViewAttributes() ?>>
<?php echo $appdownloads->title->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->content->Visible) { // content ?>
		<td<?php echo $appdownloads->content->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_content" class="control-group appdownloads_content">
<span<?php echo $appdownloads->content->ViewAttributes() ?>>
<?php echo $appdownloads->content->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->image->Visible) { // image ?>
		<td<?php echo $appdownloads->image->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_image" class="control-group appdownloads_image">
<span<?php echo $appdownloads->image->ViewAttributes() ?>>
<?php if ($appdownloads->image->LinkAttributes() <> "") { ?>
<?php if (!empty($appdownloads->image->Upload->DbValue)) { ?>
<?php echo $appdownloads->image->ListViewValue() ?>
<?php } elseif (!in_array($appdownloads->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($appdownloads->image->Upload->DbValue)) { ?>
<?php echo $appdownloads->image->ListViewValue() ?>
<?php } elseif (!in_array($appdownloads->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->image2->Visible) { // image2 ?>
		<td<?php echo $appdownloads->image2->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_image2" class="control-group appdownloads_image2">
<span<?php echo $appdownloads->image2->ViewAttributes() ?>>
<?php if ($appdownloads->image2->LinkAttributes() <> "") { ?>
<?php if (!empty($appdownloads->image2->Upload->DbValue)) { ?>
<?php echo $appdownloads->image2->ListViewValue() ?>
<?php } elseif (!in_array($appdownloads->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($appdownloads->image2->Upload->DbValue)) { ?>
<?php echo $appdownloads->image2->ListViewValue() ?>
<?php } elseif (!in_array($appdownloads->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->url->Visible) { // url ?>
		<td<?php echo $appdownloads->url->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_url" class="control-group appdownloads_url">
<span<?php echo $appdownloads->url->ViewAttributes() ?>>
<?php echo $appdownloads->url->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->url2->Visible) { // url2 ?>
		<td<?php echo $appdownloads->url2->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_url2" class="control-group appdownloads_url2">
<span<?php echo $appdownloads->url2->ViewAttributes() ?>>
<?php echo $appdownloads->url2->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->created_at->Visible) { // created_at ?>
		<td<?php echo $appdownloads->created_at->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_created_at" class="control-group appdownloads_created_at">
<span<?php echo $appdownloads->created_at->ViewAttributes() ?>>
<?php echo $appdownloads->created_at->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($appdownloads->updated_at->Visible) { // updated_at ?>
		<td<?php echo $appdownloads->updated_at->CellAttributes() ?>><span id="el<?php echo $appdownloads_list->RowCnt ?>_appdownloads_updated_at" class="control-group appdownloads_updated_at">
<span<?php echo $appdownloads->updated_at->ViewAttributes() ?>>
<?php echo $appdownloads->updated_at->ListViewValue() ?></span>
</span><a id="<?php echo $appdownloads_list->PageObjName . "_row_" . $appdownloads_list->RowCnt ?>"></a></td>
	<?php } ?>
<?php

// Render list options (body, right)
$appdownloads_list->ListOptions->Render("body", "right", $appdownloads_list->RowCnt);
?>
	</tr>
<?php
	}
	if ($appdownloads->CurrentAction <> "gridadd")
		$appdownloads_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($appdownloads->CurrentAction == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($appdownloads_list->Recordset)
	$appdownloads_list->Recordset->Close();
?>
<div class="ewGridLowerPanel">
<?php if ($appdownloads->CurrentAction <> "gridadd" && $appdownloads->CurrentAction <> "gridedit") { ?>
<form name="ewPagerForm" class="ewForm form-horizontal" action="<?php echo ew_CurrentPage() ?>">
<table class="ewPager">
<tr><td>
<?php if (!isset($appdownloads_list->Pager)) $appdownloads_list->Pager = new cPrevNextPager($appdownloads_list->StartRec, $appdownloads_list->DisplayRecs, $appdownloads_list->TotalRecs) ?>
<?php if ($appdownloads_list->Pager->RecordCount > 0) { ?>
<table cellspacing="0" class="ewStdTable"><tbody><tr><td>
	<?php echo $Language->Phrase("Page") ?>&nbsp;
<div class="input-prepend input-append">
<!--first page button-->
	<?php if ($appdownloads_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $appdownloads_list->PageUrl() ?>start=<?php echo $appdownloads_list->Pager->FirstButton->Start ?>"><i class="icon-step-backward"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-step-backward"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($appdownloads_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $appdownloads_list->PageUrl() ?>start=<?php echo $appdownloads_list->Pager->PrevButton->Start ?>"><i class="icon-prev"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-prev"></i></a>
	<?php } ?>
<!--current page number-->
	<input class="input-mini" type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $appdownloads_list->Pager->CurrentPage ?>">
<!--next page button-->
	<?php if ($appdownloads_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $appdownloads_list->PageUrl() ?>start=<?php echo $appdownloads_list->Pager->NextButton->Start ?>"><i class="icon-play"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-play"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($appdownloads_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-small" type="button" href="<?php echo $appdownloads_list->PageUrl() ?>start=<?php echo $appdownloads_list->Pager->LastButton->Start ?>"><i class="icon-step-forward"></i></a>
	<?php } else { ?>
	<a class="btn btn-small" type="button" disabled="disabled"><i class="icon-step-forward"></i></a>
	<?php } ?>
</div>
	&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $appdownloads_list->Pager->PageCount ?>
</td>
<td>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appdownloads_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appdownloads_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appdownloads_list->Pager->RecordCount ?>
</td>
</tr></tbody></table>
<?php } else { ?>
	<?php if ($appdownloads_list->SearchWhere == "0=101") { ?>
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
	foreach ($appdownloads_list->OtherOptions as &$option)
		$option->Render("body", "bottom");
?>
</div>
</div>
</td></tr></table>
<script type="text/javascript">
fappdownloadslistsrch.Init();
fappdownloadslist.Init();
<?php if (EW_MOBILE_REFLOW && ew_IsMobile()) { ?>
ew_Reflow();
<?php } ?>
</script>
<?php
$appdownloads_list->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appdownloads_list->Page_Terminate();
?>
