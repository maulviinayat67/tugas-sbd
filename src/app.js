import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource'

import App from './components/app.vue'

Vue.use(VueResource)
Vue.use(Vuex)

import {store} from './Store'

let app = new Vue({
  el : '#RestoApp',
  render : h=>h(App),
  store : store,
  beforeCreate(){
    store.dispatch('loadFoods')
  }
})
