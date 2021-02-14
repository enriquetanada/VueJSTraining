<?php
namespace App\GraphQL\Types;

use App\Models\BlogCategory;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $inputObject = true;
    protected $attributes = [
        'name' => 'CategoryType',
        'description' => 'A customer type information'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string()
            ],
            'customer_id' => [
                'type' => Type::string()
            ],
        ];
    }
}

?>