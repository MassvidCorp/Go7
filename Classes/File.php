<?php
require_once __DIR__.'/../Enums/autoload.php';
class File extends SystemObj{
    private $category;
    public function __construct(string $name, int $id, array $children, int $parentId , $category)
    {
        parent::__construct($name,$id,$children,$parentId);
        if($children)
        {
            throw new Exception('a file cannot have children.');
        }
        else if($parentId < 1 || $parentId === null)
        {
            throw new Exception('a file must have a parent folder.');
        }
        else if($category < FileCategory::Music || $category > FileCategory::Zip)
        {
            throw new Exception('invalid category.');
        }
        $this->category = $category;
    }
}