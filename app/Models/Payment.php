<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @property int $id
 * @property string $envelope_code
 * @property string $envelope_code_year
 * @property string $file_code
 * @property string $payment_code
 * @property string $relative_files
 * @property int $payment_type_id
 * @property int $beneficiary_id
 * @property int $user_id
 * @property string $description
 * @property float $total_amount
 * @property float $deductions
 * @property float $payment_amount
 * @property int $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Beneficiary $beneficiary
 * @property PaymentType $payment_type
 * @property User $user
 *
 * @package App\Models
 */
class Payment extends Model
{

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	protected $fillable = [
		'envelope_code',
		'envelope_code_year',
		'file_code',
		'payment_code',
		'relative_files',
		'payment_type_id',
		'beneficiary_id',
		'user_id',
		'description',
		'total_amount',
		'deductions',
		'payment_amount',
		'year'
	];

	public function beneficiary()
	{
		return $this->belongsTo(Beneficiary::class);
	}

	public function payment_type()
	{
		return $this->belongsTo(PaymentType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
