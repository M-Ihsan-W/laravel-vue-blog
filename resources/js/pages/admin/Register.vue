<template>
  <div>
    <header-component></header-component>
    <section class="text-center">
      <main class="form-signin">
        <form @submit.prevent="registerData">
          <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
          
          <div class="form-floating mb-2">
            <input v-model="form.name" type="text" class="form-control" name="name" id="floatingInputName" placeholder="name" :class="{ 'is-invalid': errors.name }">
            <label for="floatingInputName">Name</label>
              <div class="invalid-feedback" v-if="errors.name">{{ errors.name[0] }}</div>
          </div>
          <div class="form-floating mb-2">
            <input v-model="form.email" type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="name@example.com" :class="{ 'is-invalid': errors.email }">
            <label for="floatingInputEmail">Email address</label>
            <div class="invalid-feedback" v-if="errors.email">{{ errors.email[0] }}</div>
          </div>
          <div class="form-floating mb-2">
            <input v-model="form.password" type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" :class="{ 'is-invalid': errors.password }">
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback" v-if="errors.password">{{ errors.password[0] }}</div>
          </div>
          <div class="form-floating mb-2">
            <input v-model="form.password_confirmation" type="password" class="form-control" name="password_confirmation" id="floatingPasswordConfirmation" placeholder="Password Confirmation" :class="{ 'is-invalid': errors.password }">
            <label for="floatingPasswordConfirmation">Password Confirmation</label>
            <div class="invalid-feedback" v-if="errors.password">{{ errors.password[0] }}</div>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
          <router-link to="/login" style="color: #202020; text-decoration: none">Already have Account</router-link>
          <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
      </main>
    </section>
    <footer-component></footer-component>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      errors: []
    }
  },
  methods: {
    registerData() {
      axios.post('/api/register', this.form).then((response) => {
        sessionStorage.setItem("success-regist", "Register Successfull !! Please login...");
        this.$router.push('/login');
      }).catch((error) => {
        console.info(error.response);
        this.errors = error.response.data.errors;
      });
    },
  }
}
</script>

<style>
  body {
    background-color: #f5f5f5;
  }
  section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }
  .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
  }
</style>