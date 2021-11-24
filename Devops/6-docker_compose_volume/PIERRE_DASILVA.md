## Exercice 1 : Wordpress

Vous souhaitez simplifier l'installation des Wordpress de vos clients.
   
Chaque client a besoin de : 
- une base de données MySQL ;
- le système de fichiers Wordpress.

Vous souhaitez faire en sorte que si le container se stop en cas de soucis, il se relance automatiquement. Pour que vous n'ayez pas besoin d'avoir à réaliser d'action. 

Dans votre premier service `db` il vous faudra : 

- qu'il redémarre automatiquement en cas de crash
- Faire un volume persistent pour sauvegarder les données du site Wordpress dans un fichier dédié pour un client
- Définir en tant que d'envvar le `Username`, `Password`, `Databse name`, `Root password`

Dans le second service `Wordpress` il faudra : 
- Le container WP doit démarrer si le container `db` démarre
- Le WP devra être accessible depuis le port 8000
- Il faudra renseigner en variable d'environnement les informations nécessaire pour se connecter à la base de données

Afin de pouvoir éxécuter la commande `docker-compose up`, il faut s'octoyer les droits d'éxécution.


![img](https://i.imgur.com/zfEtK7n.png)

Ensuite, il faut créer les volumes pour les deux images.


![img](https://i.imgur.com/DJlITd3.png)


![img](https://i.imgur.com/eCzXv5Z.png)

Maintenant, il faut créer le fichier YAML. Dedans, on va préciser les deux services que l'on a besoin : `db` et `wordpress`.
Il ne faut pas oublier d'indiquer le chemin absolu des deux volumes créés précédement, préciser que les deux services doivent redémarrer automatiquement avec `restart : always`, que le service `wordpress` dépend du service `db`.


![img](https://i.imgur.com/mrzBCTh.png)

Ensuite, on éxécute le fichier avec `docker-compose up`. On voit apparaitre les deux services juste au dessous de la commande.


![img](https://i.imgur.com/njxVavM.png)

## Exercice 2 : Stack ELKT

La stack Elastic permet de centraliser tout les logs de nos containers  au même endroit, nous allons la coupler à Trafiek pour faciliter la gestion de nos containers.

- Télécharger la configuration Filebeat : `curl -L -O https://raw.githubusercontent.com/elastic/beats/7.10/deploy/docker/filebeat.docker.yml`
- `mv filebeat.docker.yml filebeat.yml && chown root filebeat.yml`
- Rajouter au docker-compose existant le service trafiek
  - image: traefik:v2.3
  - command: --api.insecure=true --providers.docker
  - ports: 80 et 8080
  - volumes: /var/run/docker.sock:/var/run/docker.sock
- Expliquer en quelques mots le fichier `docker.sock`
- BONUS : Expliquez pourquoi le partage de ce fichier impacte la sécurité du serveur. 


![img](https://i.imgur.com/9sEx7oR.png)


![img](https://i.imgur.com/SFeWRkC.png)

docker.sock est le socket UNIX que le démon Docker écoute. C'est le point d'entrée principal de l'API Docker. Il peut également s'agir d'un socket TCP, mais par défaut pour des raisons de sécurité, Docker utilise par défaut le socket UNIX.

On ne doit pas monter docker.sock à l'intérieur d'un conteneur. Cela augmente la surface d'attaque, on doit donc faire attention on monte docker.sock dans un conteneur, des codes de confiance s'exécutent à l'intérieur de ce conteneur, sinon on peut compromettre notre hôte qui exécute le démon docker, car Docker lance par défaut tous les conteneurs en tant que root.

docker.sock a un groupe docker dans la plupart des installations afin que les utilisateurs de ce groupe puissent exécuter des commandes docker contre docker.sock sans autorisation root, mais les conteneurs docker réels obtiennent toujours l'autorisation root puisque le démon docker s'exécute efficacement en tant que root (il a besoin de l'autorisation root pour accéder à l'espace de noms et aux groupes de contrôle).

Source : https://stackoverflow.com/questions/35110146/can-anyone-explain-docker-sock

Elasticsearch est un moteur de recherche.

Filebeat est un agent de transfert léger qui permet de centraliser les logs et les fichiers.

Kibana est une interface utilisateur qui permet de visualiser les données Elasticsearch et de naviguer dans la Suite Elastic.

Traefik est un reverseproxy.
