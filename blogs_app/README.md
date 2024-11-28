
---

# Mon Projet Laravel blog_app

## Description

Ce projet est une application web développée en utilisant Laravel. L'application permet aux utilisateurs de gérer des articles de blog, de s'inscrire, de se connecter, et de rechercher des publications. L'application inclut des fonctionnalités d'authentification, de gestion des utilisateurs, et de gestion des articles de blog.

## Fonctionnalités

- **Gestion des Utilisateurs :** Inscription, connexion, déconnexion, et gestion du profil utilisateur.
- **Gestion des Blogs :** Création, affichage, mise à jour, et suppression des articles de blog.
- **Recherche :** Fonction de recherche pour trouver des articles de blog basés sur des mots-clés.
- **Vérification d'Email :** Envoi et vérification des emails pour l'activation des comptes utilisateur.

## Prérequis

- PHP 8.0 ou supérieur
- Composer
- MySQL ou une autre base de données compatible avec Laravel

## Installation

### Cloner le Dépôt

Clonez le dépôt Git :

```bash
git clone https://github.com/saidahetan1/blog_app.git
```

### Installation des Dépendances

Accédez au répertoire du projet et installez les dépendances PHP :

```bash

composer install
```

### Configuration de l'Environnement

Copiez le fichier `.env.example` en `.env` et configurez les paramètres de votre environnement :

```bash
cp .env.example .env
```

Générez une nouvelle clé d'application Laravel :

```bash
php artisan key:generate
```

Configurez votre base de données dans le fichier `.env` :

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Migration de la Base de Données

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

```bash
php artisan migrate
```

### Lancer le Serveur

Démarrez le serveur Laravel :

```bash
php artisan serve
```

Accédez à l'application via `http://localhost:8000`.

## Utilisation

- **Page d'Accueil :** Affiche la liste des articles de blog.
- **Création d'Article :** Utilisez le formulaire pour créer un nouvel article.
- **Recherche :** Utilisez la barre de recherche pour trouver des articles par titre ou contenu.
- **Gestion des Utilisateurs :** Inscription, connexion, et gestion du profil utilisateur.

## Tests

### Lancer les Tests

Vous pouvez exécuter les tests PHPUnit pour vérifier que l'application fonctionne correctement :

```bash
php artisan test
```

### Tests Unitaires

Les tests unitaires pour les contrôleurs `AuthController` et `PostController` sont définis dans `tests/Feature`.



Adaptez ce modèle en fonction des particularités de votre projet Laravel.
# Setup steps
1. Run `composer install`
2. Run `npm install`
3. Create `.env` file using the `.env.example`
4. Run `php artisan key:generate`
5. Serve your app `php artisan serve` and `npm run dev`

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

