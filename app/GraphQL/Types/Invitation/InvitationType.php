<?php
namespace App\GraphQL\Types\Invitation;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class InvitationType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Invitation',
    'description' => 'A Invitation',
    'model' => App\Models\Invitation::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::string(),
        'description' => 'The id of the invitation'
      ],
      'user_id' => [
        'type' => Type::string(),
        'description' => 'The user id of the invitation'
      ],
      'bride_names' => [
        'type' => Type::string(),
        'description' => 'The bride names of the invitation'
      ],
      'bride_male_name' => [
        'type' => Type::string(),
        'description' => 'The bride male name of the invitation'
      ],
      'bride_female_name' => [
        'type' => Type::string(),
        'description' => 'The bride female name of the invitation'
      ],
      'akad_date' => [
        'type' => Type::string(),
        'description' => 'The akad date of the invitation'
      ],
      'akad_time' => [
        'type' => Type::string(),
        'description' => 'The akad time of the invitation'
      ],
      'akad_address' => [
        'type' => Type::string(),
        'description' => 'The akad address of the invitation'
      ],
      'akad_location' => [
        'type' => Type::string(),
        'description' => 'The akad location of the invitation'
      ],
      'resepsi_date' => [
        'type' => Type::string(),
        'description' => 'The resepsi date of the invitation'
      ],
      'resepsi_time' => [
        'type' => Type::string(),
        'description' => 'The resepsi time of the invitation'
      ],
      'resepsi_address' => [
        'type' => Type::string(),
        'description' => 'The resepsi address of the invitation'
      ],
      'resepsi_location' => [
        'type' => Type::string(),
        'description' => 'The resepsi location of the invitation'
      ],
      'created_at' => [
        'type' => Type::string(),
        'description' => 'The date the invitation was created',
        'resolve' => function($model) {
            return $model->created_at;
        }
      ],
      'updated_at' => [
        'type' => Type::string(),
        'description' => 'The date the invitation was last updated',
        'resolve' => function($model) {
            return $model->updated_at;
        }
      ]
    ];
  }
}