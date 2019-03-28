## SmartOver Countries

### Install

```
composer require smart-over/countries
```

### Lumen register
```
$app->register(\SmartOver\Countries\CountriesServiceProvider::class);
```

### Migrate for country tables
```
php artisan migrate
```

### Fetch all countries
```
php artisan countries:fetch --show
```
