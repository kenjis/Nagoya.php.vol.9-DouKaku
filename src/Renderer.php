<?php
/**
 * This file is part of the NagoyaPHP.Vol9
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Vol9;

class Renderer
{
    /**
     * @param Item[] $items
     */
    public function Html(array $items)
    {
        $output = '<ul>' . "\n";
        $output .= $this->getChildrenHtml($items);
        $output .= '</ul>' . "\n";
        
        return $output;
    }
    
    private function getChildrenHtml(array $items, $level = 1)
    {
        $output = '';
        $indent = str_repeat(' ', $level * 4);
        
        foreach ($items as $item) {
            if ($item->hasChildren()) {
                $output .= $indent . '<li>' . static::h($item->getValue()) . "\n";
                $output .= $indent . '    <ul>' . "\n";
                $output .= $this->getChildrenHtml($item->getChildren(), $level + 1);
                $output .= $indent . '    </ul>' . "\n";
                $output .= $indent . '</li>' . "\n";
            } else {
                $output .= $indent . '    <li>' . static::h($item->getValue()) . "</li>\n";
            }
        }
        
        return $output;
    }
    
    /**
     * @param Item[] $itmes
     */
    public function Cli(array $items)
    {
        $output = $this->getChildrenCli($items);
        
        return $output;
    }
    
    private function getChildrenCli(array $items, $level = 0)
    {
        $output = '';
        $indent = str_repeat(' ', $level * 4);
        
        foreach ($items as $item) {
            if ($item->hasChildren()) {
                $output .= $indent. '* ' . $item->getValue() . "\n";
                $output .= $this->getChildrenCli($item->getChildren(), $level + 1);
            } else {
                $output .= $indent . '* ' . $item->getValue() . "\n";
            }
        }
        
        return $output;
    }
    
    public static function h($str){
        return htmlspecialchars($str, ENT_QUOTES);
    }
}
