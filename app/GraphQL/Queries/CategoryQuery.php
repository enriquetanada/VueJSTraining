<?php
namespace App\GraphQL\Queries;

use App\Models\BlogCategory;
use App\Models\Customer;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Log;




class CategoryQuery extends Query
{
   protected $attributes = [
       'name' => 'category query'
   ];

   public function type(): Type {
        return Type::listOf(GraphQL::type('categoryType'));
   }

   public function resolve($root, $args){

        $blog_category_model = new BlogCategory();
        $customer_model = new Customer();

        $customer = $customer_model->GetCustomerID();
        $blog_category = $blog_category_model->DisplayCategoryByCustomerID($customer->id);


        return $blog_category;
   }
       
}







?>