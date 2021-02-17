<template>
    <div>
        <main class="container">

            <div class="starter-template text-left py-5 px-2 mt-3">
                <h1>Blog Category</h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <router-link to="/customer/blog-category/new" class="btn btn-lg btn-warning">Add new Category
                    </router-link>
                </div>
            </div>
            <div class="alert alert-warning" v-if="loaded">
                <span class="spinner-border text-warning"></span>
                Please wait.. loading category
            </div>
            <table class="table table-stripped" v-if="!loaded">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category_data in category" v-if="category.length > 0">
                        <td>{{category_data.name}}</td>
                        <td>
                            <router-link :to="`/customer/blog-category/edit/${category_data.id}`">Edit</router-link>
                            |
                            <router-link to="/customer/blog-category/delete">Delete</router-link>

                        </td>
                    </tr>
                    <tr v-if="category.length === 0">
                        <td colspan="2" class="text-danger">No record found</td>
                    </tr>
                </tbody>
            </table>

        </main>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                category: [],
                loaded: true
            }
        },
        created() {
            this.$query('category').then(res => {
                this.loaded = false;
                this.category = res.data.data.category;
            })
        }
    }

</script>
