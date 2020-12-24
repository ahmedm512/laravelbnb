<template>
 <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="form-group" mb-3>
                  <input name="email" class="form-control" type="email" placeholder="example@email.com" 
                  v-model="email"
                  :class="[{'is-invalid': errorFor('email')}]"
                  >
                  <v-errors :errors="errorFor('email')"></v-errors>
                </div>
                
                <div class="form-group mb-4">
                  <input class="form-control" type="password" placeholder="Password" 
                  v-model="password"
                  :class="[{'is-invalid': errorFor('password')}]"
                  >
                  <v-errors :errors="errorFor('password')"></v-errors>
                </div>
               
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="button" :disabled="loading"
                    @click.prevent="login" >Log-in</button>
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <router-link :to="{name: 'register'}" class="btn btn-lg btn-outline-light mt-3"> Register Now!</router-link> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </body>
</template>

<script>
import validationErrors from "../shared/mixins/validationErrors";

export default {
  mixins:[validationErrors],
  name: 'Login',
  data(){
    return {
      email: null,
      password:null,
      loading: false,
    };
  },
  methods: {
     async login(){
       this.loading = true;
       this.errors = null;

       try {
            await axios.get('/sanctum/csrf-cookie');
            await axios.post("/login", {
                email: this.email,
                password: this.password
            });
            await axios.get('/user');
       } catch(error){
         this.errors = error.response && error.response.data.errors;

       }
        this.loading = false;

     }
  }
}
</script>
