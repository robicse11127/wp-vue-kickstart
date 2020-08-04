<template>
    <div id="wpvk-general-setting-tab">
        <h1>General Tab</h1>
        <form id="wpvk-general-setting-form" @submit="saveForm">
            <input type="text" v-model="formData.textfield">
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'GeneralTab',

    data() {
        return {
            formData: {
                textfield: ''
            }
        }
    },

    methods: {
        saveForm(e) {
            e.preventDefault();
            this.$store.dispatch( 'SAVE_SETTINGS', this.formData )
        }
    }
}
</script>

<style>

</style>