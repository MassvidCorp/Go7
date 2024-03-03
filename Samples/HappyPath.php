<?php
/*
    In This file we will show a happy path - adding a root, then adding some files and directories and then deleting some objects to see the effect on the system.
 */
require_once __DIR__.'/../functions.php';
try
{
    echo "Empty system:<br/>";
    ShowAll();

    echo '<br/>********************************************* Adding Root Folder *********************************************<br/>';

    AddDirectory(1,'RootFolder',0,DirectoryCategory::Documents);
    ShowAll();

    echo '********************************************* Adding Some directories and Files *********************************************<br/>';

    AddDirectory(2,'SystemFolder1',1,DirectoryCategory::Documents);
    AddDirectory(3,'SystemFolder2',1,DirectoryCategory::Documents);
    AddDirectory(4,'SystemFolder3',2,DirectoryCategory::Documents);
    AddFile(20,'SystemFolderFile1',2,FileCategory::Music);
    ShowAll();

    echo '********************************************* Deleting a directory with children *********************************************<br/>';
    DeleteDirectory(2);
    ShowAll();
}
catch(Exception $ex)
{
    echo $ex->getMessage();
}