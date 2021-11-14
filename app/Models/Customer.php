<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $first_nm
 * @property string $last_nm
 * @property string $email
 * @property string $contact_no
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Appointment[] $appointment
 * @property-read int|null $appointment_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RequestLoan[] $requestLoan
 * @property-read int|null $request_loan_count
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirstNm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLastNm($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'first_nm',
        'last_nm',
        'email',
        'contact_no'
    ];

    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class, 'customer_id');
    }

    public function requestLoan(): HasMany
    {
        return $this->hasMany(RequestLoan::class, 'customer_id');
    }
}
