# Laravel pgvector Eloquent 🐘⚡

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel 11](https://img.shields.io/badge/Laravel-11-red.svg)](https://laravel.com)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-pgvector-blue.svg)](https://github.com/pgvector/pgvector)

**Native PostgreSQL `pgvector` integration for Laravel 11 Eloquent models with custom vector casting, cosine distance scopes, and nearest-neighbor vector search.**

Developed by **Tarek Mohamed** ([@seotarek](https://github.com/seotarek))

---

## 🚀 Installation

```bash
composer require seotarek/laravel-pgvector-eloquent
```

---

## 💻 Usage

### 1. In your Eloquent Model:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Seotarek\Pgvector\Casts\VectorCast;
use Seotarek\Pgvector\Traits\HasVectors;

class Document extends Model
{
    use HasVectors;

    protected $casts = [
        'embedding' => VectorCast::class,
    ];
}
```

### 2. Semantic Search with Cosine Distance:
```php
$userQueryEmbedding = [0.012, 0.451, -0.231, ...];

// Find 5 most semantically similar documents
$results = Document::whereNearest('embedding', $userQueryEmbedding, 5)->get();
```

---

## 📜 License
Open-source software licensed under the [MIT License](LICENSE).
