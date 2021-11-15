# TP Docker Volume Correction

## Exercice 1 : Nginx ressource static

### Docker run 

L'objectif de cet exerice est de séparer les ressources statiques de l'application. 
Cela permet, en entreprise, de gérer séparement le metier (Site web/Images etc..) et l'applicatif (serveur web/container). 

Le fait de pousser notre site web en tant que volume permet aussi d'amméliorer la QoS. Si notre service reçoit un pic de charge il est très simple de pousser un autre container en utilsant le même volume. A la place de devoir remonter un container avec les sources à l'intérieur, nous gagnons en temps et en énergie. 

Dans le cas suivant, nous avons monté le volume directement depuis le `docker run`, nous aurions pu créer un volume et binder le volume à notre container. 

**$PWD** permet de spécifier le dossier dans lequel nous nous trouvons actuellement. Lors de la création de volume, Docker a besoin des **abolutes paths** pour fonctionner.

![image](https://user-images.githubusercontent.com/51991304/141370380-03ae37f1-9289-4798-b523-c9704ef1763b.png)

A l'aide du volume nous avons donc créer un dossier synchrinisé entre le container et l'hôte. Le contenu du dossier `website` a été copié dans le container : 

![image](https://user-images.githubusercontent.com/51991304/141371438-a80ea486-5217-4d86-856b-9d8734840938.png)

![image](https://user-images.githubusercontent.com/51991304/141371669-426516e8-0a91-4293-afa7-d86c0547f9de.png)


Après lancement du container, les requêtes sont bien reçues. 

![image](https://user-images.githubusercontent.com/51991304/141370443-2cbbf663-ab2a-45fb-b1ef-9990ab98c645.png)

Le site Web apparait bien avec les ressources statiques spécifiées dans le volumes.

![image](https://user-images.githubusercontent.com/51991304/141370328-c8e12090-0e3f-4597-8e04-31382cbeb76a.png)
