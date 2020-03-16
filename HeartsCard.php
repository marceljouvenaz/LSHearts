<?php


namespace MRJ\LSHearts;


class  HeartsCard
{
    /**
     * HeartsCard is a class that describes a card, suit, number, status,
     */

    var $suit = 0;
    var $number = 0;
    var $status = 0;

    /**
     * @return integer
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return integer
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return integer
     */
    public function getSuit(): int
    {
        return $this->suit;
    }

    /**
     * @param integer $number
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * @param integer $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @param integer $suit
     */
    public function setSuit(int $suit)
    {
        $this->suit = $suit;
    }
}