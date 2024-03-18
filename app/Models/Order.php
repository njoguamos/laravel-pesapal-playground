<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use NjoguAmos\Pesapal\Enums\ISOCountryCode;
use NjoguAmos\Pesapal\Enums\ISOCurrencyCode;
use NjoguAmos\Pesapal\Enums\RedirectMode;
use NjoguAmos\Pesapal\Models\PesapalIpn;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'currency'      => ISOCurrencyCode::class,
            'redirect_mode' => RedirectMode::class,
            'country_code'  => ISOCountryCode::class,
        ];
    }

    protected $attributes = [
        'redirect_mode' => RedirectMode::PARENT_WINDOW,
    ];

    public function ipn(): BelongsTo
    {
        return $this->belongsTo(related: PesapalIpn::class, foreignKey: 'ipn_id');
    }
}
