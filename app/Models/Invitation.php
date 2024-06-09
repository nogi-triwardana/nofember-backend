<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Invitation extends Model
{
	use HasFactory, HasUuids;

	protected $fillable = [
		'user_id',
		'bride_names',
		'bride_male_name',
		'bride_female_name',
		'akad_date',
		'akad_time',
		'akad_address',
		'akad_location',
		'resepsi_date',
		'resepsi_time',
		'resepsi_address',
		'resepsi_location',
	];
}
