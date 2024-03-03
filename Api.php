
<?php
require_once 'functions.php';

//region Parsing the request
foreach($_REQUEST as $key=>$val)
{
    $_REQUEST[$key] = htmlspecialchars($val);
}
//endregion Parsing the request

//region GET requests handeling
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // handle GET request
    if($_GET['action']!=='ShowAll')
    {
        echo('Cannot use this action on a get request.');
        exit();
    }
    ShowAll();
}
//endregion GET requests handeling

//region POST requests handeling
else if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    try{
        switch($_POST['action'])
        {
            case('AddFile'):
                {
                    //int $id, string $name, int $parentId, $fileCategory
                    if(isset($_POST['id']) && isset($_POST['parentId']) && isset($_POST['name'])&& isset($_POST['category']))
                    {
                        AddFile($_POST['id'],$_POST['name'],$_POST['parentId'],$_POST['category']);
                        echo "Succesfuly Added the folder {$_POST['name']}";
                        exit();
                    }

                    echo 'Insufficient data -> Please make sure you supplied an id,name,parent id and a category.';
                    break;
                }
                case('AddDirectory'):
                {
                    if(isset($_POST['id']) && isset($_POST['parentId']) && isset($_POST['name'])&& isset($_POST['category']))
                    {
                        AddDirectory($_POST['id'],$_POST['name'],$_POST['parentId'],$_POST['category']);
                        echo "Succesfuly Added the folder {$_POST['name']}";
                        exit();
                    }

                    echo 'Insufficient data -> Please make sure you supplied an id,name,parent id and a category.';
                    break;
                }
                case('DeleteFile'):
                {
                    if(isset($_POST['id']))
                    {
                        DeleteFile($_POST['id']);
                        echo "File was Deleted.";
                        exit();
                    }

                    echo 'Missing File id.';
                    break;
                }
                case('DeleteDirectory'):
                {
                    if(isset($_POST['id']))
                    {
                        DeleteDirectory($_POST['id']);
                        echo 'Deleted the folder.';
                        exit();
                    }
                    
                    echo 'Missing File id.';
                    break;
                }
                default:
                {
                    echo ('No action was sent.');
                    exit();
                }
        }
    }

    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
}
//endregion POST requests handeling
else
{
    echo "For this Task - only Get or Post requests are allowed.";
}