# Laravel Customers API

## Description

API RESTful développée avec **Laravel** pour gérer les **customers**.

| Fonctionnalité | Paramètres |
|---|---|
| Filtrage | `filter[name]`, `filter[email]` |
| Tri | `sort[name]`, `sort[email]` |
| Pagination | `page[number]`, `page[size]` |
| Authentification | Basic Auth |
| Header custom | `x-api-version: v1` |

---

## Prérequis

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Laravel

---

## Installation
```bash
# 1. Cloner le projet
git clone https://github.com/ouahab-a/rest-customer.git
cd users-api

# 2. Installer les dépendances
composer install

# 3. Configurer l'environnement
cp .env.example .env
```
Entrer vos proprs valeur dans `.env`, exemple :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=customer_db
DB_USERNAME=root
DB_PASSWORD=secret
```
```bash
# 4. Générer la clé d'application
php artisan key:generate

# 5. Migrer et seed la base
php artisan migrate
php artisan db:seed

# 6. Démarrer le serveur
php artisan serve
```

---

## Authentification

Basic Auth obligatoire sur toutes les routes `/api/customers`.

| Email | Password |
|---|---|
| `admin@example.com` | `admin` |

> Modifiable dans `database/seeders/UserSeeder.php`

---

## Routes API

### `GET /api/customers`

| Paramètre | Description | Exemple |
|---|---|---|
| `filter[name]` | Filtrer par nom | `Heather` |
| `filter[email]` | Filtrer par email | `example.com` |
| `sort[name]` | Trier par nom | `asc` / `desc` |
| `sort[email]` | Trier par email | `asc` / `desc` |
| `page[number]` | Numéro de page | `1` |
| `page[size]` | Éléments par page | `10` |

### curl
```bash
curl -g -u admin@example.com:admin \
  "http://127.0.0.1:8000/api/customers?filter[name]=Heather&sort[name]=asc&page[number]=1&page[size]=10"
```

### Postman
```
GET http://127.0.0.1:8000/api/customers
Authorization → Basic Auth → admin@example.com / admin
```

---

## Exemple de réponse
```json
{
    "data": [
        {
            "id": 139222,
            "customer_id": "A3f2b7Ebcc9B870",
            "first_name": "Zachary",
            "last_name": "Doyle",
            "company": "Pratt PLC",
            "city": "North Taraton",
            "country": "Montenegro",
            "phone1": "987.236.0149x69929",
            "phone2": "262-592-7063x4816",
            "email": "henrymelody@dean-villegas.com",
            "subscription_date": "2020-10-16",
            "website": "https://roach.com/",
            "created_at": "2026-02-19 15:35:54"
        },
        {
            "id": 139520,
            "customer_id": "ebeFbC8a56EE6db",
            "first_name": "Zachary",
            "last_name": "Conner",
            "company": "Rowe Group",
            "city": "New Oscar",
            "country": "Slovenia",
            "phone1": "4471594397",
            "phone2": "032.249.7249x40901",
            "email": "glenda11@richard.com",
            "subscription_date": "2020-03-10",
            "website": "https://www.watson.com/",
            "created_at": "2026-02-19 15:35:54"
        },
        {
            "id": 135095,
            "customer_id": "f97fBDfE34Dd016",
            "first_name": "Zachary",
            "last_name": "Thompson",
            "company": "Dorsey LLC",
            "city": "Duartestad",
            "country": "Svalbard & Jan Mayen Islands",
            "phone1": "001-174-384-6004x2990",
            "phone2": "671-189-5673x94327",
            "email": "christie05@morton.com",
            "subscription_date": "2021-06-09",
            "website": "http://www.hancock.info/",
            "created_at": "2026-02-19 15:35:54"
        },
        {
            "id": 139758,
            "customer_id": "E1Ad698e59bf808",
            "first_name": "Zachary",
            "last_name": "Wolfe",
            "company": "Velasquez-Mccann",
            "city": "Alvarezborough",
            "country": "Saint Barthelemy",
            "phone1": "+1-111-170-3284x5497",
            "phone2": "(758)355-6270x489",
            "email": "bradescobar@haas.biz",
            "subscription_date": "2021-09-06",
            "website": "https://christian.info/",
            "created_at": "2026-02-19 15:35:54"
        },
        {
            "id": 134681,
            "customer_id": "7d3FA7522B4fc29",
            "first_name": "Zachary",
            "last_name": "Mendez",
            "company": "Boyer Inc",
            "city": "Pennyview",
            "country": "Lithuania",
            "phone1": "(964)477-9472x253",
            "phone2": "001-510-031-3085",
            "email": "bberry@delgado.com",
            "subscription_date": "2020-01-01",
            "website": "http://monroe-lam.com/",
            "created_at": "2026-02-19 15:35:54"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/customers?sort%5Bname%5D=desc&sort%5Bemail%5D=desc&page%5Bnumber%5D=4&page%5Bsize%5D=5&page%5Bnumber%5D=1",
        "last": "http://127.0.0.1:8000/api/customers?sort%5Bname%5D=desc&sort%5Bemail%5D=desc&page%5Bnumber%5D=4&page%5Bsize%5D=5&page%5Bnumber%5D=2000",
        "prev": "http://127.0.0.1:8000/api/customers?sort%5Bname%5D=desc&sort%5Bemail%5D=desc&page%5Bnumber%5D=4&page%5Bsize%5D=5&page%5Bnumber%5D=3",
        "next": "http://127.0.0.1:8000/api/customers?sort%5Bname%5D=desc&sort%5Bemail%5D=desc&page%5Bnumber%5D=4&page%5Bsize%5D=5&page%5Bnumber%5D=5"
    },
    "meta": {
        "current_page": 4,
        "from": 16,
        "last_page": 2000,
        "path": "http://127.0.0.1:8000/api/customers",
        "per_page": 5,
        "to": 20,
        "total": 10000
    }
}
```

---

| Composant | Détail |
|---|---|
| Pagination | Laravel Paginator — compatible JSON API |
| Auth | `auth.basic` middleware |
| Header | `x-api-version: v1` sur toutes les réponses |
