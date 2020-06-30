<?php


namespace MRJ\LSHearts;

include 'HeartsCard.php';

class HeartsRound
{
    private $playedcards;
    private $startingplayer;

    function __construct($player)
    {
        $this->setPlayedcards([new HeartsCard(),new HeartsCard(),new HeartsCard(),new HeartsCard()]);
        $this->setStartingplayer($player);
    }

    function playCard(int $player, int $cardnumber)
    {
        $this->playedcards[$player]->setNumber($cardnumber);
    }

    /**
     * @param array $playedcards
     */
    public function setPlayedcards($playedcards)
    {
        $this->playedcards = $playedcards;
    }

    /**
     * @return array
     */
    public function getPlayedcards()
    {
        return $this->playedcards;
    }

    /**
     * @param int $startingplayer
     */
    public function setStartingplayer($startingplayer)
    {
        $this->startingplayer = $startingplayer;
    }

    /**
     * @return int
     */
    public function getStartingplayer()
    {
        return $this->startingplayer;
    }
}