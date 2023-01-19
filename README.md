# Formulaire d'information 🚀

Une application web en Symfony très simple contenant un formulaire pour envoyer des informations, lié à une base de données.

## Pour commencer


### Pré-requis

Ce qui est requis pour commencer 

- composer
- symfony

### Installation
Cloner le projet : git clone https://github.com/Florent89/formRequest.git

Créer fichier .env avec le contenu de .env.dist à la racine du projet

Dans le terminal de VS Code, tapez la commande

*composer install*

## Démarrage

Dans le terminal
*symfony server:start*

## Fabriqué avec

Symfony
CSS
Bootstrap
Doctrine


## Auteur
Florent Derouet

## Choix
- Une fois soumis, les informations du formulaire sont envoyés en BDD (dans l'exemple BDD monkeezForm, table information)
- Bootstrap pour la mise en forme du formulaire, choix de rapidité / + fichier de styles css plus générique.
- Doctrine : pour créer la BDD, et la table information en ligne de commande, ainsi que la migration des données.
- Dossier de Tests : test des fonctionnalités principales, notamment soumission du formulaire, et redirection)
- Choix des champs film et citation : c'est plus sympa 🐵.
