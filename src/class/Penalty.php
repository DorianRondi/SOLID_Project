<?php
declare(strict_types=1);

namespace App\Class\Penalty;

class Penalty
{
    protected int $idPenalty;
    protected int $amount;
    protected bool $payed;
    protected int $idUser;

    /**
     * @return int
     */
    public function getIdPenalty(): int
    {
        return $this->idPenalty;
    }

    /**
     * @param int $idPenalty
     */
    public function setIdPenalty(int $idPenalty): void
    {
        $this->idPenalty = $idPenalty;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return bool
     */
    public function isPayed(): bool
    {
        return $this->payed;
    }

    /**
     * @param bool $payed
     */
    public function setPayed(bool $payed): void
    {
        $this->payed = $payed;
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