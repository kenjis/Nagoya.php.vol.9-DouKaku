<?php
/**
 * This file is part of the NagoyaPHP.Vol9
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Vol9;

class ItemRepository
{
    /**
     * @var Item[]
     */
    private $top;
    
    /**
     * @var Item[]
     */
    private $all;
    
    public function setItem(Item $item)
    {
        $id = $item->getId();
        $this->top[$id] = $item;
        $this->all[$id] = $item;
    }
    
    public function addChild(Item $parent, Item $child)
    {
        $parent->addChild($child);
        $id = $child->getId();
        $this->all[$id] = $child;
    }
    
    public function getItem($id)
    {
        return $this->all[$id];
    }
    
    public function getTop()
    {
        return $this->top;
    }
}
