*TP réalisé par Founou Samir et Étienne Pradillon*

# TP - Principes SOLID

## Lancement de l'application
> Installer php
<details>
    <summary>Details</summary>

Update Ubuntu  
`apt-get update && apt-get upgrade`

Install PHP 7.4  
`apt-get install php`

This command will install PHP 7.4, as well as some other dependencies.

To verify if PHP is installed, run the following command:

`php -v`

You should get a response similar to this:

`PHP 7.4.3 (cli) (built: Oct 6 2020 15:47:56) ( NTS )`

And that’s it. PHP 7.4 is installed on your Ubuntu 20.04 server.
</details>  

<br>

> Lancer la commande à la racine du projet : 
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
```
- `start` permet de faire tourner rapidement une simulation sans s'occuper des parametres.
- `stop` fait exactement ce qu'on imagine.
- `option` Propose de configurer les différentes strategies de simulation.

>Changer de méthode de distribution implique de recréer la population. A part cela toute modification peut ensuite être testé sur la même propulation que précédement. Ainsi passer d'une serie d'itération en mode "transactionRandom" puis en "transaction Macron" va donner un résultat de répartition de richesse très fluctuant.

```
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
CLI : 
```
>Avec une répartition respectant la loi normale (configuration par default) nous avons une inégalité très faible avec un indice de gini d'environ 16 % (avant une quelconque forme d'échange)


>Après l'itération (avec une configuration par default d'échange aléatoire avec des individus aléatoire) nous avons une inégalité mpyenne-faible avec un indice de gini d'environ 40 %.
## Php :

Depuis php 7.4 il est possible de choisir entre un typage fort ou faible.
```php
declare(strict_types = 1);
```
Cette instruction impose au code du fichier un typage fort.

## Conception de l'application
> Diagramme de classe
![class diagram](https://github.com/EPradillon/principes-solid/blob/main/class_diagram.png?raw=true)


# Design utilisés :

## Factory :
La `PopulationFactory.php` est ici résponsable de la création de la population.  
Cela permet de respecter le "Single responsability principle" : Il y a une classe dont la préoccupation est la création des individus qui constituerons l'échantillon de test. C'est ici aussi que nous appelons les différents aglorithmes de calcul d'initialisation des richesses. 

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

## Façade

On a décidez d'utiliser le service comme une façade qui présenterait des méthodes (à l'image d'une api) aux clients qui consomme le calcul de gini.

## Inversion de dépendance :
Tous nos appels sont matérialisé par la demande d'une interface :
"on demande une implémentation répondant à nos attentes" et non nécéssairement une implémentation spécifique.
Le haut niveau ne dépend ainsi plus du "bas niveau" = inversion de la dépendance.
