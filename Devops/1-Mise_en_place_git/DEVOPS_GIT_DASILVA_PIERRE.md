
## Exercice 1: Authentification

- Générer une paire de clef SSH

![img](https://i.imgur.com/vKjdyUI.png)

- Pousser votre clef publique dans votre profile Github

![img](https://i.imgur.com/z990nDw.png)

- Configurer votre git local en rajoutant
  - username
  - email

![img](https://i.imgur.com/tjnxVil.png)

## Exercice 2 : Création d'un Repo Github

- Initialiser votre dépôt local

![img](https://i.imgur.com/ofjunwb.png)

- Faire pointer le dépôt local sur un dépôt distant (Remote)

![img](https://i.imgur.com/XDDxO1H.png)

- Vérifier le dépôt distant

![img](https://i.imgur.com/dDelCL0.png)

- Cloner le repository

![img](https://i.imgur.com/D9AKHg6.png)

## Exercice 3 : Modification du Projet CLI

- Modifier un fichier déjà existant
  - Ajouter le port 2222 pour l'host **Tyrell**
  - Set le niveau de log à `INFO` pour tout les hosts finissant en **ell**

![img](https://i.imgur.com/IJmN8yP.png)

- Consulter le statut et les différences

![img](https://i.imgur.com/GpBrMlm.png)

- Commiter vos modifications

![img](https://i.imgur.com/6LbNsAj.png)

- Ajouter un fichier `diff.txt` et commencer à le tracker

![img](https://i.imgur.com/tjnxVil.png)

  - Expliquer rapidement la différence entre `git pull` et `git fetch`

La commande git pull est en fait la combinaison de deux autres commandes, git fetch suivie de git merge. git-fetch télécharge les objets et références depuis un autre dépôt.

- Pousser vos modifications

![img](https://i.imgur.com/GMyrP47.png)

## Exercice 4 : Modification du projet GUI

- Modifier le fichier `config` en se connectant sur l'interface Github
  - Rajouter :
```sh
Host stark
    HostName 127.0.0.1
    User john
    Port 6666
    IdentityFile ~/.ssh/stark.key
```

![img](https://i.imgur.com/Qu0eULg.png)

## Exervice 5 : Branching et Merging

- Cloner le repo de votre voisin
- Assurer vous d'avoir un repo à jour
- Créer une nouvelle branche et basculer dessus
  - Branch name : change_throne 

![img](https://i.imgur.com/9QMEOom.png)

- Modifier la configuration SSH 
  -  Modifier le user `daenerys` pour `john`dans l'host `targaryen`
  -  Supprimer le user `john`dans l'host `stark`

![img](https://i.imgur.com/TM4Wi0E.png)

-  Commiter et pousser la modification dans la nouvelle branche

![img](https://i.imgur.com/YK41XQn.png)

-  Créer une Pull Request sur Github

![img](https://i.imgur.com/uw0ipZK.png)
![img](https://i.imgur.com/39WHxJ2.png)

-  Merger les 2 branches sur votre repo. (Avec les modifications de votre binome)

![img](https://i.imgur.com/hDJMBVt.png)