<?php
namespace Octfolio\Sarcasm;

use Octfolio\Libs\StringHelper as Str;

/**
 * A class that provides ways to determine sarcasm
 */
class SarcasticStringModifier
{
    /**
     * Converts the given string into SaRcAsTiC cAsE
     *
     * @param string $subject The string to convert
     * @return string The string in sarcastic case
     */
    public function convert(string $subject): string
    {
        $previousWasCapital = false;
        $converted = '';
        $pieces =  Str::split($subject);

        foreach ($pieces as $char) {
            if ($this->isAlphaCharacter($char)) {
                $char = ($previousWasCapital) ? Str::lower($char) : Str::upper($char);
                $previousWasCapital = !$previousWasCapital;
            }

            $converted .= $char;
        }

        return $converted;
    }

    private function isAlphaCharacter(string $char): bool
    {
        if (strlen($char) == 1) {
            $intValue = mb_ord($char);

            // 65 == capital letter 'a'
            // 122 == small 'z'
            return $intValue && $intValue >= 65 && $intValue <= 122;
        }
        return false;
    }
}
