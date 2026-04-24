# Projet Machine Virtuelle

## Description

Projet Machine Virtuelle est une application web développée avec le framework Laravel pour la gestion des machines virtuelles et des utilisateurs. Cette application permet aux administrateurs de gérer les utilisateurs (ajout, modification, suppression) et de superviser les machines virtuelles dans un environnement sécurisé.

### Fonctionnalités principales
- Gestion des utilisateurs : Création, modification, suppression d'utilisateurs avec rôles (Admin, Utilisateur, etc.)
- Authentification sécurisée avec Laravel Sanctum
- Interface utilisateur en français
- Gestion des machines virtuelles (modèle VirtualMachine inclus)
- Validation des données et hachage des mots de passe
- Middleware d'authentification pour sécuriser les routes

## Installation

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- Node.js et npm (pour les assets front-end)
- Base de données MySQL ou PostgreSQL

### Étapes d'installation
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/Montaab/projet_machine_virtuelle.git
   cd projet_machine_virtuelle
   ```

2. Installez les dépendances PHP :
   ```bash
   composer install
   ```

3. Installez les dépendances JavaScript :
   ```bash
   npm install
   ```

4. Copiez le fichier d'environnement et configurez-le :
   ```bash
   cp .env.example .env
   ```
   Modifiez `.env` avec vos paramètres de base de données, clé d'application, etc.

5. Générez la clé d'application :
   ```bash
   php artisan key:generate
   ```

6. Exécutez les migrations :
   ```bash
   php artisan migrate
   ```

7. (Optionnel) Exécutez les seeders pour des données de test :
   ```bash
   php artisan db:seed
   ```

8. Compilez les assets :
   ```bash
   npm run build
   ```

9. Démarrez le serveur :
   ```bash
   php artisan serve
   ```

## Utilisation

- Accédez à l'application via `http://localhost:8000`
- Connectez-vous avec un compte administrateur pour gérer les utilisateurs
- Utilisez les routes définies dans `routes/web.php` pour naviguer

## Structure du projet

- `app/Http/Controllers/` : Contrôleurs, notamment `userController.php` pour la gestion des utilisateurs
- `app/Models/` : Modèles Eloquent (`User.php`, `VirtualMachine.php`)
- `resources/views/` : Vues Blade pour l'interface utilisateur
- `database/migrations/` : Migrations pour la base de données
- `routes/web.php` : Routes de l'application

## Tests

Exécutez les tests avec :
```bash
php artisan test
```

## Contribution

Les contributions sont les bienvenues ! Veuillez suivre les étapes suivantes :
1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commitez vos changements (`git commit -am 'Ajout de nouvelle fonctionnalité'`)
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request


## Contact

Pour toute question ou suggestion, contactez [montaab19@gamil.com].
