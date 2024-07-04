# Brain Booster Rewards System (BBR)

Ce projet est une application web développée avec Laravel 11 et FilamentPHP v3. Ce guide vous expliquera comment configurer et déployer l'application en local.

## Présentation de l'Application

BBR est plateforme innovante conçue pour pour la gestion et la fidelisation des clients. Elle offre une interface utilisateur intuitive grâce à FilamentPHP et des fonctionnalités puissantes pour la gestion des utilisateurs, clients, services, le suivi de l'achat des services par les clients, la gestion de points de recompense des clients.

### Fonctionnalités Clés

- **Gestion des utilisateurs** : Ajoutez, modifiez et supprimez des utilisateurs avec des rôles et des permissions spécifiques.
- **Gestion des clients** : Ajoutez, modifiez et supprimez des clients.
- **Tableau de bord interactif** : Visualisez des statistiques et des graphiques en temps réel.
- **Gestion des points de recompense** : Credit et Debit automatique de compte de points bonus des clients.
- **Gestion des service** : Ajoutez, modifiez et supprimez des services et attribuez des points de recompense a chaque service.
- **Trie et filtre** : Triez ou filtrez les enregistrements facilement sur une periode ou sur base d'une category.
- **Notifications** : Recevez des notifications en temps réel pour les événements importants.
- **Recherche avancée** : Recherchez et filtrez les données avec des critères avancés.

## Prérequis

Avant de commencer, assurez-vous d'avoir les outils suivants installés sur votre machine :

- PHP >= 8.2
- Composer
- MySQL ou MariaDB
- Node.js et npm
- Git

## Installation

Suivez ces étapes pour installer et configurer l'application en local :

1. **Cloner le dépôt Git :**

   ```bash
   git clone https://github.com/abogo-nono/bbr-f.git
   cd bbr-f
   ```

2. **Installer les dépendances PHP :**

   ```bash
   composer install
   ```

3. **Copier le fichier `.env.example` en `.env` et configurer votre environnement :**

   ```bash
   cp .env.example .env
   ```

   Ouvrez le fichier `.env` et mettez à jour les informations de votre base de données et autres configurations nécessaires.

4. **Générer la clé de l'application :**

   ```bash
   php artisan key:generate
   ```

5. **Migrer la base de données et seeder les données si nécessaire :**

   ```bash
   php artisan migrate --seed
   ```

6. **Installer les dépendances npm et compiler les assets :**

   ```bash
   npm install
   npm run build
   ```

## Configuration de FilamentPHP

FilamentPHP v3 est utilisé pour l'interface d'administration. Voici comment le configurer :

1. **Publier les configurations de Filament :**

   ```bash
   php artisan filament:install
   ```

2. **Créer un utilisateur admin pour accéder à Filament :**

   ```bash
   php artisan make:filament-user
   ```

   Suivez les instructions pour créer un utilisateur administrateur.

3. **Installer les dépendances npm et compiler les assets :**

   ```bash
   npm install
   npm run build
   ```
## Lancer l'application

Après avoir configuré l'application, vous pouvez la démarrer en utilisant la commande suivante :

```bash
php artisan serve
```

L'application sera accessible à l'adresse suivante : `http://localhost:8000`.

## Captures d'écran

Voici quelques captures d'écran de l'application :

### Page de connexion
![Page de connexion](path/to/screenshot1.png)

### Tableau de bord
![Tableau de bord](path/to/screenshot2.png)

### Gestion des utilisateurs
![Gestion des utilisateurs](path/to/screenshot3.png)

### Exemple de fonctionnalité spécifique
![Exemple de fonctionnalité](path/to/screenshot4.png)

## Déploiement

Pour déployer l'application en production, assurez-vous de suivre les bonnes pratiques de déploiement Laravel, notamment :

- Configurer correctement votre fichier `.env` pour l'environnement de production.
- Mettre en place un serveur web comme Nginx ou Apache.
- Configurer une base de données en production.
- Utiliser des outils de déploiement comme Envoyer ou Forge pour automatiser le déploiement.

## Contribuer

Les contributions sont les bienvenues ! Si vous avez des suggestions, des problèmes ou des améliorations, n'hésitez pas à ouvrir une issue ou à soumettre une pull request.

## Licence

Ce projet est sous licence [Votre Licence]. Voir le fichier `LICENSE` pour plus de détails.
