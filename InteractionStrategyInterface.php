<?php declare(strict_types = 1);

/**
 * Interface de Interaction
 * 
 * Contrat entre l'application et le programmeur :
 * Toute forme d'interaction devra respecter les besoins définis au travers des signatures de cette interface.
 * 
 * Toute demande d'interraction entre deux individu respectera "l'inversion de dépendance" (le D de SOLID)
 * Il suffit d'appeler ce fichier en lieu et place de l'implémentation garantissant ainsi :
 *  1. la permutabilité de multiples façon de faire intéragir deux individu. 
 *  2. L'assurance que l'interaction respectera le contrat defini pour cette application.
 * 
 * @author Etienne Pradillon <epradillon@gmail.com> | Samir Founou <samir_615@live.fr>
 */
interface InteractionStrategyInterface {

    function selectTwoIndividual(Array $population): Array;
}
