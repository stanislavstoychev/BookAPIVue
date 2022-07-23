
let z = require('./components/home.vue').default;

//Books
let storebook = require('./components/book/create.vue').default;
let book = require('./components/book/index.vue').default;
let editbook = require('./components/book/edit.vue').default;
//Rent
let storerent = require('./components/rent/create.vue').default;
let rent = require('./components/rent/index.vue').default;
let editrent = require('./components/rent/edit.vue').default;




 //Books Component
export const routes = [
    { path: '/book', component: book, name: 'book' },
    { path: '/store-book', component: storebook, name: 'storebook' },
    { path: '/edit-book/:id', component: editbook, name: 'editbook' },
 //Rented Component
    { path: '/rent', component: rent, name: 'rent' },
    { path: '/store-rent', component: storerent, name: 'storerent' },
    { path: '/edit-rent/:id', component: editrent, name: 'editrent' },
  ]