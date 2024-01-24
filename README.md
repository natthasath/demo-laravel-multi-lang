# 🎉 DEMO Laravel Multi Lang
Laravel MultiLang simplifies multilingual content management, allowing dynamic language switching for an enhanced user experience. Streamline translation integration effortlessly with this Laravel package.

![version](https://img.shields.io/badge/version-1.0-blue)
![rating](https://img.shields.io/badge/rating-★★★★★-yellow)
![uptime](https://img.shields.io/badge/uptime-100%25-brightgreen)

### 🚀 Setup

- Install Package

```
composer require outhebox/blade-flags
php artisan vendor:publish --tag=blade-flags-config
```

- Use Directory

```shell
/lang
    /en
        messages.php
    /es
        messages.php
```

- Use JSON

```shell
/lang
    en.json
    es.json
```

- Set Locale Configuration

```
'locale' => 'en',
'fallback_locale' => 'en',
```

- Check Locale in Route

```
Route::get('/greeting/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'th'])) {
        abort(400);
    }

    App::setLocale($locale);

    $locale = App::currentLocale();
    print($locale);
});
```

- Create Migration User Table

```
php artisan make:migration create_users_table --create=users
php artisan migrate
php artisan make:model Models\\User
```

### 🏆 Run

- [http://localhost:8000/login](http://localhost:8000/login) username : `admin` password : `admin`

```shell
php artisan serve
```
