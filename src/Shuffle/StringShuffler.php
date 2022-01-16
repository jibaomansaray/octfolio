<?php

namespace Octfolio\Shuffle;

/**
 * Shuffles strings
 */
class StringShuffler
{
    public function shuffle(string $input): string
    {
        $shuffled = '';
        $pieces = str_split($input);
        $previousPlacedOnTheRight = true;

        foreach ($pieces as $index => $char) {
            if ($index == 0) {
                $shuffled = $char;
            } else {
                if ($previousPlacedOnTheRight) {
                    $shuffled = $char . $shuffled;
                } else {
                    $shuffled .= $char;
                }
                $previousPlacedOnTheRight = !$previousPlacedOnTheRight;
            }
        }

        return $shuffled;
    }
}
