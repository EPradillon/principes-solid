<?php declare(strict_types = 1);
require_once('./Display.php');
require_once('./GiniGenerator.php');
require_once('./PopulationFactory.php');
require_once('./TransactionMacroniStrategy.php');
require_once('./TransactionRandomStrategy.php');
require_once('./InteractionNeighbourgStrategy.php');
require_once('./InteractionRandomStrategy.php');
require_once('./DistributionRandomStrategy.php');
require_once('./DistributionNormalStrategy.php');

class Main
{
    private Display $display;

    public function __construct()
    {
        $this->display = new Display();
    }

    /**
     * Get the value of display
     */ 
    public function getDisplay()
    {
        return $this->display;
    }
}

// Instanciation of different object which are necessary for app initialization
$main                  = new Main();
$populationFactory     = new PopulationFactory();
$giniGenerator         = new GiniGenerator($populationFactory);
$transactionMacroni    = new TransactionMacroniStrategy();
$transactionRandom     = new TransactionRandomStrategy();
$interactionRandom     = new InteractionRandomStrategy();
$interactionNeighbourg = new InteractionNeighbourgStrategy();
$distributionNormale   = new DistributionNormalStrategy();
$distributionRandom    = new DistributionRandomStrategy();

// Initialization of population
$giniGenerator->initializePopulation();

// Array which contain the default cli command
$arrayCli = [
    'menu'    => $main->getDisplay()->menuPanel(),
    'option'  => $main->getDisplay()->configurationPanel(),
    'distr'   => $main->getDisplay()->strategiesDistributionPanel(),
    'inter'   => $main->getDisplay()->strategiesInteractonPanel(),
    'trans'   => $main->getDisplay()->strategiesTransactionPanel(),
    'error'   => $main->getDisplay()->CliException(),
];

/********* Inialization of display rules **********/
$end = false;

echo $arrayCli["menu"];

while(!$end){
    $cli = readline("CLI : ");
    $cli = trim($cli);
    $cli == "stop" ? $end = true : $end = false;

    if($cli == 'inter1'){
        $giniGenerator->setInteractionStrategy($interactionRandom);
        $cli = 'option';
        $startegyName = "Stratégie d'intéraction random";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    } elseif($cli == 'inter2'){
        $giniGenerator->setInteractionStrategy($interactionNeighbourg);
        $cli = 'option';
        $startegyName = "Stratégie d'intéraction voisin";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    } elseif($cli == 'trans1'){
        $giniGenerator->setTransactionStrategy($transactionRandom);
        $cli = 'option';
        $startegyName = "Stratégie de transaction random";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    } elseif($cli == 'trans2'){
        $giniGenerator->setTransactionStrategy($transactionMacroni);
        $cli = 'option';
        $startegyName = "Stratégie de transaction macronienne";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    } elseif($cli == 'distr1'){
        $populationFactory->setDistributionStrategy($distributionNormale);
        $giniGenerator->initializePopulation();
        $cli = 'option';
        $startegyName = "Stratégie de distribution normale";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    } elseif($cli == 'distr2'){
        $populationFactory->setDistributionStrategy($distributionRandom);
        $giniGenerator->initializePopulation();
        $cli = 'option';
        $startegyName = "Stratégie de distribution random";
        $arrayCli['option'] = $main->getDisplay()->configurationPanel($startegyName);
    }
    
    $main->getDisplay()->clearConsole();
    
    if(!$end){
        if($cli == 'start'){
            $giniFirst = round($giniGenerator->evaluateWealth(),2);
            $giniGenerator->makeIteration(10000);
            $giniSecond = round($giniGenerator->evaluateWealth(),2);

            echo $main->getDisplay()->startSimulationPanel($giniFirst, $giniSecond);
        } elseif( in_array( $cli, array_keys($arrayCli)) ){     
            echo $arrayCli[$cli];
            $arrayCli['option'] = $main->getDisplay()->configurationPanel();
        } else {
            $main->getDisplay()->clearConsole();
            echo $arrayCli["error"];
        }
    }
}
/********* !Inialization of display rules **********/