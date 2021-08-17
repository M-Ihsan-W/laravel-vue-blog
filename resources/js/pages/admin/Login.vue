<template>
  <div>
    <header-component></header-component>
    <section class="text-center flex-column">
      <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="message != null">
        <strong v-text="message"></strong>
        <button @click.prevent="removeMessage" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <main class="form-signin">
        <form @submit.prevent="login">
          <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
          <div class="form-floating my-2">
            <input v-model="form.email" type="email" name="email" class="form-control" :class="{ 'is-invalid': errors.email }" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            <div class="invalid-feedback" v-if="errors.email">{{ errors.email[0] }}</div>
          </div>
          <div class="form-floating my-2">
            <input v-model="form.password" type="password" name="password" class="form-control" :class="{ 'is-invalid': errors.password }" id="current-password" placeholder="Password">
            <label for="current-password">Password</label>
            <div class="invalid-feedback" v-if="errors.password">{{ errors.password[0] }}</div>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <router-link to="/register" style="color: #202020; text-decoration: none">Create Account</router-link>
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
        email: '',
        password: '',
        _token: '',
      },
      errors: [],
      message: null,
    }
  },
  mounted() {
    this.message = sessionStorage.getItem('success-regist');
    setTimeout(function() {
      sessionStorage.removeItem('success-regist');
    }, 5000);
    // axios.get('/sanctum/csrf-cookie').then(response => {
    //   console.info(response);
    // });
    // axios.get('/api/token').then(response => {
    //   console.info(response);
    //   this.form._token = response.data;
    // });
  },
  methods: {
    login() {
      axios.post('/api/login', this.form).then((response) => {
        this.$router.push({ name: 'dashboard' });
      }).catch((error) => {
        this.errors = error.response.data.errors;
      });
    },
    removeMessage() {
      sessionStorage.removeItem('success-regist');
    }
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