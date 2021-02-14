<template>
	<div>
		<main class="form-signin">
		<form @submit.prevent="submitForm" >
				<img
					class="mb-4"
					src="https://via.placeholder.com/150"
					alt=""
					width="72"
					height="57"
				/>
				<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
				<div class="alert alert-warning" v-if="isLogin"> 
					<span class="spinner-border text-warning"></span>
					Please wait.. validating your credential
				</div>
				<label for="inputEmail" class="visually-hidden"
					>Email address</label
				>
				<input
					v-model="email"
					type="email"
					class="form-control"
					placeholder="Email address"
					autofocus
				/>
				<div class="text-danger">{{email_error}}</div>
				<label for="inputPassword" class="visually-hidden"
					>Password</label
				>
				<input
					v-model="password"
					type="password"
					class="form-control"
					placeholder="Password"
				/>
				<div class="text-danger">{{password_error}}</div>
				<button class="btn btn-lg btn-primary" type="submit">
					Sign in
				</button>
				<router-link to="/registration" class="btn btn-lg btn-warning" >Register</router-link>
			</form>
		</main>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				email: '',
				password: '',
				email_error: '',
				password_error: '',
				isLogin: false
			}
		},
		methods: {
			submitForm() {
				this.isLogin = true;
				this.$query('login', {
					customer: {
						email:this.email,
						password:this.password
					}
				}).then(res => {
					this.isLogin = false;
					if(res.data.errors) {
						let errors = Object.values(res.data.errors[0].extensions.validation).flat();
						let errors_keys = Object.keys(res.data.errors[0].extensions.validation).flat();

						this.email_error = errors_keys.some(q => q === "customer.email") ? errors[errors_keys.indexOf("customer.email")] : "";
						this.password_error = errors_keys.some(q => q === "customer.password") ? errors[errors_keys.indexOf("customer.password")] : "";

					} else {
						let token = res.data.data.login;
						if(token) {
							sessionStorage.setItem('api-token', token);
							this.$appEvents.$emit('customer-logon');
							this.$router.push('/customer/dashboard');
						} else {
							this.$swal(
								'Error!',
								'Invalid email or password',
								'error'
							)
						}
					}
				});
			}
		}
	}
</script>
