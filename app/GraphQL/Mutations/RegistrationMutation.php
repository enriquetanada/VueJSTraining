<?php
namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Customer;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Log;
use Str;
use Hash;

class RegistrationMutation extends Mutation
{
    protected $attributes = [
        'name' => 'RegistrationMutation'
    ];
    public function args(): array
    {
        return [
            'customer' => ['type' => GraphQL::type('customerInput')]
        ];
    }

    public function type(): Type
    {
        return Type::string();
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
          'customer.firstname.required' => 'Please enter your first name',
          'customer.lastname.required' => 'Please enter your last name',
          'customer.email.required' => 'Please enter your email',
          'customer.password.required' => 'Please enter your password',
          'customer.email.email' => 'Please enter your valid email address',

        ];
    }

    protected function rules(array $args = []): array
    {
      $rules = [];
      $rules['customer.firstname'] = ['required'];
      $rules['customer.lastname'] = ['required'];
      $rules['customer.email'] = ['required', 'email'];
      $rules['customer.password'] = ['required'];

      return $rules;
    }
    

    public function resolve($root, $args)
    {
      $customer = $args['customer'];
      $customerRec = Customer::create([
        'firstname' => $customer['firstname'],
        'lastname' => $customer['lastname'],
        'email' => $customer['email'],
        'password' => Hash::make($customer['password'])

      ]);
      return '';
    }
}

 ?>
