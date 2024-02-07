<?php

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
