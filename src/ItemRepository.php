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
    
    public function addToTop(Item $item)
    {
        $id = $item->getId();
        $this->top[$id] = $item;
    }
    
    public function addItem(Item $item)
    {
        $id = $item->getId();
        $this->all[$id] = $item;
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
