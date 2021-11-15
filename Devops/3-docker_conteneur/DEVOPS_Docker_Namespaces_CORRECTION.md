# Correction Docker Namespace

## Exercice 1 : 

L'objectif de cet exercice est de démontrer l'utilité des namespaces dans l'architecture des containers Docker.
Comme vu en cours, les namespaces sont un des principes d'isolation des processus qui sont à l'origine des containers.
Chaque namespaces (UTS,USER,PID etc...) permettent d'isoler des ressources (Utilisateurs, PID, hostname, point de montage etc..) entre différents processus sur une machine Linux.


Le flag `--pid=host` permet de partager le namespace **pid** entre l'hôte et le container.

![docker run ](https://i.imgur.com/nP8nPoM.png)

Le container ubuntu et notre hôte partagent le même namespace donc depuis le container nous pouvons voir et interargir avec les processus de l'ĥote.

Nous savons que le **PID 1** est important pour un container. Il s'agit du process lancé lors de l'appel d'une image via l'instruction CMD/ENTRYPOINT.

Cependant la commande ps nous montre que le **PID 1** est le processus **d'initialisation** de la machine Linux et non le programme **bash** que nous avions spécifié lors du lancement du container. Cela montre bien que depuis le container nous ayons bien accés aux processus de l'hôte.

![docker ps](https://i.imgur.com/YdMw8iS.png)

Pour confirmer cette hypothèse nous pouvons vérifier les ID des namespaces liés à chaque processus.
Toutes les informations liées aux processus sont retrouvable dans le dossier `/proc/<PID>/`.

![namespaces](https://i.imgur.com/JbT32qz.png)

Ci-dessus : Le terminal supérieur présente les namespaces du container et celui du bas ceux de l'hôte. On constate bien que l'ID du namespace PID est le même pour les 2 processus. Le namespace UTS est lui différent et nous pouvons le constater facilement en regardant l'hostname du container et celui de l'hôte, ce ne sont pas les mêmes donc le namespace UTS ne sont pas partagés

Note : `/proc/self` équivaut au process actuellement en cours qui appele le symlink /proc/self

Source : https://unix.stackexchange.com/questions/333225/which-process-is-proc-self-for 

Code source du kernel Linux : https://elixir.bootlin.com/linux/latest/source/fs/proc/self.c https://elixir.bootlin.com/linux/latest/source/fs/proc/self.c



Dans le container, nous créons une variable d'environnement `FOO` ainsi qu'un processus qui va tourner non stop.
Le processus ici sera `sleep`.

Le `echo $$` permet d'afficher le **PID** du process en cours. Ici il s'agit du process `bash` lancé lors de la création du container.

Puisque le namespace pid est partagé nous devrions pouvoir le retrouvé depuis notre hôte.

![process container](https://imgur.com/yGd0q1p.png)

Le proccess lancé dans notre container doit forcément être un enfant du processus *dockerd* (Docker Daemon).
On recherche donc le process `dockerd` et on affiche les quelques lignes après pour retrouver le process `sleep` de notre container.

![ps host](https://i.imgur.com/f3y6T4q.png)

Nous voyons bien que le processus **5484** est `bash` comme vu dans notre container grâce à la commande `echo $$`.

Une fois le PID retrouvé nous pouvons afficher les informations relative à ce processus.
Toutes les infos seront dans `/proc/7965/` ce qui nous intéresse est la variable d'environnement créée dans le container.

![process environ](https://i.imgur.com/HfCKF2g.png)



