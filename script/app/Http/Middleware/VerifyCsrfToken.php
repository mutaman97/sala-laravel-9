<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'partner/payu/status',
        'syberpay/notify',
        'syberpay/payment-success',
        'install/migrate',
        'install/seed',
    ];
}
