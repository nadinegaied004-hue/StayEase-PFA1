# StayEase

Plateforme web de reservation d'hebergements touristiques en Tunisie, permettant aux voyageurs de decouvrir, filtrer et reserver des logements, attractions et evenements.

## Apercu / Demo

[![Demo StayEase](https://img.shields.io/badge/VIDEO-Demo-red?style=for-the-badge&logo=youtube)](https://youtu.be/Deja824jtm8)

StayEase est une application web full-stack developpee dans le cadre du PFA (Projet de Fin d'Annee). Elle propose :

- Un catalogue de logements (hotels, maisons d'hotes, fermes) avec filtres avances (categorie, ville, saison, evenement, attraction)
- Un systeme d'avis et de notation pour les logements, attractions et evenements
- Un espace proprietaire pour gerer ses annonces
- Des recommandations personnalisees basees sur les preferences utilisateur
- Une interface responsive et moderne (Tailwind CSS)

## Technologies

- **Frontend** : HTML5, CSS3, JavaScript, Tailwind CSS
- **Backend** : PHP 8.x
- **Base de donnees** : MySQL / MariaDB
- **Hebergement** : InfinityFree (gratuit)
- **Environnement dev** : XAMPP (Apache + MySQL + PHP)

## Installation

```bash
git clone https://github.com/votre-username/PFA1-2026-13.git
cd PFA1-2026-13
```

### Configuration locale (XAMPP)

1. Installer XAMPP et demarrer Apache + MySQL
2. Copier le contenu de `fichiers sources et exécutables/` dans `C:\xampp\htdocs\`
3. Creer la base de donnees :
   - Ouvrir phpMyAdmin (`http://localhost/phpmyadmin`)
   - Importer le fichier `database/stayease_complete.sql`
4. Configurer `db.php` avec vos identifiants MySQL locaux

### Configuration production (InfinityFree)

1. Creer un compte sur [InfinityFree](https://infinityfree.com)
2. Creer un hébergement avec un sous-domaine
3. Creer une base de donnees MySQL
4. Uploadez les fichiers via le File Manager ou FileZilla
5. Importer le fichier SQL via phpMyAdmin
6. Modifier `db.php` avec les identifiants de production

## Structure du projet

```
fichiers sources et exécutables/
├── api/                    # Endpoints PHP (REST API)
│   ├── logements.php       # CRUD logements
│   ├── avis.php            # Gestion des avis
│   ├── login.php           # Authentification
│   └── ...
├── database/               # Scripts SQL
├── images/                 # Photos logements & attractions
├── *.html                  # Pages frontend
├── navbar.js               # Barre de navigation partagee
├── styles.css              # Styles globaux
├── db.php                  # Configuration base de donnees
└── config.php              # Configuration generale
```

## Fonctionnalites

- **Recherche et filtrage** : par categorie, ville, saison, evenement, attraction
- **Tri dynamique** : par score, nom, ville
- **Avis clients** : notation et commentaire sur les logements
- **Espace proprietaire** : gestion des annonces et photos
- **Recommandations** : systeme de suggestions personnalisees
- **Interface responsive** : adaptée mobile, tablette et desktop

## Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de details.
