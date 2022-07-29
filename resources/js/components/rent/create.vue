<template>
    <div>
        <div class="row">
            <router-link to="/rent" class="btn btn-primary ">Книги в клиентите</router-link>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mt-4">Наемане на книга</h1>
                                    </div>
                                    <form class="user" @submit.prevent="rentInsert" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-row">
                                                        <div class="col-md-3">
                                                            <label for="code">
                                                                Код:
                                                            </label>
                                                        <input type="text" class="form-control" placeholder=""
                                                            v-model="code">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select class="form-select" size="3" aria-label="size 3 select example" v-model="form.book_id">
                                                              <option value="0">Избери книга</option>
                                                              <option v-for="book in filterBook" :value="book.id">
                                                                {{book.title}}, {{book.author}}</option>
                                                            </select>
                                                                <small class="text-danger" v-if="errors.book_id">
                                                                Изберете книга
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-row">
                                                        <div class="col-md-3">
                                                            <label for="egn">
                                                            ЕГН:
                                                            </label>
                                                            <input type="text" class="form-control" placeholder=""
                                                            v-model="egn">
                                                        </div>
                                                        <div class="col-md-9">
                                                           <select class="form-select" size="3" aria-label="size 3 select example" v-model="form.subscriber_id">
                                                              <option value="0">Избери клиент</option>
                                                              <option v-for="subscriber in filterSubscriber" :value="subscriber.id">
                                                                {{subscriber.name}}</option>
                                                            </select>
                                                                <small class="text-danger" v-if="errors.subscriber_id">
                                                                Избери Клиент
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="date">Дата:</label>
                                                    <input type="date" class="form-control"
                                                         v-model="form.get_date">
                                                    <small class="text-danger" v-if="errors.get_date">
                                                        {{errors.get_date[0]}}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Наемане</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">

                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    created() {
        this.allSubscribers();
        this.allBooks();

    },
    computed: {
        filterBook() {
            return this.books.filter(book => {
                return book.code.indexOf(this.code) > -1
            })
        },
        filterSubscriber() {
            return this.subscribers.filter(subscriber => {
                return subscriber.egn.indexOf(this.egn) > -1
            })
        },
    },
    data() {
        return {

            form: {
                book_id: 0,
                subscriber_id: 0,
                get_date: null,
                code: null,
                egn: null
            },
            errors: {},
            subscribers: [],
            books: [],
            code: '',
            egn: '',

        }
    },
    methods: {

        allSubscribers() {
            axios.get('/api/subscriber')
                .then(({
                    data
                }) => (this.subscribers = data))
                .catch()
        },
        allBooks() {
            axios.get('/api/book')
                .then(({
                    data
                }) => (this.books = data))
                .catch()
            },
        rentInsert() {
            axios.post('/api/rent', this.form)
                .then((data) => {
                    this.$router.push({
                        name: "rent",
                    })
                    Notification.success()
                })
                .catch(error => this.errors = error.response.data.errors)
        },


    }
}


</script>

<style>










</style>
