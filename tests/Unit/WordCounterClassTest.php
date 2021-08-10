<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use TDD\WordCounterClass;

class WordCounterClassTest extends TestCase
{
    const STRING_OF_WORDS_SEPARETED_WITH_SPACE = 'labas gelda gelda iki iki gelda';
    const STRING_OF_WORDS_SEPARETED_WITH_DOT = 'labas.gelda.gelda.iki.iki.gelda';
    const STRING_OF_WORDS_SEPARETED_WITH_MULTIPLE_SEPARATORS = 'The first second was alright,but the second second was tough';


    const CORRECTLY_SORTED_WORDS = "gelda, 3<br>iki, 2<br>labas, 1<br>";
    const CORRECTLY_SORTED_WORDS_WITH_MULTIPLE_SEPARATORS = "second, 3<br>the, 2<br>was, 2<br>first, 1<br>alright, 1<br>but, 1<br>tough, 1<br>";

    private WordCounterClass $wordCounterClass;

    protected function setUp(): void
    {
        $this->wordCounterClass = new WordCounterClass(array(",",".","|",":",));
    }

    public function test_should_initialize_word_counter_class(): void
    {
        $this->assertInstanceOf(WordCounterClass::class, $this->wordCounterClass);
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