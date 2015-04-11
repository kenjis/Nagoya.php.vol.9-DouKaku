<?php
/**
 * This file is part of the NagoyaPHP.Vol9
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Vol9;

class Item
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $value;
    
    /**
     * @var Item[]
     */
    private $children = [];
    
    public function __construct($data) {
        $this->id = $data['id'];
        $this->value = $data['value'];
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function addChild(Item $item)
    {
        $this->children[] = $item;
    }
    
    public function hasChildren()
    {
        return $this->children !== [];
    }
    
    public function getChildren()
    {
        return $this->children;
    }
}
