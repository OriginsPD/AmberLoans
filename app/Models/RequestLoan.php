<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\RequestLoan
 *
 * @property int $id
 * @property int $customer_id
 * @property int $loan_id
 * @property int $status
 * @property string|null $approve_date
 * @property int $approved_by
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Loan $loan
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereApproveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestLoan whereStatus($value)
 * @mixin \Eloquent
 */
class RequestLoan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'loan_id',
        'status',
        'approve_date',
        'approved_by'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
