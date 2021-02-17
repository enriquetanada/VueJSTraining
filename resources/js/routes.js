import Login from './front/Login.vue';
import Registration from './front/Registration.vue';
import Dashboard from './customer/Dashboard.vue';
import BlogCategory from './customer/BlogCategory.vue';
import BlogCategoryAdd from './customer/BlogCategoryAdd.vue';
import BlogCategoryEdit from './customer/BlogCategoryEdit.vue';




export default [
	{ path: '/', component: Login, meta: {requiresAuth: false}},
	{ path: '/registration', component: Registration, meta: {requiresAuth: false}},
	{ path: '/customer/dashboard', component: Dashboard, meta: {isCustomer:true}},
	{ path: '/customer/blog-category', component: BlogCategory, meta: {isCustomer:true}},
	{ path: '/customer/blog-category/new', component: BlogCategoryAdd, meta: {isCustomer:true}},
	{ path: '/customer/blog-category/edit/:id', component: BlogCategoryEdit, meta: {isCustomer:true}},
	{ path: '/customer', component: Dashboard, meta: {isCustomer:true}}



];