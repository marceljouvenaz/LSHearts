<?php


namespace MRJ\LSHearts;


class HeartsScore
{
    var $northpoints;
    var $eastpoints;
    var $southpoints;
    var $westpoints;

    /**
     * HeartsScore constructor.
     */
    function __construct()
    {
    }

    /**
     * @return integer
     */
    public function getNorthpoints(): int
    {
        return $this->northpoints;
    }

    /**
     * @return integer
     */
    public function getEastpoints(): int
    {
        return $this->eastpoints;
    }

    /**
     * @return integer
     */
    public function getSouthpoints(): int
    {
        return $this->southpoints;
    }

    /**
     * @return integer
     */
    public function getWestpoints(): int
    {
        return $this->westpoints;
    }

    /**
     * @param integer $eastpoints
     */
    public function setEastpoints(int $eastpoints)
    {
        $this->eastpoints = $eastpoints;
    }

    /**
     * @param integer $northpoints
     */
    public function setNorthpoints(int $northpoints)
    {
        $this->northpoints = $northpoints;
    }

    /**
     * @param integer $southpoints
     */
    public function setSouthpoints(int $southpoints)
    {
        $this->southpoints = $southpoints;
    }

    /**
     * @param integer $westpoints
     */
    public function setWestpoints(int $westpoints)
    {
        $this->westpoints = $westpoints;
    }
}