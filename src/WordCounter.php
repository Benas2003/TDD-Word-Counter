<?php

namespace TDD;

class WordCounter
{
    private string $sorted_words = '';
    private array $separators_array = [' '];

    public function __construct(...$separators_array)
    {
        $this->separators_array = array_merge($this->separators_array, $separators_array);
    }

    public function reformString(string $string): string
    {
        $lowercase_string = strtolower($string);
        $array = $this->separateString($lowercase_string);

        $array_count_values = $this->sumEqualArrayStrings($array);

        $array_count_values = $this->sortArrayDescending($array_count_values);

        $this->formatSortedString($array_count_values);

        return $this->sorted_words;
    }

    private function separateString(string $string): array
    {
        return $this->multipleExplode($this->separators_array, $string);
    }

    private function sortArrayDescending(array $array_count_values): array
    {
        arsort($array_count_values);
        return $array_count_values;
    }

    private function sumEqualArrayStrings(array $array): array
    {
        return array_count_values($array);
    }

    private function formatSortedString(array $array_count_values): void
    {
        foreach ($array_count_values as $word => $count) {
            $this->sorted_words .= $word . ", " . $count . "\n";
        }
    }

    private function multipleExplode(array $delimiters, string $string): array
    {
        $phase = str_replace($delimiters, $delimiters[0], $string);
        return explode($delimiters[0], $phase);
    }
}