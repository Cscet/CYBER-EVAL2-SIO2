<?php

namespace App\Tests\Validation;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookValidationTest extends KernelTestCase
{

    public function testWithBlankTitle(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('');
        $book->setIsbn('978-0316769488');
        $book->setPublishedAt(new \DateTime('1964-07-16'));
        $book->setTitle('');

        $errors = $validator->validate($book);

        $this->assertCount(1, $errors);

    }

    public function testWithInvalidIsbn(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Charlie et la chocolaterie');
        $book->setIsbn('');
        $book->setPublishedAt(new \DateTime('1964-07-16'));
        $book->setIsbn('');

        $errors = $validator->validate($book);

        $this->assertCount(2, $errors); // 2 erreurs car isbn est vide et ne contient pas 14 caractères

    }

    public function testWithBlankPublishedAt(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Charlie et la chocolaterie');
        $book->setIsbn('978-0316769488');

        $errors = $validator->validate($book);

        $this->assertCount(1, $errors);

    }

    public function testWithValidBook()
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Charlie et la chocolaterie');
        $book->setIsbn('978-0316769488');
        $book->setPublishedAt(new \DateTime('1964-07-16'));

        $errors = $validator->validate($book);

        $this->assertCount(0, $errors);

    }


}
