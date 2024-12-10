<?php

namespace App\Tests\Service;

use App\Entity\Book;
use App\Entity\Client;
use App\Service\BorrowingManager;
use PHPUnit\Framework\TestCase;

class BorrowingManagerTest extends TestCase
{
    public function testBorrowBookWithTooBigCount(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(5);

        $book = new Book();
        $book->setBorrowed(false);

        $borrowingManager = new BorrowingManager();
        $this->assertFalse($borrowingManager->canBorrowBook($client, $book));
    }

    public function testCanBorrowBook(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(3);

        $book = new Book();
        $book->setBorrowed(false);

        $borrowingManager = new BorrowingManager();
        $this->assertTrue($borrowingManager->canBorrowBook($client, $book));
    }

    public function testBorrowBookWithBorrowedBook(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(3);

        $book = new Book();
        $book->setBorrowed(true);

        $borrowingManager = new BorrowingManager();
        $this->assertFalse($borrowingManager->canBorrowBook($client, $book));
    }
}
