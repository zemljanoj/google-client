<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Service\Address;
/**
 * Class \Zemljanoj\GoogleClient\Model\Service\Address\Number2LettersService
 */
class Number2LettersService
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
     * @param integer $number
     * @return string
     */
    public function execute(int $number)
    {
        $letters = '';
        $letters = $this->getPathPart($letters, $number);

        return $letters;
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
            $path = $path . $symbol;

            return $path;
        }
        $targetNumber = intval($number / 26);
        $value = strval($targetNumber);
        $symbol = $this->getMatchService->execute(
            $value,
            \Zemljanoj\GoogleClient\Model\Service\Address\GetMatchService::DIGIT_TO_SYMBOL
        );
        $path = $path . $symbol;
        $passNumber = $number - $targetNumber * 26;
        $path = $this->getPathPart($path, $passNumber);

        return $path;
    }
}