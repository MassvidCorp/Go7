<?php
//require_once __DIR__.'/../Enums/autoload.php';
class Dir extends SystemObj{
    private $category;
    public
    function __construct(string $name, int $id, array $children, int $parentId , $category)
    {
        parent::__construct($name,$id,$children,$parentId);
        if($category < FileCategory::Music || $category > FileCategory::Zip)
        {
            throw new Exception('invalid category.');
        }
        $this->category = $category;
    }
    function AddChild(int $id):void
    {
        $this->children[] = $id;
    }
    function RemoveChild(int $id):void
    {
        $toDeleteIndex = array_search($id,$this->children);
        unset($this->children[$toDeleteIndex]);
    }

    
}