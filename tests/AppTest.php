<?php

namespace NagoyaPHP\Vol9;

class AppTest extends \PHPUnit_Framework_TestCase
{
    public function testOutputHtml()
    {
        $data = [
            [
                'id' => 1,
                'parent_id' => 0,
                'value' => '親1',
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'value' => '親2',
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'value' => '子1-1',
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'value' => '子1-2',
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'value' => '子2-1',
            ],
        ];
        
        $expected = <<<'EOL'
<ul>
    <li>親1
        <ul>
            <li>子1-1</li>
            <li>子1-2</li>
        </ul>
    </li>
    <li>親2
        <ul>
            <li>子2-1</li>
        </ul>
    </li>
</ul>

EOL;
        $this->expectOutputString($expected);
        
        $app = new App();
        $app->outputHtml($data);
    }
    
    public function testOutputCli()
    {
        $data = [
            [
                'id' => 1,
                'parent_id' => 0,
                'value' => '親1',
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'value' => '親2',
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'value' => '子1-1',
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'value' => '子1-2',
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'value' => '子2-1',
            ],
            [
                'id' => 6,
                'parent_id' => 4,
                'value' => '孫1-2-1',
            ],
            [
                'id' => 7,
                'parent_id' => 3,
                'value' => '孫1-1-1',
            ],
            [
                'id' => 8,
                'parent_id' => 7,
                'value' => 'ひ孫1-1-1-1',
            ],
            [
                'id' => 9,
                'parent_id' => 5,
                'value' => '孫2-1-1',
            ],
            [
                'id' => 10,
                'parent_id' => 5,
                'value' => '孫2-1-2',
            ],
            [
                'id' => 11,
                'parent_id' => 2,
                'value' => '子2-2',
            ],
            [
                'id' => 12,
                'parent_id' => 4,
                'value' => '孫1-2-2',
            ],
            [
                'id' => 13,
                'parent_id' => 9,
                'value' => 'ひ孫2-1-1-1',
            ],
            [
                'id' => 14,
                'parent_id' => 5,
                'value' => '孫2-1-3',
            ],
            [
                'id' => 15,
                'parent_id' => 2,
                'value' => '子2-3',
            ],
        ];
        
        $expected = <<<'EOL'
* 親1
    * 子1-1
        * 孫1-1-1
            * ひ孫1-1-1-1
    * 子1-2
        * 孫1-2-1
        * 孫1-2-2
* 親2
    * 子2-1
        * 孫2-1-1
            * ひ孫2-1-1-1
        * 孫2-1-2
        * 孫2-1-3
    * 子2-2
    * 子2-3

EOL;
        $this->expectOutputString($expected);
        
        $app = new App();
        $app->outputCli($data);
    }
}
