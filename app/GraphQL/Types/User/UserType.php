<?php
namespace App\GraphQL\Types\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
  protected $attributes = [
    'name' => 'User',
    'description' => 'A User',
    'model' => App\Models\User::class
  ];

  public function fields(): array
  {
    return [
      'id' => [
        'type' => Type::string(),
        'description' => 'The id of the user'
      ],
      'name' => [
        'type' => Type::string(),
        'description' => 'The name of the user'
      ],
      'email' => [
        'type' => Type::string(),
        'description' => 'The email of the user'
      ],
      'email_verified_at' => [
        'type' => Type::string(),
        'description' => 'The email verified at of the user'
      ],
      'password' => [
        'type' => Type::string(),
        'description' => 'The description of the user'
      ],
      'city' => [
        'type' => Type::string(),
        'description' => 'The city of the user'
      ],
      'phone' => [
        'type' => Type::string(),
        'description' => 'The phone of the user'
      ],
      'role' => [
        'type' => Type::string(),
        'description' => 'The role of the user'
      ],
      'created_at' => [
        'type' => Type::string(),
        'description' => 'The date the user was created',
        'resolve' => function($model) {
            return $model->created_at;
        }
      ],
      'updated_at' => [
        'type' => Type::string(),
        'description' => 'The date the user was last updated',
        'resolve' => function($model) {
            return $model->updated_at;
        }
      ]
    ];
  }
};