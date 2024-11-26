# Filmoteca  

Filmoteca est une application de gestion de films développée dans le cadre de la formation INF5. Ce projet suit l'architecture MVC et utilise Docker pour simplifier son déploiement.

## Technologies utilisées

![MySQL](https://img.shields.io/badge/MySQL-8.0-%2300f.svg?logo=mysql&logoColor=white)  
![Adminer](https://img.shields.io/badge/Adminer-%231D85C8.svg?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAh1JREFUaEPtmIExRFEQht/HyFRsAS7ABakAyYBsSJoAzYC6+AVsBlcSsQKwEKUoSsmklJK3K21puSdxt88OYzp84YPpt/ftj/9+/b2dnw8HCG0O+GsAG2ARpAFtA6ZK6iYNdCaCtILaI9AWMI9AbcEkUKtQJjUPapHDpBLbAJMXJ9ryGFqKnRKaIXoUrsARWYCDgWq1dCQFoAOawXnR5GmwxUrQ1FEIoBqEecNUpBVwCugMQlEZQBbwdUyhk0y3CLMEsgeDajjmvTJEqQjIkFOBPdRCAXgFvIG6URCoAW8AfwNbdcB5CbfBOkHKlEBpgasn8D5hlXBvqbHniwptJSGCPgN8M58Gzgh8VViKUEWA+s5aADeA54gfBI8HTAK7pDTATYDPgSeBBMGnZVyRYo+rk1hk0SHQEZwA9glvgZmFdQFRABPDYPAT3HVocwMBRyscALcp4pks+hwDS+IK8gfAgbF8HpFRIOw6IVaEDFCQ6ITaAP7lFRVv5FVFyxMVKHNSAxIqgdJI5HndBKbITIVVFrFAl4w3ww5QrpIhQCS4QLZGNOGCWFQpQD3wJ90S9WtUVDdRABItIpJrTpIyEGLyMRIV4BUtN3cFFwQRCDcAvILvAUvUUBO0eACe8CqxKs9kUsclqJeSt9GtFvMC41Us4E3gBeI8P4KrqCMI+z1TTLMtUoTRPsBhwEvwM8RD4BaIrgCxgJDf4LeBT4HQhUoEqNxjfoiZPIA9YqA3gJ6xrXvLYcylFgFtMiGbEIVTlkb0Fbg8LjEqTVykdmIHZCRUAAFsF8E9l7GArXkHaIAzIVyG5/BvsD9RGFOAJdjHeDr8m7PQpmMXDOD6gAeIMmEpgYJjJgC2X68Cf7Hy4s2OmgV/XO4Xh1FGxQKYrwAAAABJRU5ErkJggg==)  
![PHP](https://img.shields.io/badge/PHP-8.0-%23777BB4.svg?logo=php&logoColor=white)  
![Nginx](https://img.shields.io/badge/Nginx-%23009639.svg?logo=nginx&logoColor=white)  
![Docker](https://img.shields.io/badge/Docker-Compose-%232496ED.svg?logo=docker&logoColor=white)  
![Mailhog](https://img.shields.io/badge/Mailhog-%234E4E4E.svg?logoColor=white)  

## Prérequis  

Avant de commencer, assurez-vous d'avoir les outils suivants installés sur votre machine :  
1. **Docker** : pour exécuter les conteneurs. [Télécharger Docker](https://www.docker.com/)  
2. **Docker Compose** : inclus avec Docker Desktop.  
3. **Make** : pour exécuter les commandes prédéfinies.  
   - Si vous utilisez VS Code, vous pouvez installer l’extension [Makefile Tools](https://marketplace.visualstudio.com/items?itemName=ms-vscode.makefile-tools) pour faciliter l’utilisation de `Make`.  

---

## Commandes Make  

Voici les commandes Make disponibles pour gérer le projet :  

```make
# Chemin vers le fichier docker-compose
DOCKER_COMPOSE_FILEPATH=.docker/docker-compose.yaml
DOCKER_PHP_CONTAINER=filmoteca_php

# Démarrer les conteneurs en arrière-plan
up:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) up -d

# Arrêter les conteneurs
down:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) down

# Recréer les conteneurs (utile après modification des Dockerfiles)
build:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) up --build -d

# Voir les logs des conteneurs
logs:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) logs -f

# Vérifier le statut des conteneurs
status:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) ps

# Nettoyer les conteneurs, réseaux, volumes, et images créés par `up`
clean:
	docker compose -f $(DOCKER_COMPOSE_FILEPATH) down --volumes --remove-orphans

# Redémarrer les conteneurs
restart: down up

# Se connecter au conteneur PHP
start:
	docker exec -it $(DOCKER_PHP_CONTAINER) /bin/bash

# Exécuter `composer install`
composer-install:
	docker exec $(DOCKER_PHP_CONTAINER) composer install

# Regénérer l'autoloading de Composer
dump-autoload:
	docker exec $(DOCKER_PHP_CONTAINER) composer dump-autoload
```

## Utilisation

1. **Cloner le projet** :  
   ```bash  
   git clone https://github.com/yhammououali/filmoteca.git  
   cd filmoteca  
   ```  

2. **Configurer le fichier `/etc/hosts` (ou équivalent)** :  
   Ajoutez la ligne suivante pour configurer le VirtualHost :  
   ```  
   127.0.0.1 filmoteca.local  
   ```   

3. **Démarrer le projet** :  
   ```bash  
   make up  
   ```  

4. **Construire le projet après une modification des fichiers Docker** :  
   ```bash  
   make build  
   ```  

5. **Vérifier le statut des conteneurs** :  
   ```bash  
   make status  
   ```  

6. **Se connecter au conteneur PHP** :  
   ```bash  
   make start  
   ```  

7. **Installer les dépendances avec Composer** :  
   ```bash  
   make composer-install  
   ```  

8. **Nettoyer les conteneurs et les volumes** :  
   ```bash  
   make clean  
   ```  

N’oubliez pas de consulter les logs si vous rencontrez des problèmes :  
   ```bash  
   make logs  
   ```  

# Modèle de base de données pour **Filmoteca**

## Table `films`
| Colonne      | Type         | Description                       |
|--------------|--------------|-----------------------------------|
| `id`         | INT, PK, AI  | Identifiant unique du film       |
| `title`      | VARCHAR(255) | Titre du film                    |
| `year`       | YEAR         | Année de sortie                  |
| `type`       | VARCHAR(100) | Genre du film                    |
| `synopsis`   | TEXT         | Résumé du film                   |
| `director`   | VARCHAR(255) | Nom du réalisateur               |
| `deleted_at` | TIMESTAMP    | Date d'archivage dans la collection  |
| `created_at` | TIMESTAMP    | Date d'ajout dans la collection  |
| `updated_at` | TIMESTAMP    | Date de modification dans la collection  |

- **Description** : Contient les informations de base sur chaque film, y compris le titre, l’année de sortie, le genre, un synopsis et le nom du réalisateur.

## Table `reviews`
| Colonne      | Type         | Description                           |
|--------------|--------------|---------------------------------------|
| `id`         | INT, PK, AI  | Identifiant unique de l'avis         |
| `film_id`    | INT, FK      | Identifiant du film (clé étrangère)  |
| `rating`     | TINYINT      | Note sur 5                           |
| `comment`    | TEXT         | Commentaire de l’utilisateur         |
| `created_at` | TIMESTAMP    | Date de l'avis                       |

- **Relation** : Chaque avis est lié à un film spécifique par la colonne `film_id`, qui fait référence à `films.id`. Un film peut donc avoir plusieurs avis.

---

## Exemples de requêtes SQL

- **Récupérer tous les films** :
  ```sql
  SELECT * FROM films;
  ```

## Notes  
- Les commandes Make simplifient les interactions avec Docker et Docker Compose ;
- Utilisez `make` depuis le répertoire racine du projet pour exécuter correctement les commandes ;  
- En cas de problème, vérifiez que Docker et Docker Compose sont bien installés et fonctionnels.

Bon développement ! 🚀



Voici une présentation du projet Filmoteca, que nous utiliserons comme support tout au long de votre formation de remise à niveau Web (INF5).


1. Qu'est-ce que Filmoteca ?
Filmoteca est une application simple de gestion de films. Ce projet vous permettra de découvrir et pratiquer les notions essentielles de HTML, CSS et PHP dans un contexte concret et professionnel.


2. Méthodologie
Nous travaillerons sur ce projet en live coding pendant les sessions de formation. Vous pourrez ainsi suivre chaque étape du développement en direct et poser vos questions en temps réel ;
Code source : Vous pouvez accéder au repository public du projet ici : Filmoteca sur GitHub.

3. Récupération des mises à jour
Le projet évoluera au fil des sessions. Pour disposer de la dernière version du code avant chaque cours, pensez à exécuter la commande suivante dans votre terminal : `git pull`.

Ce projet est conçu pour vous accompagner dans votre apprentissage. N’hésitez pas à explorer le code, tester vos idées et poser des questions. Je suis là pour vous guider !


4. Schéma de l'application en MVC
Voici le schéma de l'application telle qu'elle sera conçue en architecture MVC (Modèle-Vue-Contrôleur) :



Schéma MVC Filmoteca.

Ce schéma vous aidera à comprendre l’organisation du projet et à mieux appréhender la structure de votre code.

Voici un autre schéma qui se focus principalement sur la partie modèle :

Schéma modèle Filmoteca.

Le contrôleur reçoit une demande de l'utilisateur (par exemple, afficher la liste des films).
Il appelle le Repository pour récupérer les données correspondantes depuis la base de données.
Le Repository exécute une requête SQL pour obtenir les résultats bruts.
Les résultats sont ensuite transformés par le Repository en objets (par exemple, des objets Film).
Les objets Film sont renvoyés au contrôleur, plutôt que des tableaux.
Le contrôleur transmet ces objets à la vue pour les afficher proprement à l'utilisateur.


5. Description de l'architecture MVC
L’application suit l’architecture MVC (Modèle-Vue-Contrôleur) avec :

Modèle (Model) :
Entity : classes représentant les tables de la base de données.
Exemple : une classe Film avec des attributs comme $id et $title.
Repository : classes exécutant les requêtes SQL.
Exemple : une classe FilmRepository avec des méthodes comme findAll().
Vue (View) :
Utilisation du moteur de template Twig pour séparer la présentation et le code.
Exemple : un fichier list.html.twig affichant une liste de films.
Contrôleur (Controller) :
Reçoit les requêtes utilisateur via un Routeur et fait le lien entre le Modèle et la Vue.


6. Front Controller et Routeur
Le Front Controller (index.php) reçoit toutes les requêtes et les transmet au Routeur, qui détermine le contrôleur et l’action à exécuter.

7. Installation et exécution du projet
Pour installer et exécuter le projet Filmoteca sur votre machine en local, je vous invite à consulter le fichier README.md présent dans le repository. Vous y trouverez :

Les prérequis nécessaires.
Les étapes pour cloner le projet.
Les commandes Make pour gérer les conteneurs et le projet.
Prenez le temps de bien suivre les instructions pour configurer l’environnement correctement. Si vous avez des questions ou des problèmes, n’hésitez pas à me les poser.
