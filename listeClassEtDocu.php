<?php

/**
 * Service de simulation d'échange monétaire
 * 
 * 1) A la création du service on defini une manière de créer la population
 * Il est possible de choisir le nombre d'individus
 * Au cours de la simulation il est possible de changer de protocole de transaction ainsi que la "portée" des échanges (entre proches ou non)
 */
class Service {

    /**
     * Population construite pour la simulation
     */
    private $population;

    /**
     * contructeur de population
     */
    private PopulationFactory $populationFactory;

    /**
     * Définition de la stratégie d'interaction
     */
    private InteractionStrategyInterface $interactionStrategy;

    /**
     * Définition de la stratégie de transaction
     */
    private TransactionStrategyInterface $transactionStrategyInterface;


    public function __construct(PopulationFactory $populationFactory) {
        $this->populationFactory = $populationFactory;
    }

    /**
     * Création de
     *
     * @param integer $populationSize
     * @return void
     */
    public function InitiatePopulation(int $populationSize)
    {
        $this->population = $this->populationFactory->createPopulation($populationSize);
    }


}




interface PopulationFactoryInterface {
    public function createPopulation(int $populationSize): Array;
}

/**
 * Pour simplifier on a définie que la factory ne retournerait un array et non une instance d'objet Population
 * Si jamais on doit changer ce comportement il faudra le faire ici.
 */
class PopulationFactory implements PopulationFactoryInterface{
    
    public function setStrategy(string $distribution)
    {
        $this->populationFactory->setStrategy($distribution);
    }

    public function createPopulation(int $populationSize): Array
    {
        $population = [];
        $population[]= 500;
        return $population;
    }
}

/**
 * Interface de Distribution des richesses
 * 
 * Contrat entre l'application et le programmeur :
 * Toute forme de Distribution des richesses devra respecter les besoins définis au travers des signatures de cette interface.
 * 
 * Tout calcul initial de richesse des individus respectera "l'inversion de dépendance" (le D de SOLID)
 * Il suffit d'appeler ce fichier en lieu et place de l'implémentation garantissant ainsi :
 *  1. la permutabilité de multiples façon de definir une richesse initiale au sein d'une population. 
 *  2. L'assurance que toute distribution respectera le contrat defini pour cette application.
 * 
 * @author Etienne Pradillon <epradillon@gmail.com> | Samir Founou <samir_615@live.fr>
 */
interface DistribInterface {

}
class FirstDistribution implements DistribInterface {

}

