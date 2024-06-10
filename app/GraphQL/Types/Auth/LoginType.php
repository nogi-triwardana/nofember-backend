<?php
namespace App\GraphQL\Types\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Login',
    'description' => 'A Login',
  ];

  public function fields(): array
  {
    return [
      'user' => [
        'type' => GraphQL::type('User'),
        'description' => 'The authenticated user'
      ],
      'token' => [
        'type' => Type::string(),
        'description' => 'Authentication token'
      ]
    ];
  }
};