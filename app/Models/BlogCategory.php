<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class BlogCategory extends Eloquent {

    
    public function DisplayCategoryByCustomerID($customer_id){
        return self::where('customer_id', '=', $customer_id)->get();
    }

    public function CheckCategoryName($name, $customer_id) {
        $category= self::where('name', '=', $name)->where('customer_id', '=', $customer_id)->first();

        return $category;
    }
    public function SaveCategory($type, $name, $customer_id){
        if($type ==0) {
            $category = new self;
            $category->customer_id = $customer_id;
        } else {
            $category = self::find($type);
        }
        $category->name = $name;
        $category->save();

    }
}


?>