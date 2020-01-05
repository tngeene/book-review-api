<template>
  <div>
    <h1>Upload a Book</h1>
    <form @submit.prevent="addBook">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Book Title:</label>
            <input type="text" class="form-control" v-model="book.title">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Author:</label>
              <input type="text" class="form-control" v-model="book.author">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Book Description:</label>
              <textarea class="form-control" v-model="book.description" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Upload</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          book:{}
        }
    },
    methods: {
      addBook(){
          let url = '/books';
          this.axios.post(url, this.book).then((response)=>{
              this.$router.push({name: 'dashboard'});
          })
        console.log(this.book);
      }
    }
  }
</script>