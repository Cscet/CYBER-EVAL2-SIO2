<?php

namespace App\Tests\Unit;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    private function makeBook()
    {
        $book = new Book();
        $book->setTitle('Charlie et la chocolaterie');
        $book->setIsbn('978-0316769488');
        $book->setPublishedAt(new \DateTime('1964-07-16'));
        return $book;


    }
    public function testGetSetBook(): void
    {
        $book = $this->makeBook();
        $this->assertEquals('Charlie et la chocolaterie', $book->getTitle());
        $this->assertEquals('978-0316769488', $book->getIsbn());
        $this->assertEquals(new \DateTime('1964-07-16'), $book->getPublishedAt());
    }




}
