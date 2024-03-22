
Utiliser le docker compose pour lancer une db

```bash
docker-compose up -d
```

Copier le fichier `.env.example` en `.env` et modifier les valeurs si nécessaire mais normalement ça devrait fonctionner tel quel avec le docker-compose.

```bash
cp .env.example .env
```

Migrer la base de données

```bash
php artisan migrate
```

Seeder la base de données

```bash
php artisan db:seed
```

Lancer le serveur

```bash
php artisan serve
```



