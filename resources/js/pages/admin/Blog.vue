<template>
  <div>
    <admin-header></admin-header>
    <admin-wrap>
      <admin-navigation></admin-navigation>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Blog</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <router-link :to="{ name: 'CreatePost' }" class="btn btn-primary mb-2 ml-2 d-flex justify-content-center align-items-center">
            <i class="bi bi-plus-circle"></i>
            <span class="mx-2">New Data</span>
          </router-link>
          <form method="POST" class="d-flex mb-2 mr-2">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" id="keyword">
            <button class="btn btn-outline-success" type="submit" name="search" id="searchBtn">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped text-center my-table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Creator</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(post, index) in posts">
                <td>{{ index + 1 }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.category }}</td>
                <td>{{ post.creator }}</td>
                <td>{{ post.updated_at.substring(0,10) }}</td>
                <td>
                  <router-link :to="{ name: 'UpdatePost', params: { id: post.id } }" class="btn btn-success">
                    <i class="bi bi-pencil-square"></i>
                  </router-link>
                  <button @click="getDataId(post.id, post.title)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </admin-wrap>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
          </div>
          <div class="modal-body">
            <p>Are you sure delete this <strong v-text="title"></strong> ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal">Cancel</button>
            <button @click.prevent="deletePost" type="button" class="btn btn-danger" id="deleteBtn">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: null,
      posts: [],
      id: null,
      title: null,
    }
  },
  mounted() {
    axios.get('/api/user').then((response) => {
      this.user = response.data;
    });
    this.getData();
  },
  methods: {
    getData() {
      axios.get('/api/posts').then((response) => {
        this.posts = response.data;
      });
    },
    getDataId(id, title) {
      this.id = id;
      this.title = title;
    },
    deletePost() {
      axios.delete(`/api/delete/post/${this.id}`).then((response) => {
        this.getData();
        this.closeModal();
      });
    },
    closeModal() {
      let modal = document.querySelectorAll('.modal .btn-cancel');
      for(let i = 0; i < modal.length; i++) {
        modal[i].click();
      }
    }
  },
}
</script>

<style>
:root {
  --clr-black: #202020;
  --clr-white: #F7F7F7;
}
.my-table thead {
  background-color: var(--clr-black);
  color: var(--clr-white);
}
.modal-content {
  border-radius: 0;
}
.modal-header {
  border: 0;
}
.modal-footer {
  border: 0;
}
</style>