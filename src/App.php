<?php
/**
 * This file is part of the NagoyaPHP.Vol9
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Vol9;

class App
{
    /**
     * @param array $data
     * @return \NagoyaPHP\Vol9\ItemRepository
     */
    private function process(array $data)
    {
        $repos = new ItemRepository();
        
        foreach ($data as $item) {
            if ($item['parent_id'] === 0) {
                $repos->setItem(new Item($item));
            } else {
                $parent = $repos->getItem($item['parent_id']);
                $repos->addChild($parent, new Item($item));
            }
        }
//        var_dump($repos->getTop()); exit;
        
        return $repos;
    }
    
    public function outputHtml(array $data)
    {
        $repos = $this->process($data);
        $renderer = new Renderer();
        echo $renderer->Html($repos->getTop());
    }
    
    public function outputCli(array $data)
    {
        $repos = $this->process($data);
        $renderer = new Renderer();
        echo $renderer->Cli($repos->getTop());
    }
}
