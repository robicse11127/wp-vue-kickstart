import Vue from 'vue'
import Vuex from 'vuex'
import Router from 'vue-router'
import store from '../store/index'
import App from './App.vue'
import Settings from './components/pages/Settings.vue'
import TabNavigation from './components/tabs/Navigation.vue'
import GeneralTab from './components/tabs/GeneralTab.vue'
import AnotherTab from './components/tabs/AnotherTab.vue'
import VueRouter from 'vue-router'

Vue.use( Vuex )
Vue.use( Router )

const routes = [
    {
        path: '/', components: { default: GeneralTab, tab: TabNavigation },
    },
    {
        path: '/another', components: { default: AnotherTab, tab: TabNavigation },
    },
    {
        path: '/settings', components: { default: Settings },
    },
]

const router = new VueRouter({
    routes,
})

new Vue({
    el: '#wpvk-admin-app',
    store,
    router,
    render: h => h( App )
})