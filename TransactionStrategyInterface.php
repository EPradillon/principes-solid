<?php declare(strict_types = 1);

/**
 * Interface de Transaction
 * 
 * Contrat entre l'application et le programmeur :
 * Toute forme de transaction devra respecter les besoins définis au travers des signatures de cette interface.
 * 
 * Tout appel d'une transaction respectera "l'inversion de dépendance" (le D de SOLID)
 * Il suffit d'appeler ce fichier en lieu et place de l'implémentation garantissant ainsi :
 *  1. la permutabilité de multiples façon d'effectuer une transaction. 
 *  2. L'assurance que la transaction respectera le contrat defini.
 * 
 * @author Etienne Pradillon <epradillon@gmail.com> | Samir Founou <samir_615@live.fr>
 */
interface TransactionStrategyInterface {

    function makeTransaction(Array $population): Array;
}