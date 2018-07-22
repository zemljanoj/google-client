<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Address;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService
 */
class GetMatchService
{
    /**
     * Directions
     */
    const DIGIT_TO_SYMBOL = 'd2s';

    const SYMBOL_TO_DIGIT = 's2d';

    /**
     * @return string
     */
    public function execute(string $value, string $direction)
    {
        $table = $this->getTable();
        $target = $table[$value] ?? '';
        if ($direction == self::SYMBOL_TO_DIGIT) {
            $table = array_flip($table);
            $target = $table[$value] ?? '';
        }

        return $target;
    }

    /**
     * @return array
     */
    private function getTable()
    {
        return [
            '1' => 'A',
            '2' => 'B',
            '3' => 'C',
            '4' => 'D',
            '5' => 'E',
            '6' => 'F',
            '7' => 'G',
            '8' => 'H',
            '9' => 'I',
            '10' => 'J',
            '11' => 'K',
            '12' => 'L',
            '13' => 'M',
            '14' => 'N',
            '15' => 'O',
            '16' => 'P',
            '17' => 'Q',
            '18' => 'R',
            '19' => 'S',
            '20' => 'T',
            '21' => 'U',
            '22' => 'V',
            '23' => 'W',
            '24' => 'X',
            '25' => 'Y',
            '26' => 'Z'
        ];
    }
}