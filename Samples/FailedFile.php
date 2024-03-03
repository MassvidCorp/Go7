<?php
/*
    In this file, we will show all sorts  of failing scenarios with file uploading(adding) or deleting.
    Please uncomment the region you want to test and run the script.
*/
require_once __DIR__.'/../functions.php';

//region Trying to upload a file before anything else, hence no root.

// try
// {
//     AddFile(1,'RootFile',0,FileCategory::Documents);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Trying to upload a file before anything else, hence no root.


//region Adding File with a parentId that does not exist

// try{
//     AddDirectory(1,'RootFolder',0,FileCategory::Documents);
//     AddDirectory(2,'SystemFolder1',1,FileCategory::Documents);
//     ShowAll();
//     echo "<br/>success ends here, gonna add a file with missing parent<br/>";
//     AddFile(20,'SystemFolderFile1',3,FileCategory::Music);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Adding File with a parentId that does not exist


//region Adding File with a parentId of a file

// try{
//     AddDirectory(1,'RootFolder',0,FileCategory::Documents);
//     AddDirectory(2,'SystemFolder1',1,FileCategory::Documents);
//     AddFile(20,'SystemFolderFile1',1,FileCategory::Music);
//     ShowAll();
//     echo "<br/>success ends here, gonna add a file with a file as a parent<br/>";
//     AddFile(21,'SystemFolderFile1',20,FileCategory::Music);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Adding File with a parentId of a file



//region Trying to delete a file that does not exist
// try{
//     DeleteFile(123);
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage();
// }

//endregion Trying to delete a file that does not exist