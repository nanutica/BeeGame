<?php
namespace BeeGame\Entity;

class Game
{
	public $bees 		= array();
	protected $countQueenBee;
	protected $countWorkerBee;
	protected $countDroneBee;
	public $status;
	
	public function __construct(int $countQueenBee,int $countWorkerBee,int $countDroneBee)
	{
	    $this->countQueenBee = $countQueenBee;
	    $this->countWorkerBee = $countWorkerBee;
	    $this->countDroneBee = $countDroneBee;
	}
	public function start()
	{
		$this->resetGame();

		//add QueenBee
		for($q = 1; $q <= $this->countQueenBee; $q++){
		    $this->bees[] = new \BeeGame\Entity\QueenBee();
		}

		//add WorkerBee
		for($w = 1; $w <= $this->countWorkerBee; $w++){
			$this->bees[] = new \BeeGame\Entity\WorkerBee();
		}
    
		//add DroneBee
		for($d = 1; $d <= $this->countDroneBee; $d++){
		    
		    $this->bees[] = new \BeeGame\Entity\DroneBee();
		}
		
	}

	/**
	 * reset the game 
	 */
	public function resetGame()
	{	
		$this->bees = array();
    }

	/**
	 * reduce health points
	 */
	
	public function hit()
	{
	    if (!count($this->bees)) {
	        return array('gameStatus'=>'Game over');
	    }
	    
	    $bee = $this->getRandomBee();
	    $bee->setHealthPoints($bee->getHealthPoints() - $bee->getHitPoints());
	    
	    if ($bee instanceof QueenBee && !$bee->getAlive()) {
	        $this->countQueenBee--;
	    }
	    
	    if ($this->countQueenBee === 0) {
	        $this->killAllBees();
	        return array('gameStatus'=>'Game over');
	    }
	    return array('gameStatus' => 'Game playing','swarm' => $this->bees,'beeType' => $bee->getType(),'damage' => $bee->getHitPoints());
	    
	}
	private function killAllBees()
	{
	    foreach ($this->bees as $bee) {
	        $bee->setHealthPoints(0);
	    }
	}
	
	private function getRandomBee()
	{
	    do {
	        $bee = $this->bees[array_rand($this->bees,1)];
	    } while (!$bee->isAlive());
	    
	    return $bee;
	}
	public function isPlaying()
	{
	    $this->status = false;
	    
	    foreach ($this->bees as $bee) {
	        if ($bee->isAlive()) {
	            $this->status = true;
	            break;
	        }
	    }
	    
	    return $this->status;
	}
}