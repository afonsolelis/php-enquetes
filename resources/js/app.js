/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vuex from 'Vuex';
Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const store = new Vuex.Store({
    state: {
        options: {}
    },
    mutations: {
        setOptions(state, obj) {
            state.options = obj;
        }
    }

})
const app = new Vue({
    el: '#app',
    store,
    created() {
        console.log('criado!');
        window.Echo.channel('vote.created')
            .listen('VoteCreated', (e) => {

                console.log(this.$store.state.options);
                var that = this;
                this.$store.state.options.forEach(function(option, index) {

                    console.log('e', e.option);
                    if(option.id == e.option.id) {
                        that.$store.state.options[index].votes++;
                    }
                });

            });
    },

    methods: {
        atualizar(e) {

        }
    }

});

