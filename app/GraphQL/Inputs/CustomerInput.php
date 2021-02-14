<?php
namespace App\GraphQL\Inputs;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CustomerInput extends GraphQLType
{
    protected $inputObject = true;
    protected $attributes = [
        'name' => 'CustomerInput',
        'description' => 'A customer information'
    ];

    public function fields(): array
    {
        return [
            'firstname' => [
                'type' => Type::string()
            ],
            'lastname' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'password' => [
                'type' => Type::string()
            ],
        ];
    }
}

?>