import Vue from 'vue';
import axios from 'axios';


let queries = {
    registration: `mutation registration($customer: CustomerInput){
        registration(customer: $customer)
    }`,
    login: `mutation login($customer: CustomerInput){
        login(customer: $customer)
    }`,
    category: `{category{id,name}}`,
    checkcustomer: `query CheckCustomerQuery {
        checkcustomer
    }`,
    savecategory: `mutation savecategory($name: String, $id: Int) {
        savecategory(name: $name, id: $id) {
            error,
            message
        }         
    }`,
    category: `query fetchSingleCategory($category_id: String){
        category(category_id: $category_id) {
            id,
            name
        }
    }` 

    
};

let customerQueries = [
    'checkcustomer', 'category', 'savecategory'
]

function getApiUrl(queryName) {

    let segment = '';

    if(customerQueries.some(q =>q===queryName)) {
        segment = '/customer';
    }

    return `graphql${segment}`;
}

Vue.prototype.$query = function(queryName, queryVariables){

    var token = "";

    if(customerQueries.some(q =>q===queryName)) {
        token = sessionStorage.getItem('api_token');
    }

    let options = {
        url:getApiUrl(queryName),
        method: 'POST',
        data: {
            query: queries[queryName]
        }
    };
    if(queryVariables) {
        options.data.variables = queryVariables;
    }
    
    if(token) {
        options.headers = {
            Authorization: `Bearer ${token}`,
        }
    }
    return axios(options);
}

