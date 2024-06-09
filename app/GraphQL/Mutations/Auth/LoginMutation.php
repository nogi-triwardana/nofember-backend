<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Nuwave\Lighthouse\Exceptions\AuthenticationException;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginMutation extends Mutation
{
  protected $attributes = [
    'name' => 'login'
  ];

  public function type(): Type
  {
    return GraphQL::type('Login');
  }

  public function args(): array
  {
    return [
      'email' => [
        'type' => Type::string(),
        'description' => 'The email of the user'
      ],
      'password' => [
        'type' => Type::string(),
        'description' => 'The password of the user'
      ],
    ];
  }

  public function resolve(null $_, array $args)
  {
    // TODO implement the resolver
    error_log($args['email']);

    if(!Auth::attempt(['email' => $args['email'], 'password' => $args['password']])) {
      return null;
    }

    $user = Auth::user();
    $token = $user->createToken('token')->accessToken->token;

    return [
      'user' => $user,
      'token' => $token
    ];
  }
}
