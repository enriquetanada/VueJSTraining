<?php
namespace App\GraphQL\Queries;

use App\Models\BlogCategory;
use App\Models\Customer;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Log;




class CheckCustomerQuery extends Query
{
   protected $attributes = [
       'name' => 'CheckCustomerQuery query'
   ];

   public function type(): Type {
        return Type::string('');
   }

   public function resolve($root, $args){

    return '';
   }
       
}







?>