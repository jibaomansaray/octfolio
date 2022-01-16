<?php
namespace Octfolio\Sarcasm;

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
        $pieces = str_split($subject);

        foreach ($pieces as $index => $char) {
            $char = ($index == 0) ? strtolower($char) : $char;
            if ($this->isAsciiCharacter($char)) {
                if ($previousWasCapital) {
                    $char = strtolower($char);
                } else {
                    $char  = strtoupper($char);
                }

                $previousWasCapital = !$previousWasCapital;
            }

            $converted .= $char;
        }

        return $converted;
    }

    private function isAsciiCharacter(string $char): bool
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
