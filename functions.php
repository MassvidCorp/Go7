<?php
require_once __DIR__.'/Classes/autoload.php';
require_once __DIR__.'/Globals.php';
require_once __DIR__.'/Enums/autoload.php';

function GetSysObjById(int $id):?SystemObj{
    //TODO: Search the systemTree for the specific id.
    return isset($GLOBALS['system'][$id])? $GLOBALS['system'][$id]:null;
}

function AddFile(int $id, string $name, int $parentId, $fileCategory):void
{
    if($parentId === 0)
    {
        throw new Exception('A file cannot have a parentId of 0 since it cannot be a root.');
    }
    $parentDir = GetSysObjById($parentId);
    if(!$parentDir || get_class($parentDir) ==='File')
    {
        throw new Exception('Could not find the parent directory or the given id is not a directory - please try another parent id.');
    }
    $GLOBALS['system'][$id] = new File($name,$id, [], $parentId, $fileCategory);
    $parentDir->AddChild($id);
}

function AddDirectory(int $id, string $name, int $parentId,  $DirectoryCategory):void
{
    if($parentId === 0 && count($GLOBALS['system']) > 0)
    {
        throw new Exception('There is already a root for this system, ParentId must be greater than 0.');
    }
    else if($parentId !== 0 && count($GLOBALS['system']) === 0)
    {
        throw new Exception('Root folder must have parent id as 0.');
    }
    $parentDir = GetSysObjById($parentId);
    if((!$parentDir&& count($GLOBALS['system']) > 0) || ($parentDir && get_class($parentDir) !== 'Dir'))
    {
        throw new Exception('Could not find the parent directory or the given id is not a directory - please try another parent id.');
    }
    $GLOBALS['system'][$id] = new Dir($name,$id, [], $parentId, $DirectoryCategory);
    //If its the root folder then the parent will be null.
    if($parentDir)
    {
        $parentDir->AddChild($id);
    }
}

function DeleteFile(int $id):void
{
    $file = GetSysObjById($id);
    if(!$file)
    {
        throw new Exception('Could not find the file - please make sure the id is correct.');
    }
    $parentDir = GetSysObjById($file->GetParentId());
    $parentDir->RemoveChild($id);
    unset($GLOBALS['system'][$id]);
}
function DeleteDirectory(int $id):void
{
    $dir = GetSysObjById($id);
    if($dir)
    {
        $deletedNodes = [];
        DeleteHierarchy($dir,$deletedNodes);
        unset($deletedNodes);
    }
    else
    {
        throw new Exception('Couldnt find directory');
    }

}

function DeleteHierarchy(SystemObj $node,array &$deletedNodes):void
{
    $nodeId = $node->GetId();
    $parentDir = GetSysObjById($node->GetParentId());
    $parentDir->RemoveChild($nodeId);
    if(!in_array($nodeId, $deletedNodes))
    {
        $deletedNodes[] = $nodeId;
        $systemObjChildrenIds = $node->GetChildrenIds();
        if($systemObjChildrenIds)
        {
            foreach($systemObjChildrenIds  as $childId)
            {
                $child = GetSysObjById($childId);
                DeleteHierarchy($child,$deletedNodes);
            }
        }
        unset( $GLOBALS['system'][$nodeId]);
    }
}

function PrintHierarchy(SystemObj $node,array &$printedSysObjectsIds,int $indentation):void
{
    $nodeId = $node->GetId();
    $indent = '';
    if(!in_array($nodeId, $printedSysObjectsIds))
    {
        $printedSysObjectsIds[] = $node->GetId();
        for($i = 0;$i < $indentation;$i++)
        {
            $indent.=" - ";
        }
        echo $indent;
        echo("<br/>{$node->ShowObjName()}");
        $systemObjChildrenIds = $node->GetChildrenIds();
        if($systemObjChildrenIds)
        {
            foreach($systemObjChildrenIds  as $childId)
            {
                $child = GetSysObjById($childId);
                PrintHierarchy($child,$printedSysObjectsIds,$indentation+1);
            }
        }
    }
}

function Findroot():?SystemObj
{
    $system = $GLOBALS['system'];
    if($system)
    {
        foreach($system as $key=>$val)
        {
            if($val->GetParentId() === 0)
            {
                return $val;
            }
        }
    }
    return null;
}

function ShowAll():void
{
    echo "<br/>Printing The System:<br/>";
    $root = Findroot($GLOBALS['system']);
    if($root)
    {
        $printedSysObjectsIds = [];
        PrintHierarchy($root,$printedSysObjectsIds,0);//The root node has accessable paths to all other nodes in the system.
        unset($printedSysObjectsIds);
    }
    else
    {
        echo "System is empty at the moment.";
    }
}