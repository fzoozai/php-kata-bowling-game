<?php

class BowlingGame
{
    protected $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {

            if ($this->isSpare($roll)) {
//                then we got a spare.
                $score += 10 + $this->rolls[$roll + 2];
            } else {

                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            }
            $roll += 2;
        }

            return $score;
        }

    /**
     * @param $roll
     * @return bool
     */
    public function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

}
