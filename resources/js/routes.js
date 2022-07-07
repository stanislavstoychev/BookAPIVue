
let z = require('./components/home.vue').default;
let storebook = require('./components/book/create.vue').default;
let book = require('./components/book/index.vue').default;
let editbook = require('./components/book/edit.vue').default;


// Empoyee Component



export const routes = [
    { path: '/book', component: book, name: 'book' },
    { path: '/store-book', component: storebook, name: 'storebook' },
    { path: '/edit-book', component: editbook, name: 'editbook' },

  ]