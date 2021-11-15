## Exercice 1 : Faites parler votre container

Cowsay man : `https://debian-facile.org/doc:jeux:cowsay`
Cowsay s'installe dans `/usr/games/cowsay`

- Créer un nouveau dossoier `cowsay`

![img](https://i.imgur.com/7KcuAEC.png)

La commande mkdir sert à créer un dossier.

- Créer un Dockerfile qui permet de :
  - docker run --rm cowsay Hello_World !
  - docker run --rm cowsay -f stegosaurus Ynov B3

![img](https://i.imgur.com/Kbu3052.png)

L'argument **FROM** permet de spécifier avec qu'elle image on va construire notre conteneur.
L'instruction **RUN** permet d'éxécuter une commande.
**ENTRYPOINT** permet de configurer le conteneur qui va être lancé comme un éxecutable.

![img](https://i.imgur.com/Qd92TWD.png)

- Faut-il utiliser **CMD** ou **ENTRYPOINT** ? 

Il faut utiliser **ENTRYPOINT** car cette commande permet de configurer le conteneur que l'on va éxecuter comme un éxecutable plus tard.
**CMD** est utilisé pour spécifier des valeurs pour un conteneur déjà éxecuté.


## Exercice 2 : Dockerfile WordSmith

Le but de l'exercice est d'écrire les Dockerfiles pour les 3 containers.

### web

C'est un serveur web en Go. Pour compiler du Go, on peut utiliser l'image `golang`, ou bien installer les paquetages Go dans n'importe quelle image de base.

Tout le code est contenu dans un fichier source unique (`dispatcher.go`), et se compile de la manière suivante :

```
go build dispatcher.go
```

Cela produit un exécutable appelé `dispatcher`, qui se lance comme suit :

```
./dispatcher
Listening on port 80
```

Le répertoire appelé `static` doit être dans le répertoire courant
lors du lancement du serveur.

Informations supplémentaires :

- le serveur écoute sur le port 80
- le compilateur go n'est plus nécessaire une fois le programme compilé


### words

C'est un serveur API REST en Java. Il se compile avec maven.

Sur une distribution Debian/Ubuntu, on peut installer Java et maven comme suit :

```
apt-get install maven openjdk-8-jdk
```

Voici la commande qui permet d'invoquer maven pour compiler le programme :

```
mvn verify
```

Le résultat est un fichier appelé `words.jar` placé dans le répertoire `target`.

Le serveur se lance ensuite avec la commande suivante :
```
java -Xmx8m -Xms8m -jar words.jar
```

(En se plaçant dans le répertoire où se trouve `words.jar`.)

Informations supplémentaires :

- le serveur écoute sur le port 8080
- pour la compilation il faut les paquetages maven et openjdk-8-jdk
- pour l'exécution il faut le paquetage openjdk-8-jdk (maven n'est pas nécessaire)


### db

C'est une base de données PostgreSQL.

La base de donnée doit être initialisée avec le schéma (création de
la base et des tables) et les données (utilisées par l'application).

Le fichier `words.sql` contient les commandes SQL nécessaires.

```
# cat words.sql
CREATE TABLE nouns (word TEXT NOT NULL);
CREATE TABLE verbs (word TEXT NOT NULL);
CREATE TABLE adjectives (word TEXT NOT NULL);

INSERT INTO nouns(word) VALUES
  ('cloud'),
  ('elephant'),
  ('gø language'),
  ('laptøp'),
  ('cøntainer'),
  ('micrø-service'),
  ('turtle'),
  ('whale'),
  ('gøpher'),
  ('møby døck'),
  ('server'),
  ('bicycle'),
  ('viking'),
  ('mermaid'),
  ('fjørd'),
  ('legø'),
  ('flødebolle'),
  ('smørrebrød');

INSERT INTO verbs(word) VALUES
  ('will drink'),
  ('smashes'),
  ('smøkes'),
  ('eats'),
  ('walks tøwards'),
  ('løves'),
  ('helps'),
  ('pushes'),
  ('debugs'),
  ('invites'),
  ('hides'),
  ('will ship');

INSERT INTO adjectives(word) VALUES
  ('the exquisite'),
  ('a pink'),
  ('the røtten'),
  ('a red'),
  ('the serverless'),
  ('a brøken'),
  ('a shiny'),
  ('the pretty'),
  ('the impressive'),
  ('an awesøme'),
  ('the famøus'),
  ('a gigantic'),
  ('the gløriøus'),
  ('the nørdic'),
  ('the welcøming'),
  ('the deliciøus');
```

Informations supplémentaires :

- il est fortement conseillé d'utiliser l'image officielle PostgreSQL qui se trouve sur le Docker Hub (elle s'appelle `postgres`)
- sur la [page de l'image officielle](https://hub.docker.com/_/postgres) sur le Docker Hub, vous trouverez une documentation abondante; la section "Initialization scripts" est particulièrement utile pour comprendre comment charger le fichier `words.sql`
- il est conseillé de protéger l'accès à la base avec un mot de passe, mais dans le cas présent, on acceptera de se simplifier la vie en autorisant toutes les connexions (en positionnant la variable `POSTGRES_HOST_AUTH_METHOD=trust`)


## Exercice 3: Run Flask App 

-  Créer le Dockerfile dans le dossier microblog qui va permettre de faire tourner l'application Flask : 
  -  Utilisez l'image `python:3-alpine` ou une image de base `Ubuntu`et installer Python
  -  Flask utilise une variable d'environnement `FLASK_APP`avec le nom du fichier Python de l'application. 
  -  Installer flask dans votre container : `requirements.txt`. Pensez à utiliser la fonction de cache de Docker
  -  Exposer le port 5000
  -  Liser le fichier `boot.sh` et faites tourner l'application Flask en PROD. 
  -  Lancez l'app avec le fichier `boot.sh`

![img](https://i.imgur.com/3k1z9Lp.png)

- Construire l'image

![img](https://i.imgur.com/OSNAjeP.png)

- Lancer le container en publiant un port de votre hôte.

![img](https://i.imgur.com/WfiTiSP.png)

- Accéder à http://localhost:5000

![img](https://i.imgur.com/RiO1Wg3.png)


### Exercice 3.5 FALCULTATIF :

- Construisez un second Dockerfile pour une nouvelle application microblog (Dupliquer le dossier microblog)
  - Remplacer le script de boot par  : 
```sh
#!/bin/bash

# ...

set -e
if [ "$APP_ENVIRONMENT" = 'DEV' ]; then
    echo "Running Development Server"
    exec flask run -h 0.0.0.0
else
    echo "Running Production Server"
    exec gunicorn -b :5000 --access-logfile - --error-logfile - app_name:app
fi
```
- Déclarer la variable d'environnement `APP_ENVIRONMENT` à `PROD`par défault
- Construisez l'image
- Déployer **2** containers. Un de PROD et un de DEV sur un port différent. 

## Exercice 4 : Healthcheck 

- Créer un nouveau dossier `Healthcheck`
- Créer un Dockerfile pour déployer l'application `app.py`
  - Lancez l'application avec `python app.py`
- Rajouter un `HEALTHCHECK` dans le Dockerfile pour monitorer l'état de santé du container
  - Voici la commande du HEALTHCHECK `curl --fail http://localhost:5000/health || exit 1`  
- Expliquer le code Python ainsi que le lien avec l'instruction HEALTHCHECK de votre Dockerfile


