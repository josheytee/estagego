<!-- Begin Main Menu -->
<div class="ewMenu">
<?php $RootMenu = new cMenu(EW_MENUBAR_ID) ?>
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(1, $Language->MenuPhrase("1", "MenuText"), "aboutslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(2, $Language->MenuPhrase("2", "MenuText"), "appdownloadslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(3, $Language->MenuPhrase("3", "MenuText"), "authorslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(4, $Language->MenuPhrase("4", "MenuText"), "blogslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(5, $Language->MenuPhrase("5", "MenuText"), "categorieslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(6, $Language->MenuPhrase("6", "MenuText"), "clientslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(7, $Language->MenuPhrase("7", "MenuText"), "commentslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(8, $Language->MenuPhrase("8", "MenuText"), "contact_messageslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(9, $Language->MenuPhrase("9", "MenuText"), "contactslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(10, $Language->MenuPhrase("10", "MenuText"), "failed_jobslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(11, $Language->MenuPhrase("11", "MenuText"), "faqslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(12, $Language->MenuPhrase("12", "MenuText"), "featureslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(13, $Language->MenuPhrase("13", "MenuText"), "homeslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(14, $Language->MenuPhrase("14", "MenuText"), "mail_listslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(15, $Language->MenuPhrase("15", "MenuText"), "migrationslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(16, $Language->MenuPhrase("16", "MenuText"), "pageslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(17, $Language->MenuPhrase("17", "MenuText"), "password_resetslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(18, $Language->MenuPhrase("18", "MenuText"), "personal_access_tokenslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(19, $Language->MenuPhrase("19", "MenuText"), "service_pageslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(20, $Language->MenuPhrase("20", "MenuText"), "serviceslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(21, $Language->MenuPhrase("21", "MenuText"), "sub_categorieslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(22, $Language->MenuPhrase("22", "MenuText"), "testimonialslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(23, $Language->MenuPhrase("23", "MenuText"), "userslist.php", -1, "", IsLoggedIn(), FALSE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
