# principes-solid

## Strategy :
> Ne pas confondre l'utilisation de l'inversion de dépendance (reposant sur des interfaces) et le design pattern strategy.  

Le principe solid est utile lorsqu'on veut qu'un algorithme ne dépende plus d'une implementation concrete mais d'une interface.  
Il pourrait malgré cela n'y avoir qu'une seule implémentation de cette interface à tout moment de la vie du programme
exemple : On démare une partie de cartes en "séléctionnant" la belote. Plus tard on relance une partie de bataille corse. Mais les deux n'ont pas vocation a intervenir simultanément.

Le pattern Strategy s'appuis sur l'inversion de dépendance pour facilement changer de comportement; fournissant différentes implémentation au cours d'un "runtime". Cela implique :
1. de pouvoir fournir simultanément une "famille" d'algorithmes
2. de les encapsuler individuelement en tant qu'objet.
3. de les rendre interchangeables  

Ce design sert à changer le comportement (les règles du jeu) pendant l'execution. 
Exemple : Un joueur démare un jeu vidéo, sûr de lui, en mode hardcore. Mais baisse le niveau de difficulté à chaque rencontre avec un boss. 
> Un élément extérieur va intéragir sur une période qu'on ne peut pas prévoir

## Lancement de l'application
> Étape 1 : [Installer php](https://thishosting.rocks/install-php-on-ubuntu/)

> Étape 2 : Lancer la commande à la racine du projet : 
```
    php Main.php
```
> Affichage en console
```
--------------- Simulation Economique ---------------
|                                                   |
|                        Menu                       |
|                       ******                      |
|                                                   |
| - Configuration des stratégies - CLI : option     |
| - Lancer la simulation         - CLI : start      |
| - Quitter                      - CLI : stop       |
|                                                   |
---------------           🖥          ---------------
CLI : 

--------------- Simulation Economique ---------------
|                                                   |
|            Lancement de la simulation             |
|           ****************************            |
|                                                   |
| - Indice de GINI avant la simulation :            |
| => 0.16                                           |
|                                                   |
| - Indice de GINI après la simulation :            |
| => 0.4                                           |
|                                                   |
| - Retour   - CLI : menu                           |
| - Relancer - CLI : start                          |
| - Quitter  - CLI : stop                           |
|                                                   |
---------------           🖥          ---------------
Avant l'itération nous avons une inégalité très faible avec un indice de gini d'environ 16 % 

Après l'itération nous avons une inégalité faible avec un indice de gini d'environ 40 % 

CLI : 
```

## Php :

Depuis php 7.4 il est possible de choisir entre un typage fort ou faible.
```php
declare(strict_types = 1);
```
Cette instruction impose au code du fichier un typage fort.