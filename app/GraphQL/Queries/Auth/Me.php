<?php
namespace App\GraphQL\Queries\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Me extends Query
{
  protected $attributes = [
    'name' => 'me'
  ];

  public function type(): Type
  { 
    return Type::listOf(GraphQL::type('User'));
  }

  public function args(): array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::string()
      ],
      'name' => [
        'name' => 'name',
        'type' => Type::string()
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'password' => [
        'name' => 'password',
        'type' => Type::string()
      ],
      'city' => [
        'name' => 'city',
        'type' => Type::string()
      ],
      'phone' => [
        'name' => 'phone',
        'type' => Type::string()
      ],
      'role' => [
        'name' => 'role',
        'type' => Type::string()
      ]
    ];
  }

  public function resolve($root, $args)
  {
    return [request()->user('sanctum')];
  }
};