<?php
require_once('./Display.php');
require_once('./GiniGenerator.php');
require_once('./PopulationFactory.php');
require_once('./TransactionMacroniStrategy.php');

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

$main              = new Main();
$populationFactory = new PopulationFactory();
$giniGenerator     = new GiniGenerator($populationFactory);
$transactionMacro  = new TransactionMacroniStrategy();

$giniGenerator->initializePopulation();
var_dump($giniGenerator->getPopulation());
var_dump($giniGenerator->evaluateWealth());
$giniGenerator->makeIteration(10000);
var_dump($giniGenerator->evaluateWealth());
$giniGenerator->setTransactionStrategy($transactionMacro);
$giniGenerator->makeIteration(10000);
var_dump($giniGenerator->evaluateWealth());
// var_dump($giniGenerator->getTransactionStrategy());
// var_dump($giniGenerator->getPopulation());



// $arrayCli = [
//     'menu'   => $main->getDisplay()->menuPanel(),
//     'option' => $main->getDisplay()->configurationPanel(),
//     'distr'  => $main->getDisplay()->strategiesDistributionPanel(),
//     'inter'  => $main->getDisplay()->strategiesInteractonPanel(),
//     'trans'  => $main->getDisplay()->strategiesTransactionPanel(),
//     'start'  => $main->getDisplay()->startSimulationPanel($giniFirst, $giniSecond),
//     'error'  => $main->getDisplay()->CliException(),
// ];

// $end = false;

// echo $arrayCli["menu"];

// while(!$end){
//     $cli = readline("CLI : ");
//     $cli = trim($cli);
//     $cli == "stop" ? $end = true : $end = false;
    
//     $main->getDisplay()->clearConsole();
    
//     if(!$end){
//         if( in_array( $cli, array_keys($arrayCli)) ){
//             echo $arrayCli[$cli];
//         } else {
//             $main->getDisplay()->clearConsole();
//             echo $arrayCli["error"];
//         }
//     }
// }





