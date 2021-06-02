<?php
namespace BeeGame\Tests;


use PHPUnit\Framework\TestCase;
use BeeGame\Entity\Game;

class GameTest extends TestCase
{
    public function testStart()
    {
        
        $game = new Game(1,5,8);       
        $game->start();
        $this->assertCount(14, $game->bees);
    }
}
?>