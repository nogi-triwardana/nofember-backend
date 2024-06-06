<?php
  namespace App\GraphQL\Mutations\Invitation;

  use Rebing\GraphQL\Support\Facades\GraphQL;
  use GraphQL\Type\Definition\Type;
  use Rebing\GraphQL\Support\Mutation;
  use App\Models\Invitation;

  class CreateInvitationMutation extends Mutation
  {
    protected $attributes = [
      'name' => 'createInvitation'
    ];

    public function type(): Type
    {
      return GraphQL::type('Invitation');
    }

    public function args(): array
    {
      return [
        // 'id' => [
        //   'type' => Type::nonNull(Type::int()),
        //   'description' => 'The id of the invitation'
        // ],
        'user_id' => [
          'type' => Type::string(),
          'description' => 'The id of the invitation'
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

  public function resolve($root, $args)
    {
      $invitation = new Invitation();
      $invitation->user_id = $args['user_id'];
      $invitation->bride_names = $args['bride_names'];
      $invitation->bride_male_name = $args['bride_male_name'];
      $invitation->bride_female_name = $args['bride_female_name'];
      $invitation->akad_date = $args['akad_date'];
      $invitation->akad_time = $args['akad_time'];
      $invitation->akad_address = $args['akad_address'];
      $invitation->akad_location = $args['akad_location'];
      $invitation->resepsi_date = $args['resepsi_date'];
      $invitation->resepsi_time = $args['resepsi_time'];
      $invitation->resepsi_address = $args['resepsi_address'];
      $invitation->resepsi_location = $args['resepsi_location'];
      $invitation->save();

      return $invitation;
    }
  }