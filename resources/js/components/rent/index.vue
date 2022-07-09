<template>

    <div>

        <div class="row">
            <router-link to="/store-rent" class="mt-4 btn btn-primary">Наемане на книга</router-link>
        </div>
        <br>

        <div class="form-group">
            <div class="form-row">

                <div class="col-md-6">
                    <label for="title">Търсене по заглавие</label>
                    <input type="text" v-model="searchTerm" class="form-control" placeholder="">
                </div>

                <div class="col-md-6">
                    <label for="subscriber">Наемател</label>
                    <select class="form-select" v-model="subscriber_id" @change="filtersearch">
                            <option value="0" selected> ---</option>
                            <option v-for="subscriber in subscribers" :value="subscriber.id">{{subscriber.name}}</option>
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
                        <h6 class="m-2 font-weight-bold text-primary">Списък наетите книги</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Код</th>
                                    <th>Заглавие</th>
                                    <th>Автор</th>
                                    <th>Жанр</th>
                                    <th>В клиент</th>
                                    <th>Взета на</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rent in filtersearch" :key="rent.id">
                                    <td> {{ rent.book.code }} </td>
                                    <td>{{ rent.book.title }}</td>
                                    <td>{{ rent.book.author }}</td>
                                    <td>{{ rent.book.genre.name }}</td>
                                    <td>{{ rent.subscriber.name }}</td>
                                    <td>{{ rent.get_date }}</td>
                                    <td>
                                        <router-link :to="{name: 'editrent', params:{id:rent.id}}"
                                            class="btn btn-sm btn-primary">
                                            <i class="far fa-edit"></i>
                                        </router-link>

                                        <a @click="deleteRent(rent.id)" class="btn btn-sm btn-danger">
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
        this.allSubscribers();
        this.allRents();
    },
    data() {
        return {
            rents: [],
            searchTerm: '',
            subscribers: [],
            genre_id: 0,
            subscriber_id: 0,

        }
    },
    computed: {
        filtersearch() {
            return this.rents.filter(rent => {
                if(this.subscriber_id == 0) {
                return rent.book.title.toUpperCase().indexOf(this.searchTerm.toUpperCase()) > -1
                } else {
                    return rent.book.title.toUpperCase().indexOf(this.searchTerm.toUpperCase()) > -1 &&
                        rent.subscriber.id == this.subscriber_id   
                }
    
            })
        }
    },

    methods: {
        allRents() {
            axios.get('/api/rentedbooks')
                .then(({
                    data
                }) => (this.rents = data))
                .catch()
        },
        allSubscribers() {
            axios.get('/api/subscriber')
                .then(({
                    data
                }) => (this.subscribers = data))
                .catch()
            },
        deleteRent(id) {
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
                    axios.delete('/api/rent/' + id)
                        .then(() => {
                            this.rents = this.rents.filter(rent => {
                                return rent.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({
                                name: 'rent'
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