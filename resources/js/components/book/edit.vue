<template>
    <div>
        <div class="row">
            <router-link to="/book" class="btn btn-primary">Всички книги</router-link>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Редактиране на книгата</h1>
                                    </div>
                                    <form class="user" @submit.prevent="bookUpdate" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">

                                                <div class="col-md-6">
                                                    <label for="code">
                                                        Код:
                                                    </label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        v-model="form.code">
                                                    <small class="text-danger" v-if="errors.code">
                                                        {{errors.code[0]}}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="title">
                                                        Заглавие:
                                                    </label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        v-model="form.title">
                                                    <small class="text-danger" v-if="errors.title">
                                                        {{errors.title[0]}}
                                                    </small>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">

                                                <div class="col-md-6">
                                                    <label for="genre">Жанр</label>
                                                    <select class="form-select" id="genre"
                                                        v-model="form.genre_id">
                                                        <option v-for="genre in genres" :value="genre.id">
                                                            {{genre.name}}</option>

                                                    </select>
                                                    <small class="text-danger" v-if="errors.genre_id">
                                                        {{errors.genre_id[0]}}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                
                                                    <label for="author">Автор:</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        v-model="form.author">
                                                    <small class="text-danger" v-if="errors.author">
                                                        {{errors.author[0]}}
                                                    </small>
                                                </div>





                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Обнови</button>
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
    axios.get('/api/genre').then(({
            data
        }) => {
            this.genres = data
        })
        
        let id = this.$route.params.id;

        axios.get('/api/book/' + id)
            .then(({
                data
            }) => {
                this.form = data
            })
            .catch(console.log('error'))

    },
    data() {
        return {

            form: {
                code: null,
                title: null,
                author: null,
                genre_id: null,
            },
            errors: {},
            genres: {},
        }
    },
    methods: {


        bookUpdate() {
        let id = this.$route.params.id
           axios.patch('/api/book/'+id,this.form)
           .then(() => {
            this.$router.push({ name: 'book'})
            Notification.success()
           })
           .catch(error =>this.errors = error.response.data.errors)
        },


    }
}


</script>

<style>

</style>
