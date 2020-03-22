<?php


namespace MRJ\LSHearts;


include 'HeartsPlayer.php';
include 'HeartsScore.php';


class HeartsHand
{
    var $myplayers;
    var $myscore;
    var $startingplayer;


    function __construct()
    {
        // names in honor of the late great Kenny Rogers
        $this->myplayers = [new HeartsPlayer("Janice"), new HeartsPlayer("Jean"), new HeartsPlayer("Margo"), new HeartsPlayer("Marianne")];
        $this->myscore = new HeartsScore();
        $this->startingplayer = rand(0,3);
    }

    /**
     * @return int
     */
    public function getStartingplayer(): int
    {
        return $this->startingplayer;
    }

    /**
     * @param int $startingplayer
     */
    public function setStartingplayer(int $startingplayer)
    {
        $this->startingplayer = $startingplayer;
    }

    function nextStartingplayer(){
        $tempint = $this->getStartingplayer();
        $hallo = ($tempint++)%4;
        $this->setStartingplayer($hallo);
    }

    /**
     * @param array $myplayers
     * actually an array of four HeartsPlayer
     */
    public function setMyplayers(array $myplayers)
    {
        $this->myplayers = $myplayers;
    }

    /**
     * @return array
     * actually an array of four HeartsPlayer
     */
    public function getMyplayers() :array
    {
        return $this->myplayers;
    }


    function resetPlayers(){
        $this->setMyplayers([new HeartsPlayer("Janice"), new HeartsPlayer("Jean"), new HeartsPlayer("Margo"), new HeartsPlayer("Marianne")]);
    }

    /**
     * this is simpler than dealing random cards then and checking whether they have already been dealt
     * also now the cards are automatically sorted in each player,
     * first by suit and then by face
     * I will use this when playing a card in the correct suit,
     */
    function dealCards(){
        for ($i = 0; $i < 32; $i++){
            $this->dealCardToPlayer($i);
        }
        /*switch (true){
            case $this->myplayers[0]->countCards()==7:
                $this->myplayers[0]->addCard(31);
                break;
            case $this->myplayers[1]->countCards()==7:
                $this->myplayers[1]->addCard(31);
                break;
            case $this->myplayers[2]->countCards()==7:
                $this->myplayers[2]->addCard(31);

                break;
            case $this->myplayers[3]->countCards()==7:
                $this->myplayers[3]->addCard(31);
                break;
        }*/
    }

    function dealCardToPlayer(int $cardnumber){
        do {
            $r = rand(0,3);
        } while ($this->myplayers[$r]->countCards() > 7);
        $this->myplayers[$r]->addCard($cardnumber);

    }

    function printHands(){
        for ($i=0; $i<4; $i++){
            $name = $this->myplayers[$i]->getName();
            echo "$name has: ";
            $this->myplayers[$i]->printPlayerCards();
            echo "<br>";
        }
        echo "<br>";
    }

    function playHand(){
        for ($i=0; $i<8; $i++){
            $temp = $this->playSingleround();
            $this->printSingleRound($temp);
            $this->calcScore($temp);
        }
    }


    /**
     * ($i+$this->getStartingplayer())%4 shifts the player who starts the round,
     * since it contains %4, it will go from player 3 to player 0
     */



    function playSingleround() :array{
        $suit = 0;
        $myround = array();

        for ($i=0; $i<4; $i++){
            $myround[($i+$this->getStartingplayer())%4] = $this->myplayers[($i+$this->getStartingplayer())%4]->playCard($suit);
            if($suit == 0){
                $suit = $myround[($i+$this->getStartingplayer())%4]->getSuit();
            }
        }
        return $myround;
    }

    function printSingleRound(array $myround){
        for ($i=0; $i<4; $i++){
            $name = $this->myplayers[($i+$this->getStartingplayer())%4]->getName();
            echo "$name speelt: ";
            $myround[($i+$this->getStartingplayer())%4]->printCard();
        }
    }

    function calcScore(array $myround){
        $loser = $this->getStartingplayer();
        $points = 0;
        for ($i=0; $i<4; $i++){
            if ($myround[$loser]->getSuit() == ($myround[($i+$this->getStartingplayer())%4]->getSuit())and($myround[$loser]->getFace()<$myround[($i+$this->getStartingplayer())%4]->getFace())){
                $loser = ($i+$this->getStartingplayer())%4;
            }
            $points += $myround[$i]->getPoints();
        }
        $this->myscore->addPoints($loser, $points);
        $name = $this->myplayers[$loser]->getName();
        echo "$name has lost the round and scored $points points", "<br>";
        $this->nextStartingplayer();
    }

    function printScore(){
        echo "<br>";
        for($i=0; $i<4; $i++){
            $s = $this->myscore->getMypoints()[$i];
            $name = $this->myplayers[$i]->getName();
            echo "$name has $s points <br>";
        }
        echo "<br><br>";
    }
}