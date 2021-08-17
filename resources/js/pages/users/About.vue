<template>
  <div>
    <header-component></header-component>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
      <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <span class="fs-4">Muhammad Ihsan Wahyudin</span>
        </a>
      </header>

      <main>
        <div class="row">
          <div class="col-4">
            <img class="my-photo" src="/images/me.jpg" alt="Muhammad Ihsan Wahyudin">
          </div>
          <div class="col-8">
            <h1>Know About Me</h1>
            <p class="fs-5 col-md-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam corrupti autem quod, ab omnis quisquam nostrum voluptatem vero soluta fuga fugiat mollitia rem atque nesciunt.</p>

            <div class="mb-5 wrap-media">
              <a class="media mx-2" href="https://github.com/M-Ihsan-W/laravel-vue-blog.git"><i class="bi bi-github"></i> GitHub</a>
              <a class="media mx-2" href="#"><i class="bi bi-twitter"></i> Twitter</a>
              <a class="media mx-2" href="#"><i class="bi bi-facebook"></i> Facebook</a>
            </div>
          </div>
        </div>

        <hr class="col-12">

        <div class="row g-5">
          <div class="col-md-6">
            <h2>My Projects</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam, totam aperiam possimus est delectus esse debitis perspiciatis rem sequi quae!</p>
            <ul class="icon-list">
              <li><a href="https://github.com/M-Ihsan-W" rel="noopener" target="_blank">Blog SPA with Authenticate</a></li>
              <li class="text-muted">Make Beautiful website with ihsan</li>
            </ul>
          </div>

          <div class="col-md-6">
            <h2>Guides</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, nihil exercitationem! Voluptatem.</p>
            <ul class="icon-list">
              <li><a href="#">Lets take my project quick start guide</a></li>
              <li><a href="#">Ihsan Webpack guide</a></li>
              <li><a href="#">Ihsan Parcel guide</a></li>
              <li><a href="#">Contributing to My Project</a></li>
            </ul>
          </div>
        </div>

      </main>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<style>
:root {
  --clr-yellow: #FFC107;
  --clr-black: #202020;
}
.my-photo {
  width: 300px;
  height: 300px;
  object-fit: cover;
}
.wrap-media {
  display: flex;
  justify-content: start;
}
.media {
  display: inline-block;
  color: var(--clr-black);
  text-decoration: none;
  font-size: 16px;
}
.media:hover {
  color: var(--clr-yellow);
  text-decoration: none;
}
</style>