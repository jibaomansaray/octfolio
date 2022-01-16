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


}
