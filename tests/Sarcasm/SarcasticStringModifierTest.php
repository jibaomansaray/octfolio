<?php

namespace Octfolio\Sarcasm;

use PHPUnit\Framework\TestCase;

class SarcasticStringModifierTest extends TestCase
{
    private SarcasticStringModifier $modifier;

    protected function setUp(): void
    {
        parent::setUp();
        $this->modifier = new SarcasticStringModifier();
    }

    public function test_convert_emptyStringProvided_returnsEmptyString()
    {
        $subject = '';

        $result = $this->modifier->convert($subject);

        $this->assertEquals('', $result);
    }

    public function test_examples_in_the_readmeFile()
    {
        $example1 = 'Oh ReAlLy';
        $example2 = 'WeLl ThAnK yOu';

        $this->assertEquals($example1, $this->modifier->convert($example1));
        $this->assertEquals($example2, $this->modifier->convert($example2));
    }

    public function test_convertion_is_correct()
    {
        $casesAndExpectations = [
            'oh really' =>  'Oh ReAlLy',
            'well thank you' => 'WeLl ThAnK yOu',
            'a' => 'A',
            'A' => 'A',
            'The quick brown fox jumps...' => 'ThE qUiCk BrOwN fOx JuMpS...',
            '(*&^%$%$lovely' => '(*&^%$%$lOvElY',
            '' => '',
            '    ' => '    ',
            '   Happy DaYs' => '   HaPpY dAyS'
        ];

        foreach ($casesAndExpectations as $case => $expectation) {
            $this->assertEquals($expectation, $this->modifier->convert($case));
        }
    }
}
