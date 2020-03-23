<?php


namespace MRJ\LSHearts;


class HeartsRound
{
    private $playedcards;
    private $startingplayer;

    function __construct($player)
    {
        $this->setPlayedcards([new HeartsCard(),new HeartsCard(),new HeartsCard(),new HeartsCard()]);
        $this->setStartingplayer($player);
    }

    /**
     * @param mixed $playedcards
     */
    public function setPlayedcards($playedcards)
    {
        $this->playedcards = $playedcards;
    }

    /**
     * @return mixed
     */
    public function getPlayedcards()
    {
        return $this->playedcards;
    }

    /**
     * @param mixed $startingplayer
     */
    public function setStartingplayer($startingplayer)
    {
        $this->startingplayer = $startingplayer;
    }

    /**
     * @return mixed
     */
    public function getStartingplayer()
    {
        return $this->startingplayer;
    }
}