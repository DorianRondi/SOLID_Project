<?php
declare(strict_types=1);

namespace App\Class\Book;

class Book
{
    protected int $idBook;
    protected string $title;
    protected string $isbn;
    protected bool $present;
    protected int $idAuthor;

    /**
     * @return int
     */
    public function getIdBook(): int
    {
        return $this->idBook;
    }

    /**
     * @param int $idBook
     */
    public function setIdBook(int $idBook): void
    {
        $this->idBook = $idBook;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return bool
     */
    public function isPresent(): bool
    {
        return $this->present;
    }

    /**
     * @param bool $present
     */
    public function setPresent(bool $present): void
    {
        $this->present = $present;
    }

    /**
     * @return int
     */
    public function getIdAuthor(): int
    {
        return $this->idAuthor;
    }

    /**
     * @param int $idAuthor
     */
    public function setIdAuthor(int $idAuthor): void
    {
        $this->idAuthor = $idAuthor;
    }

}