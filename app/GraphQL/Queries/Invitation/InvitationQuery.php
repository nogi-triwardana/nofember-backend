<?php
namespace App\GraphQL\Queries\Invitation;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Models\Invitation;

class InvitationQuery extends Query
{
  protected $attributes = [
    'name' => 'invitation'
  ];

  public function type(): type
  {
    return Type::listOf(GraphQL::type('Invitation'));
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::string()
      ],
      'user_id' => [
        'name' => 'user_id',
        'type' => Type::string()
      ],
      'bride_names' => [
        'name' => 'bride_names',
        'type' => Type::string()
      ],
      'bride_male_name' => [
        'name' => 'bride_male_name',
        'type' => Type::string()
      ],
      'bride_female_name' => [
        'name' => 'bride_female_name',
        'type' => Type::string()
      ],
      'akad_date' => [
        'name' => 'akad_date',
        'type' => Type::string()
      ],
      'akad_time' => [
        'name' => 'akad_time',
        'type' => Type::string()
      ],
      'akad_address' => [
        'name' => 'akad_address',
        'type' => Type::string()
      ],
      'akad_location' => [
        'name' => 'akad_location',
        'type' => Type::string()
      ],
      'resepsi_date' => [
        'name' => 'resepsi_date',
        'type' => Type::string()
      ],
      'resepsi_time' => [
        'name' => 'resepsi_time',
        'type' => Type::string()
      ],
      'resepsi_address' => [
        'name' => 'resepsi_address',
        'type' => Type::string()
      ],
      'resepsi_location' => [
        'name' => 'resepsi_location',
        'type' => Type::string()
      ],
      'created_at' => [
        'name' => 'created_at',
        'type' => Type::string()
      ],
      'updated_at' => [
        'name' => 'updated_at',
        'type' => Type::string()
      ]
    ];
  }
}