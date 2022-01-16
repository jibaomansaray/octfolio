<?php
namespace Octfolio\Shuffle;

use PHPUnit\Framework\TestCase;

class StringShufflerTest extends TestCase
{
    private StringShuffler $shuffler;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->shuffler = new StringShuffler();
    }

    public function test_shuffle_emptyStringProvided_ReturnsEmptyString()
    {
        $input = '';

        $output = $this->shuffler->shuffle($input);

        $this->assertEquals('', $output);
    }


}
