import Vue from 'vue'
import Fragment from 'vue-fragment'

Vue.use(Fragment.Plugin)

//Main pages
import App from './views/app.vue'

const app = new Vue({
    el: '#app',
    components: { App }
});
