<?php

namespace App\Tests\Unit;

use App\Entity\Author;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testAddBooksToAuthor(): void
    {
        $author = new Author();
        $book1 = new Book();
        $book2 = new Book();

        $author->addBook($book1)
            ->addBook($book2);

        $this->assertCount(2, $author->getBooks());
        $this->assertSame($author, $book1->getAuthor());
        $this->assertSame($author, $book2->getAuthor());

    }

    public function testRemoveBooksFromAuthor()
    {
        $author = new Author();
        $book1 = new Book();
        $book2 = new Book();

        $author->addBook($book1)
            ->addBook($book2);

        $this->assertCount(2, $author->getBooks());


        $author->removeBook($book1);

        $this->assertCount(1, $author->getBooks());
        $this->assertNull($book1->getAuthor());
        $this->assertSame($author, $book2->getAuthor());
    }
}