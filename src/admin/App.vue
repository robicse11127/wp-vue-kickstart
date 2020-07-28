<template>
    <div id="vue-backend-app">
        <h1>WP Vue KickStart</h1>
        <general-tab></general-tab>
    </div>
</template>

<script>
import GeneralTab from './components/GeneralTab.vue'
export default {
    name: 'App',
    components: {
        'general-tab': GeneralTab
    }
}
</script>

<style>

</style>