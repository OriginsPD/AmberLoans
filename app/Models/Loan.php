<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Loan
 *
 * @property int $id
 * @property string $name
 * @property int $start_value
 * @property int $end_value
 * @property float $loan_percentage
 * @property int $duration months
 * @property float $monthly_payment
 * @property string $requirement
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RequestLoan[] $requestLoan
 * @property-read int|null $request_loan_count
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereEndValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereLoanPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereMonthlyPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereStartValue($value)
 * @mixin \Eloquent
 */
class Loan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'start_value',
        'end_value',
        'loan_percentage',
        'duration',
        'monthly_payment',
    ];

    public function requestLoan(): HasMany
    {
        return $this->hasMany(RequestLoan::class, 'loan_id');
    }
}
