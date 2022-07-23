<template>

    <div>

        <div class="row">
            <router-link to="/store-book" class="mt-4 btn btn-primary">Нова книга</router-link>
        </div>
        <br>

        <div class="form-group">
            <div class="form-row">

                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Търсене по заглавие</label>
                    <input type="text" v-model="searchTerm" class="form-control" placeholder="">
                </div>

                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Жанр</label>
                    <select class="form-select" v-model="genre_id">
                            <option value="0" selected> ---</option>
                            <option v-for="genre in genres" :value="genre.id">{{genre.name}}</option>
                    </select>
                </div>

            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 m-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-2 font-weight-bold text-primary">Списък с книгите</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Код</th>
                                    <th>Заглавие</th>
                                    <th>Автор</th>
                                    <th>Жанр</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="book in filtersearch" :key="book.id">
                                    <td> {{ book.code }} </td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.genre.name }}</td>
                                    <td>
                                        <router-link :to="{name: 'editbook', params:{id:book.id}}"
                                            class="btn btn-sm btn-primary">
                                            <i class="far fa-edit"></i>
                                        </router-link>

                                        <a @click="deleteBook(book.id)" class="btn btn-sm btn-danger">
                                            <font color="#ffffff">
                                            <i class="fas fa-trash-alt"></i>
                                        </font>
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
            genre_id: 0, 

        }
    },
    computed: {
        filtersearch() {
            return this.books.filter(book => {
                if(this.genre_id == 0) {
                return book.title.toUpperCase().indexOf(this.searchTerm.toUpperCase()) > -1
                } else {
                    return (book.title.toUpperCase().indexOf(this.searchTerm.toUpperCase()) > -1) &&
                        (book.genre_id == this.genre_id)   
                }
    
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
                text: "It will delete book and all rental records for it!",
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
                        'Book has been deleted.',
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