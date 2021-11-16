<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ActiveLoan
 *
 * @property int $id
 * @property int $request_id
 * @property int $loan
 * @property int $payment_amount
 * @property-read \App\Models\RequestLoan $requestLoan
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan whereLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan wherePaymentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActiveLoan whereRequestId($value)
 * @mixin \Eloquent
 */
class ActiveLoan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'request_id',
        'loan',
        'payment_amount'
    ];

    public function requestLoan(): BelongsTo
    {
        return $this->belongsTo(RequestLoan::class, 'request_id');
    }

}
