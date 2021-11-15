## Exercice 1: Running container

- Lancer un container Ubuntu en partageant le namespid `PID` avec l'hôte

![img](https://i.imgur.com/BZ4OZPJ.png)

L'option `-d` permet de lancer le conteneur en mode détaché, et l'option `--pid` permet de fournir un nom à l'espace de travail de ce conteneur. L'argument `host` précise à `--pid` qu'il faut utiliser le PID de l'hote dans le conteneur. L'option `-t` crée un pseudo terminal.

Source : https://docs.docker.com/engine/reference/run/#pid-equivalent

- Créer une variable d'environnement dans votre container

![img](https://i.imgur.com/XMByVtZ.png)

Il faut faire `docker exec` afin de rentrer dans le conteneur tout en lui indiquant avec l'argument `-e` que l'on veut lui inscrire une variable d'environnement nommée `VAR=1` puis l'id du conteneur et on finit par lui indiquer que l'on veut un terminal en `bash`.
Une fois dan sle conteneur, il faut vérifier que la variable soit bien prise en compte avec la commande `env`.

Source : https://docs.docker.com/engine/reference/commandline/exec/

- Créer un processus sur le container. Exemple : Une boucle while infinie qui affiche l'heure.

![img](https://i.imgur.com/E9ZF3TU.png)



- Retrouver ce processus depuis votre hôte et afficher la variable d'environnement. 

