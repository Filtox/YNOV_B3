# B3 TP GIT

## Exercice 1 : Authentification 

### Création Clefs SSH

![ssh_key_gen](https://i.imgur.com/LpA9gjE.png)

_Explication_ : ssh-keygen permet de créer une paire de clef SSH (Privée et publique). Sans arguments les clefs seront par défaut créer dans le dossier personnel de l'utilisateur.
On pousse la clef publique sur le service sur lequel on souhaite s'authentifier. Lors des connexions notre clef privée servira a nous authentifié grâce à la clef publique présente sur github. 

### Ajout Clef Publique sur Github

![ssh_key_gen](https://i.imgur.com/zcyiXwP.png)

_Explication_ : La clef publique a bien été enregistré sur Github. On peut voir qu'elle n'a jamais été utilisé encore. Une fois la clef enregistré on ne peut pas modifier les permissions donc il faut être vigilant lors de la création. 

### Paramètrage de Git 

![git_config](https://imgur.com/HXnvUlr.png)

_Explication_ : Paramétrage de git. Le flag `global` signifie que ces options (name et email) seront utilisé pour tout les repos git présent sur ma machine. On peut retrouver ces infos dans le fichier : `~/.gitconfig`. Des configurations sont possible uniquement pour un repo git il faut faire les modifications dans le fichier `/myrepo/.git/gitconfig`.


## Exercice 2 : Création d'un Repo Github

### Initialiser votre dépôt local

![git_init](https://imgur.com/9pb4NHj.png)

_Explication_ : Initialisation d'un repo git. Il s'agit d'un dossier Linux standard qui est maintenant suivi par Git grâce au dossier `.git`. Ce dossier contient toutes les informations du depot local et distant.  On voit que Git est sur la branche **master**. Il s'agit de la branch par défault de git.

![git_branch](https://imgur.com/D1gjHMa.png)

_Explication_ : Cependant il n'y a pas de remote paramétré encore donc pas de branch réellement configurée.


### Faire pointer le dépôt local sur un dépôt distant (Remote)

![git_url_ssh](https://imgur.com/Y5U1ga4.png)

_Explication_ : Nous avons poussé la clef SSH donc nous allons utiliser l'URL **ssh** pour se connecter à notre remote. 

![git_remote_add](https://imgur.com/4HoLHjq.png)

_Explication_ : Nous ajoutons le depot distant en tant que remote dans notre dossier git. Maintenant git sait sur quel repository pousser lors de nos commits.


### Vérifier le dépôt distant

![git_remove_-v](https://imgur.com/4HoLHjq.png)

_Explication_ : Nous pourrons utiliser le nom `origin` ou l'URL

### Pull le repository

![git_pull_origin main](https://imgur.com/hGX0YmY.png)

_Explication_ : Pour puller un remote il faut spécifier le nom du remote ansi que la branche. Cependant nous avons une disparité entre le remote et le local. La branche sur le remote est `main` (Pour Github main est la branhce par défault) et en local nous avons `master`.
Lorsque nous allons poussé nous allons donc créer une nouvelle branche sur le remote. 
Pour pallier à cet effet nous aurions pu créer une nouvelle branche *main* avant de pull le repo. Ou lors de l'init nous aurions pu initialiser le repo avec la branche par default main : `git init -b main`

## Exercice 3 : Modification du Projet CLI

### Modifier un fichier déjà existant
#### Ajouter le port 2222 pour l'host Tyrell

![modfif](https://imgur.com/0j2sd21.png)

#### Set le niveau de log à INFO pour tout les hosts finissant en ell

![mofig](https://imgur.com/UmqdWmk.png)

### Consulter le statut et les différences et Commiter vos modifications

![commit_cycle](https://imgur.com/aPxVqYr.png)

_Explication_ : voici un cycle par default pour faire des modifs dans un projet git.

![git_push](https://imgur.com/GwMpMnG.png)

_Explication_ : Git push permet de pousser nos commits locaux sur le remote en spécifiant la branche. 

![merge_request](https://imgur.com/7hVvkbm.png)

_Explication_ : Une merge request permet de fusionner 2 branches git après avoir revu les modifications. La merge request permet aussi de valider du code avant de le pousser en production.

### Ajouter un fichier diff.txt et commencer à le tracker
#### Expliquer rapidement la différence entre git pull et git fetch

![diff_txt](https://imgur.com/XVGzeWB.png)


![git_add](https://imgur.com/4SB8BgH.png)

_Explication_ : Grâce à git add on peut ajouter spécifiquement un fichier au suivi par git. Ces fichiers seront maintenant considéré comme partie du projet et seront affecté par chaque action git. 

### Pousser vos modifications

![git_checkout_main](https://imgur.com/kHh6cg8.png)

_Explication_ : Git checkout permet de basculer d'une branche à une autre. Le travail sous branche permet de travailler parralèlement sans toucher à notre version en production

![git_branch](https://imgur.com/3fLX0Ua.png)

_Explication_ : Permet d'afficher les différentes branches de notre projet

![git_pull_main](https://imgur.com/lOpBQdY.png)

_Explication_ : Permet de tirer le code présent sur le remote d'une branche spécifique. Il faut prendre pour reflexe de tirer régulièrement le code de la branche de production lors de la création d'une nouvelle branche.

![git_push_main](https://imgur.com/0b2ZD1n.png)

_Explication_ : Permet de pousser du code sur notre remote. Il faut préciser la branche en upstream sur le repo local. Git nous l'indique de toutes façons.

## Exercice 4 : Modification du projet GUI
### Modifier le fichier config en se connectant sur l'interface Github 

![add_stark](https://imgur.com/0tytrs4.png)

## Exercice 5 : Branching et Merging
### Pull le repo 

![git_pull](https://imgur.com/9kDXjj5.png)

_Explication_ : La bonne pratique lors de developpement d'un projet est de pull la branche main/master pour être sur de travailler sur un repo à jour.
### Assurer vous d'avoir un repo à jour

![git_status](https://imgur.com/AXiZMJ7.png)

_Explication_ : Normalement une fois qu'on pull un projet à jour notre status est propre.
### Créer une nouvelle branche et basculer dessus
![git_checkout](https://imgur.com/jgFoLOR.png)

_Explication_ : git checkout -b permet de créer et de basculer sur une branche directement, sinon nous aurions pu créer la branche avec **git branch**

### Modifier la configuration SSH

![modif](https://imgur.com/4vngXe6.png)


### Commiter et pousser la modification dans la nouvelle branche

![git_push](https://imgur.com/VljdXqh.png)

_Explication_ : `git diff` permet de voir les modifications sur les fichiers locaux dans une branche donnée.

### Créer une Pull Request sur Github

![merge_request](https://imgur.com/VN9CycW.png)

_Explication_ : Une pull request de Github est équivalent à une merge request sur Gitlab

### Merger les 2 branches sur votre repo. (Avec les modifications de votre binome)

![merge](https://imgur.com/Lj63DEs.png)

_Explication_ : Les pull requests permettent de déclencer des pipelines. Cependant ici ce n'est pas le cas 

![delet_branch](https://imgur.com/TdHnH0g.png)

_Explication_ : Lors d'une pull request nous pouvons supprimer la branche qui a servit à pousser les modifs pour éviter d'avoir trop de branches sur des projets volumineux.

![delete_branch2](https://imgur.com/3vEY0YX.png)



