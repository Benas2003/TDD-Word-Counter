<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use TDD\WordCounter;

class WordCounterTest extends TestCase
{
    const STRING_OF_WORDS_SEPARETED_WITH_SPACE = 'labas gelda gelda iki iki gelda';
    const STRING_OF_WORDS_SEPARETED_WITH_DOT = 'labas.gelda.gelda.iki.iki.gelda';
    const STRING_OF_WORDS_SEPARETED_WITH_MULTIPLE_SEPARATORS = 'The first second was alright,but the second second was tough';


    const CORRECTLY_SORTED_WORDS = "gelda, 3\niki, 2\nlabas, 1\n";
    const CORRECTLY_SORTED_WORDS_WITH_MULTIPLE_SEPARATORS = "second, 3\nthe, 2\nwas, 2\nfirst, 1\nalright, 1\nbut, 1\ntough, 1\n";

    private WordCounter $wordCounterClass;

    protected function setUp(): void
    {
        $this->wordCounterClass = new WordCounter(",",".","|",":");
    }

    public function test_should_initialize_word_counter_class(): void
    {
        $this->assertInstanceOf(WordCounter::class, $this->wordCounterClass);
    }

    public function test_should_return_correctly_counted_words_by_space_separator(): void
    {
        $sorted_words = $this->wordCounterClass->reformString(self::STRING_OF_WORDS_SEPARETED_WITH_SPACE);

        $this->assertIsString($sorted_words);
        $this->assertEquals(self::CORRECTLY_SORTED_WORDS, $sorted_words);
    }

    public function test_should_return_correctly_counted_words_by_dot_separator(): void
    {
        $sorted_words = $this->wordCounterClass->reformString(self::STRING_OF_WORDS_SEPARETED_WITH_DOT);

        $this->assertIsString($sorted_words);
        $this->assertEquals(self::CORRECTLY_SORTED_WORDS, $sorted_words);
    }

    public function test_should_return_correctly_counted_words_by_multiple_separators(): void
    {
        $sorted_words = $this->wordCounterClass->reformString(self::STRING_OF_WORDS_SEPARETED_WITH_MULTIPLE_SEPARATORS);

        $this->assertIsString($sorted_words);
        $this->assertEquals(self::CORRECTLY_SORTED_WORDS_WITH_MULTIPLE_SEPARATORS, $sorted_words);
    }
}