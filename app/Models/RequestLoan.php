<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\RequestLoan
 *
 * @property int $id
 * @property int $customer_id
 * @property int $loan_id
 * @property int $status
 * @property string|null $approve_date
 * @property int $approved_by
 * @property-read Customer $customer
 * @property-read Loan $loan
 * @property-read User $user
 * @method static Builder|RequestLoan newModelQuery()
 * @method static Builder|RequestLoan newQuery()
 * @method static Builder|RequestLoan query()
 * @method static Builder|RequestLoan whereApproveDate($value)
 * @method static Builder|RequestLoan whereApprovedBy($value)
 * @method static Builder|RequestLoan whereCustomerId($value)
 * @method static Builder|RequestLoan whereId($value)
 * @method static Builder|RequestLoan whereLoanId($value)
 * @method static Builder|RequestLoan whereStatus($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActiveLoan[] $activeLoan
 * @property-read int|null $active_loan_count
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

    public function activeLoan(): HasMany
    {
        return $this->hasMany(ActiveLoan::class, 'request_id');
    }
}
