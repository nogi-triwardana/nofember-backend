<?php
namespace App\GraphQL\Queries\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\Models\User;

class UserQuery extends Query
{
  protected $attributes = [
    'name' => 'users'
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
        'type' => Type::int()
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
    if (isset($args['id'])) {
        return User::where('id', $args['id'])->get();
    }

    if (isset($args['name'])) {
        return User::where('name', $args['name'])->get();
    }

    if (isset($args['email'])) {
        return User::where('email', $args['email'])->get();
    }

    if (isset($args['email_verified_at'])) {
      return User::where('email_verified_at', $args['email_verified_at'])->get();
    }

    if (isset($args['password'])) {
      return User::where('password', $args['password'])->get();
    }

    if (isset($args['city'])) {
      return User::where('city', $args['city'])->get();
    }

    if (isset($args['phone'])) {
      return User::where('phone', $args['phone'])->get();
    }

    if (isset($args['role'])) {
      return User::where('role', $args['role'])->get();
    }

    return User::all();
  }
};