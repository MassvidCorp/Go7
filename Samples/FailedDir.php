<?php
/*
    In this file, we will show all sorts  of failing scenarios with uploading(adding) a new directory or deleting.
    Please uncomment the region you want to test and run the script.
*/
require_once __DIR__.'/../functions.php';

//region First folder, but not a root folder

// try
// {
//     AddDirectory(1,'RootFolder',10,DirectoryCategory::Documents);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion First folder, but not a root folder


//region Adding Directory with a file parent

// try{
//     AddDirectory(1,'RootFolder',0,DirectoryCategory::Documents);
//     AddDirectory(2,'SystemFolder1',1,DirectoryCategory::Documents);
//     AddFile(20,'SystemFolderFile1',2,FileCategory::Music);
//     ShowAll();
//     echo "<br/>success ends here<br/>";
//     AddDirectory(2,'SystemFolder1',20,DirectoryCategory::Documents);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Adding Directory with a file parent


//region Adding Directory with incorrect parent Id parent doesn't exist 

// try{
//     AddDirectory(1,'RootFolder',0,DirectoryCategory::Documents);
//     AddDirectory(2,'SystemFolder1',1,DirectoryCategory::Documents);
//     AddFile(20,'SystemFolderFile1',2,FileCategory::Music);
//     ShowAll();
//     echo "<br/>success ends here<br/>";
//     AddDirectory(2,'SystemFolder1',200,DirectoryCategory::Documents);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Adding Directory with incorrect parent Id parent doesn't exist 


//region Trying to add another root

// try{
//     AddDirectory(1,'RootFolder',0,DirectoryCategory::Documents);
//     ShowAll();
//     echo "success ends here<br/>";
//     AddDirectory(2,'SystemFolder1',0,DirectoryCategory::Documents);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Trying to add another root


//region Trying to delete a directory that does not exist

// try{
//     DeleteFile(123);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Trying to delete a directory that does not exist