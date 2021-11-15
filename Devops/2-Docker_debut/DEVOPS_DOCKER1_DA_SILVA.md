## Exercice 1: Running container

- Lancer un container Ubuntu en *background* (mode détaché) qui affiche la date toutes les 2 secondes.

![img](https://i.imgur.com/bpEkbST.png)

- Regarder les logs en temps réel depuis l'hôte

![img](https://i.imgur.com/hEnfYpa.png)

- Rentrer dans le container et afficher les processus

![img](https://i.imgur.com/joTWSgZ.png)
![img](https://i.imgur.com/0QXRc0x.png)

- Installer le paquet `figlet`dans le container

![img](https://i.imgur.com/oaRtSAc.png)

- Sortir gracieusement du container

![img](https://i.imgur.com/qY7xRaP.png)

- Afficher la différences avec l'image de base

![img](https://i.imgur.com/V7zKcEz.png)

- Transformer votre container en image

![img](https://i.imgur.com/g426JZB.png)

- Ajouter lui un tag de version **figlet**

![img](https://i.imgur.com/EFhhn88.png)


## Exercice 2 : Clean Container

- Afficher tout les containers de votre hôte
  - Running
  - Stopped
  - Exited

![img](https://i.imgur.com/iKgKA5w.png)

- Supprimer tout les containers stoppés

![img](https://i.imgur.com/fSHuGpK.png)


## Exercice 3 : AutoClean Container

- En **une** commande il faut : 
  - Lancer un container ubuntu avec la commande d'affichage de l'heure toutes les 2
  - Afficher les logs sur l'hôte
  - Supprimer le container lorsqu'on exit le process

![img](https://i.imgur.com/G72H1i2.png)


## Exercice 4 : Serveur HTTPD

- Lancer un container Serveur web (httpd)

![img](https://i.imgur.com/qptFvpG.png)
![img](https://i.imgur.com/4wHmmKv.png)

- Depuis l'hôte lancer un `curl localhost`
  - Exliquez le résultat

![img](https://i.imgur.com/H6ReFLi.png)

Je me retrouve avec une connexion refusée.

- Récupérer l'adresse ip du container

![img](https://i.imgur.com/UxHN0qT.png)

- Lancer `curl <adresse container httpd>`

![img](https://i.imgur.com/tz8Xbsx.png)

- Créer un nouveau container Debian/Ubuntu

![img](https://i.imgur.com/jgGPra2.png)

- Exécuter le `curl <adresse container httpd>` après avoir installé l'outils
  - Exliquez le résultat 

![img](https://i.imgur.com/bLtyGNC.png)

## Bonus : Exercice 5 : Serveur HTTPD

- Lancer un container Serveur web (Apache,nginx) en **mode détaché**

![img](https://i.imgur.com/Bju3DMq.png)

  - Rendre le container accessible depuis le LAN d'Ynov



  - Faire tourner le serveur web sur le port 8080

![img](https://i.imgur.com/oOEIZbr.png)

  - Modifier la page d'accueil `index.html` depuis votre host.
