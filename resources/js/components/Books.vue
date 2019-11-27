<template>
    <div>
        <h2>Books</h2>
    </div> 
</template>
<script>
        export default {
            data(){
                return {
                     books: [],
                book: {
                    id: '',
                    title: '',
                    author: '',
                    description:'',
                    user_id:'',
                },
                book_id:'',
                pagination: {},
                edit: false
                }
            },
            created(){
                this.fetchBooks();
            },
            methods: {
                fetchBooks(){
                    fetch('api/Books')
                    .then(res => res.json())
                    .then(res=>{
                        console.log(res,data)
                    });
                }
            }
        }
    </script>