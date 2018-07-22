<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Address;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Address\Letters2NumberService
 */
class Letters2NumberService
{
    /**
     * @var \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService
     */
    private $getMatchService;

    /**
     * Number2LettersService constructor.
     *
     * @param \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService $getMatchService
     */
    public function __construct (
        \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService $getMatchService
    ) {
        $this->getMatchService = $getMatchService;
    }

    /**
     * @param string $letters
     * @return integer
     */
    public function execute(string $letters)
    {
        $number = 0;
        $letters = preg_split('#(?<!^)(?!$)#u', $letters);
        foreach ($letters as $index => $symbol) {
            $digit = $this->getMatchService->execute($symbol, \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService::SYMBOL_TO_DIGIT);
            $number += $digit * pow(26, $index);
        }

        return $number;
    }

    /**
     * @param string $path
     * @param int $number
     * @return string
     */
    private function getPathPart(string $path, int $number)
    {
        if ($number === 0) {

            return $path;
        }
        if ($number <= 26) {
            $value = strval($number);
            $symbol = $this->getMatchService->execute(
                $value,
                \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService::DIGIT_TO_SYMBOL
            );
            $path = $symbol . $path;

            return $path;
        }
        $targetNumber = intval($number / 26);
        $value = strval($targetNumber);
        $symbol = $this->getMatchService->execute(
            $value,
            \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService::DIGIT_TO_SYMBOL
        );
        $path = $symbol . $path;
        $passNumber = $number - $targetNumber * 26;
        $path = $this->getPathPart($path, $passNumber);

        return $path;
    }
}