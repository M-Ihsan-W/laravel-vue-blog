<template>
  <div>
    <header-component></header-component>
    <main>
      <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">Home My Project</span>
          </a>
        </header>

        <div class="bg-light rounded-3 my-jumbotron" >
          <div class="p-5 mb-4 my-jumbotron" :style="{ 'background-image': 'url(' + mainHome + ')' }">
            <div class="container-fluid py-5" >
              <h1 class="display-5 fw-bold">Mau Ngapain ?</h1>
              <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores laborum inventore, dignissimos incidunt vitae aut ab expedita, similique ad quas aspernatur obcaecati iusto veritatis dolorem odit a provident illum quod.</p>
              <router-link class="btn btn-primary btn-lg" to="/posts">Pergi dan Cari Postingan</router-link>
            </div>
          </div>
        </div>

        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3 my-jumbotron">
              <h2>Cari dan temukan tempat terbaik</h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas dolores non debitis error natus obcaecati placeat optio perferendis similique delectus?</p>
              <button class="btn btn-outline-light" type="button">Expolre Here</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3 my-jumbotron">
              <h2>Search and Find best place</h2>
              <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
              <button class="btn btn-outline-secondary" type="button">Explore here</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer-component></footer-component>
  </div>
  
</template>

<script>
export default {
  computed: {
    assetPath() {
      return process.env.ASSET_PATH || "";
    },
    mainHome() {
      return this.assetPath + "/images/mainhome.png";
    },
    slide2image() {
      return this.assetPath + "/images/sub1.jpg";
    },
  },
}
</script>

<style>
  .my-jumbotron {
    background-position: 80% 60%;
    background-repeat: no-repeat;
  }
</style>