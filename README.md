# Consentimento de cookies


## Instalação

Você pode instalar o pacote via compositor:

``` bash
composer require likedsg/cookie-consent
```

O pacote será registrado automaticamente.

Opcionalmente, você pode publicar o arquivo de configuração:

```bash
php artisan vendor:publish --provider="Likedsg\CookieConsent\CookieConsentServiceProvider" --tag="cookie-consent-config"
```

Este é o conteúdo do arquivo de configuração publicado:

```php
return [

    /*
     * Use esta configuração para ativar a caixa de diálogo de consentimento de cookies.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * O nome do cookie no qual armazenamos caso o usuário
     * tenha concordado em aceitar as condições.
     */
    'cookie_name' => 'laravel_cookie_consent',

    /*
     * Defina a duração do cookie em dias. O padrão é 365 * 20.
     */
    'cookie_lifetime' => 30,
];
```

O domínio do cookie é definido pela chave 'domain' em config/session.php, certifique-se de adicionar um valor em seu .env para SESSION_DOMAIN. Se você estiver usando um domínio com uma porta na URL como 'localhost:3000', este pacote não funcionará até que você faça isso.

## Utilização

...
