# BeeGame
Bee Game is a PHP web application that allows you to play a simple game with different types of bees. The goal of the game is to hit the bees and reduce their hit points until they are defeated. The game follows specific rules for each type of bee, including the Queen, Workers, and Scouts.


BEE GAME 

Ce projet est une application PHP qui permet de jouer au jeu Bee Game. Le jeu consiste à attaquer des abeilles et à réduire leurs points de vie jusqu'à ce qu'elles soient toutes éliminées. Le jeu suit les règles suivantes :


#Il existe 3 types d'abeilles : 

    La Reine : 
        Possède 100 pts de vie 
        Perd 15 points de vie par attaque
        Quand la Reine est morte, toutes les autres abeilles perdent tous leurs points de vie
    
    Les Ouvrières : 
        Possède 100 pts de vie
        Perd 20 pts de vie par attaque
        Il y en a 5 au départ

    Les sentinelles :
        Possède 30 pts de vie
        Perd 15 pts de vie par attaque 
        Il y en a 8 au départ


#Gameplay : 

    L'application web présente une interface où vous pouvez jouer au jeu. Voici les fonctionnalités fournies par l'interface :

        Liste des abeilles avec leur type (Reine, Ouvrière, Éclaireuse) et leurs points de vie restants.
        Un bouton "Attaquer" pour frapper une abeille au hasard.

    Lorsque vous cliquez sur le bouton "Attaquer" :

        Une abeille aléatoire est sélectionnée.
        Les dégâts appropriés sont déduits de ses points de vie.

    Veuillez noter :

        Si une abeille a épuisé tous ses points de vie, elle ne peut pas être sélectionnée à nouveau.
        Lorsque toutes les abeilles ont épuisé leurs points de vie, le jeu doit pouvoir se réinitialiser pour une autre manche.

#Installation et exécution :

    Pour exécuter l'application localement, suivez les étapes suivantes :

        Assurez-vous que vous avez PHP installé sur votre machine.
        Clonez ou téléchargez ce dépôt sur votre machine.
        Ouvrez une console ou un terminal et accédez au répertoire du projet.
        Exécutez la commande php -S localhost:8000 pour démarrer le serveur web intégré de PHP.
        Ouvrez votre navigateur et accédez à l'URL http://localhost:8000 pour jouer au jeu Bee Game.
