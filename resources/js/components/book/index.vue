<template>

    <div>

        <div class="row">
            <router-link to="/store-book" class="btn btn-primary">Add Book </router-link>

        </div>
        <br>
        <div class="col-md-6">
            <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
        </div>

        <div class="col-md-6">
                                                    <!-- <label for="exampleFormControlSelect1">Genre</label>
                                                    <select class="form-control custom-select" id="exampleFormControlSelect1"
                                                        v-model="genre_id" @change="filtersearch">
                                                        <option v-for="genre in genres" :value="genre.id">
                                                            {{genre.name}}</option>

                                                    </select> -->

                                                    
        </div>
        <br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Book List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="book in filtersearch" :key="book.id">
                                    <td> {{ book.code }} </td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.genre.name }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-book', params:{id:book.id}}"
                                            class="btn btn-sm btn-primary">Edit</router-link>

                                        <a @click="deleteBook(book.id)" class="btn btn-sm btn-danger">
                                            <font color="#ffffff">Delete</font>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->



    </div>


</template>



<script type="text/javascript">
export default {
    mounted() {
        
    },

    created() {
        this.allGenres();
        this.allBooks();
    },
    data() {
        return {
            books: [],
            searchTerm: '',
            genres: [], 

        }
    },
    computed: {
        filtersearch() {
            return this.books.filter(book => {
                return book.title.toUpperCase().includes(this.searchTerm.toUpperCase())
            })
        }
    },

    methods: {
        allBooks() {
            axios.get('/api/book/')
                .then(({
                    data
                }) => (this.books = data))
                .catch()
        },
        allGenres() {
            axios.get('/api/genre/')
                .then(({
                    data
                }) => (this.genres = data))
                .catch()
            },
        deleteBook(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    axios.delete('/api/book/' + id)
                        .then(() => {
                            this.books = this.books.filter(book => {
                                return book.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({
                                name: 'book'
                            })
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })

        }

    },
    


}
</script>


<style type="text/css">

</style>