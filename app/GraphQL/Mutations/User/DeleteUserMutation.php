<?php
  namespace App\GraphQL\Mutations\User;

  use Rebing\GraphQL\Support\Facades\GraphQL;
  use GraphQL\Type\Definition\Type;
  use Rebing\GraphQL\Support\Mutation;
  use App\Models\User;

  class DeleteUserMutation extends Mutation
  {
    protected $attributes = [
      "name" => "deleteUser",
    ];

    public function type(): Type
    {
      return Type::boolean();
    }

    public function args(): array
    {
      return [
        'id' => [
          'type' => Type::nonNull(Type::int()),
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
      $user = User::findOrFail($args["id"]);

      return $user->delete() ? true : false;
    }
  }