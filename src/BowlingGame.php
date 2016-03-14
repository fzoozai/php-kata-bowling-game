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

        for($frame = 1; $frame <= 10; $frame++){
            $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            $roll += 2;
        }

        return $score;
    }




}
