<?php declare(strict_types = 1);

require_once("./InteractionStrategyInterface.php");
require_once("./TransactionStrategyInterface.php");

interface SimulationEconomicServiceInterface
{
    /**
     * Allow to initialize population
     *
     * @return void
     */
    public function initializePopulation() : void;

    /**
     * Allow to get population
     *
     * @return array
     */
    public function getPopulation() : array;

    /**
     * Allow to evaluate wealth
     *
     * @return float
     */
    public function evaluateWealth() : float;

    /**
     * Allow to make iteration
     *
     * @param integer $iteration
     * @return void
     */
    public function makeIteration(int $iteration) : void;

    /**
     * Allow to set interaction strategy
     *
     * @param InteractionStrategyInterface $interactionStrategy
     * @return void
     */
    public function setInteractionStrategy(InteractionStrategyInterface $interactionStrategy) : void;

    /**
     * Allow to set transaction strategy
     *
     * @param TransactionStrategyInterface $transactionStrategy
     * @return void
     */
    public function setTransactionStrategy(TransactionStrategyInterface $transactionStrategy) : void;
}