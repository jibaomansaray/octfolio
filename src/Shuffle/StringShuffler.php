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
                $shuffled = ($previousPlacedOnTheRight) ? $char . $shuffled : $shuffled . $char;
                $previousPlacedOnTheRight = !$previousPlacedOnTheRight;
            }
        }

        return $shuffled;
    }
}
