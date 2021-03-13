import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2';
import axios from 'axios';
Vue.prototype.$axios = axios
import SweetModal from 'sweet-modal-vue/src/plugin.js'
import 'sweetalert2/dist/sweetalert2.min.css';
import 'axios/dist/axios.min.js';

Vue.use(VueSweetalert2,SweetModal);
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
