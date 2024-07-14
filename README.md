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

## Configuration des roles

Shield est utilisé pour pour gerer les droits d'acces. Voici comment le configurer :

1. **Suivez les instructions pour créer un utilisateur administrateur.**
    ```bash
   php artisan shield:install
   ```

## Lancer l'application

Après avoir configuré l'application, vous pouvez la démarrer en utilisant la commande suivante :

```bash
php artisan serve
```

L'application sera accessible à l'adresse suivante : `http://localhost:8000/admin`.

```text
username: admin@brain-booster.com
password: password
```

## Captures d'écran

Voici quelques captures d'écran de l'application :

### Page de connexion

<img alt="Page de connexion" src="./screenshots/Screenshot 2024-07-04 at 07-29-43 Login - BB Rewards.png" title="Login"/>

### Tableau de bord

<img alt="Tableau de bord" src="./screenshots/Screenshot 2024-07-04 at 07-30-22 Dashboard - BB Rewards.png" title="Dashboard"/>

### Gestion des utilisateurs

<img alt="Gestion des utilisateurs" src="./screenshots/Screenshot 2024-07-04 at 07-31-37 Users - BB Rewards.png" title="Users"/>

<img alt="Voir les details sur un utilisateur" src="./screenshots/Screenshot 2024-07-04 at 07-31-50 View User - BB Rewards.png" title="User View"/>

### Gestion des roles utilisateurs

<img alt="Les roles" src="./screenshots/Screenshot 2024-07-04 at 07-31-59 Roles - BB Rewards.png" title="Roles"/>

<img alt="Editer les privilleges d&#39;un roles" src="./screenshots/Screenshot 2024-07-04 at 07-32-07 Edit super_admin - BB Rewards.png" title="Edit Roles"/>

### Gestion des clients

<img alt="Liste des clients" src="./screenshots/Screenshot 2024-07-04 at 07-30-31 Clients - BB Rewards.png" title="Clients"/>

<img alt="Liste des clients" src="./screenshots/Screenshot 2024-07-04 at 07-32-28 Clients - BB Rewards.png" title="Clients"/>

<img alt="Information sur le client" src="./screenshots/Screenshot 2024-07-04 at 07-30-54 Clients - BB Rewards.png" title="Client details"/>

<img alt="Modifier les informations d&#39;un client" src="./screenshots/Screenshot 2024-07-04 at 07-31-02 Edit Client - BB Rewards.png" title="Edit client"/>

