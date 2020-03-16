<?php


namespace MRJ\LSHearts;
use MRJ\LSHearts\HeartsCard;

class HeartsHand
{
    /**
     * HeartsHand is a class that will contain the distribution of cards among the players,
     * It could have been 1 array of 32 cards, but I think it will be easier to debug and read for others if I create four arrays of 8 cards,
     * I could have chosen to delete played cards from the hands, but in order to replay a hand, which is not yet a requirement,
     * I have chosen to keep all cards on the record, and cards will hold a property that identifies them as 'in hand' versus 'played'
     */

    var $north = array();
    var $east = array();
    var $south = array();
    var $west = array();

    function __construct()
    {
    }

    /**
     * @return array of HeartsCard
     */
    public function getNorth(): array
    {
        return $this->north;
    }

    /**
     * @return array of HeartsCard
     */
    public function getSouth(): array
    {
        return $this->south;
    }

    /**
     * @return array of HeartsCard
     */
    public function getEast(): array
    {
        return $this->east;
    }

    /**
     * @return array of HeartsCard
     */
    public function getWest(): array
    {
        return $this->west;
    }

    /**
     * @param array of HeartsCard $east
     */
    public function setEast(array $east)
    {
        $this->east = $east;
    }

    /**
     * @param array of HeartsCard $north
     */
    public function setNorth(array $north)
    {
        $this->north = $north;
    }

    /**
     * @param array of HeartsCard $south
     */
    public function setSouth(array $south)
    {
        $this->south = $south;
    }

    /**
     * @param array of HeartsCard $west
     */
    public function setWest(array $west)
    {
        $this->west = $west;
    }

}