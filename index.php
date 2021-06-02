<?php

require_once 'vendor/autoload.php';

    $game=new BeeGame\Entity\Game(1,5,8);
    $game->start();
    foreach ($game->bees as $bee): ?>
                <div>
                    <?php echo $bee->getType(); ?><br />
                    <?php echo $bee->getHealthPoints(); ?> HP <br />                    
                    <?php echo $bee->getHitPoints(); ?> damage <br />
                    <?php echo $bee->getStatus(); ?>
                </div>
		<?php	endforeach; 

