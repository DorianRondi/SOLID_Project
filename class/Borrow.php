<?php
declare(strict_types=1);

namespace App\Class\Borrow;

class Borrow
{
    protected int $idBorrow;
    protected string $borrowingDate;
    protected string $returnDate;
    protected int $idBook;
    protected int $idUser;

    /**
     * @return int
     */
    public function getIdBorrow(): int
    {
        return $this->idBorrow;
    }

    /**
     * @param int $idBorrow
     */
    public function setIdBorrow(int $idBorrow): void
    {
        $this->idBorrow = $idBorrow;
    }

    /**
     * @return string
     */
    public function getBorrowingDate(): string
    {
        return $this->borrowingDate;
    }

    /**
     * @param string $borrowingDate
     */
    public function setBorrowingDate(string $borrowingDate): void
    {
        $this->borrowingDate = $borrowingDate;
    }

    /**
     * @return string
     */
    public function getReturnDate(): string
    {
        return $this->returnDate;
    }

    /**
     * @param string $returnDate
     */
    public function setReturnDate(string $returnDate): void
    {
        $this->returnDate = $returnDate;
    }

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
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
    
}