<?php
session_start();

// Bee class representing each bee type
class Bee {
    public $type;
    public $hitPoints;
    public $maxHitPoints;

    public function __construct($type, $hitPoints) {
        $this->type = $type;
        $this->hitPoints = $hitPoints;
        $this->maxHitPoints = $hitPoints;
    }

    public function hit() {
        $damage = $this->getDamage();
        $this->hitPoints -= $damage;
        if ($this->hitPoints < 0) {
            $this->hitPoints = 0;
        }
        return $damage;
    }

    public function getDamage() {
        switch ($this->type) {
            case 'Queen':
                return 15;
            case 'Worker':
                return 20;
            case 'Scout':
                return 15;
        }
    }

    public function isDead() {
        return $this->hitPoints === 0;
    }
}

// Game class representing the game state
class Game {
    private $bees;

    public function __construct() {
        $this->bees = [
            new Bee('Queen', 100),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
        ];
    }

    public function getBees() {
        return $this->bees;
    }

    public function hitRandomBee() {
        $aliveBees = array_filter($this->bees, function ($bee) {
            return !$bee->isDead();
        });

        if (empty($aliveBees)) {
            $this->resetGame();
            return null;
        }

        $randomBeeKey = array_rand($aliveBees);
        $randomBee = $aliveBees[$randomBeeKey];
        $damage = $randomBee->hit();

        if ($randomBee->isDead()) {
            unset($this->bees[$randomBeeKey]);
        }

        if ($randomBee->type === 'Queen' && $randomBee->isDead()) {
            if (!$this->isQueenAlive()) {
                $this->resetGame();
                return null;
            }
        }

        return [
            'type'=> $randomBee->type,
            'damage' => $damage,
        ];
    }

    public function isQueenAlive() {
        foreach ($this->bees as $bee) {
            if ($bee->type === 'Queen' && !$bee->isDead()) {
                return true;
            }
        }
        return false;
    }

    public function resetGame() {
        $this->bees = [
            new Bee('Queen', 100),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Worker', 50),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
            new Bee('Scout', 30),
        ];
    }
}

// Check if the game is already initialized in the session
if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Game();
}

// Retrieve the game instance from the session
$game = $_SESSION['game'];

if (isset($_POST['hit'])) {
    $result = $game->hitRandomBee();
}

$_SESSION['game'] = $game;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bee Game</title>
</head>
<body>
    <h1>Bee Game</h1>
    <?php
    if (isset($result)) {
        if ($result === null) {
            echo '<p>All bees are dead. Game reset.</p>';
        } else {
            $beeType = ($result['type'] === 'Queen') ? 'Queen bee' : $result['type'] . ' bee';
            echo '<p>' . $beeType . ' hit for ' . $result['damage'] . ' damage.</p>';
        }
    }
    ?>
    <form method="post">
        <input type="submit" name="hit" value="Hit">
    </form>
    <h2>Bees</h2>
    <table>
        <tr>
            <th>Type</th>
            <th>Hit Points</th>
        </tr>
        <?php
        foreach ($game->getBees() as $bee) {
            echo '<tr>';
            echo '<td>' . $bee->type . '</td>';
            echo '<td>' . $bee->hitPoints . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
