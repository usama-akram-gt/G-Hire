/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    created(){
        Echo.private('testChannel')
        .listen('messagesEvent', (e) => {
            console.log(e.to);
            var today = new Date();
            var li = $('<li class="media media-chat-item-reverse"></li>');
            li.html('<div class="media-body"><div class="media-chat-item">' + e.message + '</div><div class="font-size-sm text-muted mt-2">' + today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate() + ' ' + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds() +'<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div></div><div class="ml-3"><a href="#"><img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt=""></a></div>');            
            $("#chat_list").append(li);
        });
    }
});