<?php
require_once('./Display.php');
require_once('./GiniGenerator.php');
require_once('./PopulationFactory.php');
require_once('./TransactionMacroniStrategy.php');
require_once('./TransactionRandomStrategy.php');
require_once('./InteractionNeighbourgStrategy.php');
require_once('./InteractionRandomStrategy.php');

class Main
{
    private Display $display;

    private GiniGenerator $giniGenerator;

    private float $giniIndex;

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

    public function setGiniGenerator(GiniGenerator $giniGenerator)
    {
        $this->giniGenerator = $giniGenerator;
    }

    /**
     * Get the value of giniIndex
     */ 
    public function getGiniIndex()
    {
        return $this->giniIndex;
    }

    /**
     * Set the value of giniIndex
     *
     * @return  self
     */ 
    public function setGiniIndex($giniIndex)
    {
        $this->giniIndex = $giniIndex;

        return $this;
    }
}

$main                  = new Main();
$populationFactory     = new PopulationFactory();
$giniGenerator         = new GiniGenerator($populationFactory);
$transactionMacroni    = new TransactionMacroniStrategy();
$transactionRandom     = new TransactionRandomStrategy();
$interactionRandom     = new InteractionRandomStrategy();
$interactionNeighbourg = new InteractionNeighbourgStrategy();
$distributionNormale   = new DistributionNormalStrategy();
$distributionRandom    = new DistributionRandomStrategy();

$giniGenerator->initializePopulation();

$arrayCli = [
    'menu'    => $main->getDisplay()->menuPanel(),
    'option'  => $main->getDisplay()->configurationPanel(),
    'distr'   => $main->getDisplay()->strategiesDistributionPanel(),
    'inter'   => $main->getDisplay()->strategiesInteractonPanel(),
    'trans'   => $main->getDisplay()->strategiesTransactionPanel(),
    'error'   => $main->getDisplay()->CliException(),
];

$end = false;

echo $arrayCli["menu"];

while(!$end){
    $cli = readline("CLI : ");
    $cli = trim($cli);
    $cli == "stop" ? $end = true : $end = false;

    if($cli == 'inter1'){
        $giniGenerator->setInteractionStrategy($interactionRandom);
    } elseif($cli == 'inter2'){
        $giniGenerator->setInteractionStrategy($interactionNeighbourg);
    } elseif($cli == 'trans1'){
        $giniGenerator->setTransactionStrategy($transactionRandom);
    } elseif($cli == 'trans2'){
        $giniGenerator->setTransactionStrategy($transactionMacroni);
    } elseif($cli == 'distr1'){
        $populationFactory->setDistributionStrategy($distributionNormale);
        $giniGenerator->initializePopulation();
    } elseif($cli == 'distr2'){
        $populationFactory->setDistributionStrategy($distributionRandom);
        $giniGenerator->initializePopulation();
    }
    
    $main->getDisplay()->clearConsole();
    
    if(!$end){
        if($cli == 'start'){
            $giniFirst = $giniGenerator->evaluateWealth();
            $giniGenerator->makeIteration(10000);
            $giniSecond = $giniGenerator->evaluateWealth();

            echo $main->getDisplay()->startSimulationPanel($giniFirst, $giniSecond);
        } elseif( in_array( $cli, array_keys($arrayCli)) ){     
            echo $arrayCli[$cli];
        } else {
            $main->getDisplay()->clearConsole();
            echo $arrayCli["error"];
        }
    }
}





