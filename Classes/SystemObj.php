<?php
abstract  class SystemObj{
    protected $id, $name, $children, $parentId;
    public
    function __construct(string $name, int $id, array $children, int $parentId ){
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->children = $children;
    }
    function GetId():int
    {
        return $this->id;
    }
    function ShowObjName():void
    {
        echo $this->name;
    }
    function GetParentId():int
    {
        return $this->parentId;
    }
    function GetChildrenIds():array
    {
        return $this->children;
    }
}




?>