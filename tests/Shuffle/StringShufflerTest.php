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

    public function test_examples_in_readmeFile() 
    {
        $casesAndExpections = [
            'abcdefgh' => 'hfdbaceg',
            'glasier' => 'eslgair',
            'hotdog stand' => 'dasgdohto tn'
        ];

        foreach($casesAndExpections as $case => $expects) {
            $this->assertEquals($expects, $this->shuffler->shuffle($case));
        }
    }


    public function test_numbers_only()
    {
        $casesAndExpections = [
            12345 => 42135,
            11111 => 11111,
            246 => 426
        ];

        foreach($casesAndExpections as $case => $expects) {
            $this->assertEquals($expects, $this->shuffler->shuffle($case));
        }
    }

    public function test_alphanumeric_strings()
    {

        $casesAndExpections = [
            '1a2b3c' => 'cba123',
            'UID8945' => '48IUD95'
        ];

        foreach($casesAndExpections as $case => $expects) {
            $this->assertEquals($expects, $this->shuffler->shuffle($case));
        }
    }


    public function test_none_alphanumberic_string()
    {

        $case = '!@#$%^';
        $expects = '^$@!#%';

        $this->assertEquals($expects, $this->shuffler->shuffle($case));
    }

}
