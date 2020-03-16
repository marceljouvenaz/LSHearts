<?php

/* All will be in English since this is a best practice I try to train for myself*/
namespace MRJ\LSHearts;

use MRJ\LSHearts\HeartsHand;
use MRJ\LSHearts\HeartsScore;

class HeartsGame
{

    /**
     * This is the main class that will hold all of the game
     */

    /**
     * @var HeartsHand
     * The game contains the four hands summarised in one object hand.
     * it doesn't seem useful to create four players and issue them a hand of 8 cards and a score,
     * in fact this seems easier for functions like Deal and Play
     * It will be 4 arrays of 8 cards
     *
     * @var HeartsScore
     * The game holds the score, it is not relegated to the players (that don't exist to begin with)
     * This is basically 1 array of 4 ints,
     */

    var $hand ;
    var $score ;

    function __construct()
    {
        $this->hand = new HeartsHand();
        $this->score = new HeartsScore();
    }

    /**
     * @return HeartsHand
     */
    public function getHand() :HeartsHand
    {
        return $this->hand;
    }

    /**
     * @param HeartsHand $hand
     */
    public function setHand($hand)
    {
        $this->hand = $hand;
    }

    /**
     * @return HeartsScore
     */
    public function getScore() :HeartsScore
    {
        return $this->score;
    }

    /**
     * @param HeartsScore $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }



    // deal 32 random cards to 4 players
    function heartsDeal(){}

    // play a game
    function heartsPlay(){
        for ($i =0; $i < 8; $i++){
            playRound();
            printHand();
            printScore();
        }
        printGameOver();
    }

    function playRound(){}

    function printRound(){}

    function printScore(){}

    function printGameOver(){}

}
