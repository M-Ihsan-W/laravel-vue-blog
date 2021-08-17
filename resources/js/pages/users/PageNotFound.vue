<template>
  <div class="d-flex h-100 text-center text-white bg-dark justify-content-center align-items-center error-container">
    <main class="px-3">
      <h1>ERROR 404</h1>
      <p class="lead">Page Not Found</p>
      <p class="lead">
        <router-link to="/" class="btn btn-lg btn-secondary fw-bold border-white bg-dark">Back to Home</router-link>
      </p>
    </main>
  </div>
</template>
<script>
</script>
<style>
.error-container {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
}
</style>