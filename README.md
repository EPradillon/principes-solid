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



 
## Php :

Depuis php 7.4 il est possible de choisir entre un typage fort ou faible.
```php
declare(strict_types = 1);
```
Cette instruction impose au code du fichier un typage fort.