# JobEase

## Fonctionnalités Backend

### Système d'Authentification Sécurisé :
- Implémentation d'un système de connexion et d'inscription sécurisé.
- Confidentialité des données des utilisateurs garantie.
- Contrôle d'accès basé sur les rôles des utilisateurs.

### Gestion des Rôles :
- Gestion des rôles pour attribuer les privilèges des utilisateurs.
- Rôles d'administrateur et de candidat, avec permissions spécifiques.

### Interface Administrateur :
- Interface de connexion sécurisée pour les recruteurs.
- Gestion des offres d'emploi : création, modification, suppression.
- Sécurisation des informations sensibles des recruteurs.

### Interface Candidat :
- Plateforme conviviale pour la consultation des offres d'emploi.
- Formulaire d'inscription sécurisé pour les nouveaux candidats.
- Soumission de candidatures en ligne avec suivi en temps réel.

### Fonctionnalités de Recherche Avancée :
- Moteur de recherche avancé avec filtres.
- Utilisation d'AJAX pour des résultats instantanés.

### Intégration avec un Modèle de Template Existant :
- Adhésion à la structure de template pour une intégration harmonieuse.
- Expérience utilisateur cohérente sur l'ensemble du système.

### Fonctionnalités Backend Admin :
- Gestion des offres d'emploi (CRUD + téléchargement d'image).
- Création de descriptions professionnelles.
- Gestion de la visibilité des offres et approbation des demandes d'emploi.

### Statistiques pour l'Admin :
- Visualisation des statistiques des offres d'emploi.

### Partie Front Office :
- Recherche d'emplois accessible sans authentification.
- Authentification requise lors de la candidature.

### Internationalisation :
- Système d'internationalisation pour support multilingue.

## Prérequis
- PHP installé sur votre machine.
- Composer installé sur votre machine.

## Installation
1. Cloner le dépôt :
   ```
   git clone https://github.com/HMZElidrissi/JobEase.git
   ```
2. Naviguer vers le répertoire du projet :
   ```
   cd JobEase
   ```
3. Installer les dépendances Composer :
   ```
   composer install
   ```
4. Démarrer le serveur web PHP intégré :
   ```
   php -S localhost:8000 -t public
   ```
