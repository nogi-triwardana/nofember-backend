<?php
  namespace App\GraphQL\Mutations\User;

  use Rebing\GraphQL\Support\Facades\GraphQL;
  use GraphQL\Type\Definition\Type;
  use Rebing\GraphQL\Support\Mutation;
  use App\Models\User;

  class CreateUserMutation extends Mutation
  {
    protected $attributes = [
      'name' => 'createUser'
    ];

    public function type(): Type
    {
      return GraphQL::type('User');
    }

    public function args(): array
    {
      return [
        'name' => [
          'type' => Type::string(),
          'description' => 'The name of the user'
        ],
        'email' => [
          'type' => Type::string(),
          'description' => 'The email of the user'
        ],
        'password' => [
          'type' => Type::string(),
          'description' => 'The password of the user'
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
        ]
      ];
    }

  public function resolve($root, $args)
    {
      $user = new User();
      $user->name = $args['name'];
      $user->email = $args['email'];
      $user->password = $args['password'];
      $user->city = $args['city'];
      $user->phone = $args['phone'];
      $user->role = $args['role'];
      $user->save();

      return $user;
    }
  }