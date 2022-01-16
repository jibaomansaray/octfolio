<?php

namespace Octfolio\Tabular;

use PHPUnit\Framework\TestCase;

class TabularTextPrinterTest extends TestCase
{
    private TabularTextPrinter $tabularText;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tabularText = new TabularTextPrinter();
    }

    public function test_print_emptyArrayProvided_returnsEmptyString()
    {
        $dataset = [];

        $result = $this->tabularText->printTabular($dataset);

        $this->assertEquals('', $result);
    }

    public function test_example1_in_readmeFile()
    {
        $dataset = [
            'Girrafe'  =>  'Ice-cream',
            'Elephant'  =>  'Tiramisu',
            'Lion'    =>    'Golden Gaytime',
            'Mosquito' =>      'Banana Split',
            'Yellow Jacket'  => 'Jelly'
        ];

        $expects = <<<EXP
Girrafe         Ice-cream
Elephant        Tiramisu
Lion            Golden Gaytime
Mosquito        Banana Split
Yellow Jacket   Jelly
EXP;

        $result = $this->tabularText->printTabular($dataset);
        $this->assertEquals($expects, $result);
    }

    public function test_example2_in_readmeFile()
    {
        $dataset = [
            'Yellow Jacket'  => 'Jelly',
            ''  => 'Sangria',
            'Zebra' => ''
        ];

        $expects = <<<EXP
Yellow Jacket   Jelly
                Sangria
Zebra
EXP;

        $result = $this->tabularText->printTabular($dataset);
        $this->assertEquals($expects, $result);
    }


    public function test_index_array()
    {
        $dataset = [
            'Ice-cream',
            'Tiramisu',
            'Golden Gaytime',
            'Banana Split',
            'Jelly',
            'Fight club',
            'Happy feet'
        ];

        $expects = <<<EXP
0   Ice-cream
1   Tiramisu
2   Golden Gaytime
3   Banana Split
4   Jelly
5   Fight club
6   Happy feet
EXP;


        $result = $this->tabularText->printTabular($dataset);
        $this->assertEquals($expects, $result);
    }


    public function test_empty_right_column_values()
    {
        $dataset = [
            'Ice-cream' => null,
            'Tiramisu' => null,
            'Golden Gaytime' => null,
            'Banana Split' => null,
            'Jelly' => null,
            'Fight club' => null,
            'Happy feet' => null
        ];


        $expects = <<<EXP
Ice-cream
Tiramisu
Golden Gaytime
Banana Split
Jelly
Fight club
Happy feet
EXP;

        $result = $this->tabularText->printTabular($dataset);
        $this->assertEquals($expects, $result);
    }

    public function test_random_exmpty_cells()
    {
        $dataset = [
            'Ice-cream' => 'Ice-cream',
            'Tiramisu' => null,
            'Golden Gaytime' => '',
            'Banana Split' => '        ',
            'Jelly' => 'Jelly',
            'Fight club' => null,
            '' => 'Happy feet'
        ];

        $expects = <<<EXP
Ice-cream        Ice-cream
Tiramisu
Golden Gaytime
Banana Split
Jelly            Jelly
Fight club
                 Happy feet
EXP;
        $result = $this->tabularText->printTabular($dataset);
        $this->assertEquals($expects, $result);
    }
}
