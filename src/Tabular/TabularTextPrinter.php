<?php
namespace Octfolio\Tabular;

/**
 * Handles the tabular-fication of data
 */
class TabularTextPrinter
{
    /**
     * Converts the given array of arrays into a multi-line string with columns formatted with spaces
     *
     * @param array $dataset An array of two-element arrays representing the dataset to print
     * @return string The formatting tabular text
     */
    public function printTabular(array $dataset): string
    {
        $minimumSpace = 3;
        $maxSpacing = $this->getMaxSpacing($dataset) + $minimumSpace;
        $table = '';

        foreach($dataset as $left => $right) {
            // make sure we are not dealing with null
            $left = $left ?? ''; 
            $right = $right ?? ''; 

            // remove any none visible characters on the left of the values
            $left = ltrim($left);
            $right = ltrim($right);

            $spacing =  abs(mb_strlen($left) - $maxSpacing);
            $table .= $left;

            if($right) {
                $table .= str_repeat(' ',$spacing). $right;
            }

            $table .= "\n";
        }

        return rtrim($table);
    }

    private function getMaxSpacing(array $dataset): int
    {
        $columnSpacing = 0;
        foreach(array_keys($dataset) as $value) {
            $current = mb_strlen($value);
            $columnSpacing = ($current > $columnSpacing) ? $current: $columnSpacing;
        }

        return $columnSpacing;
    }
}