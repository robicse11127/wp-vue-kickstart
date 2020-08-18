<template>
    <div id="wpvk-general-setting-tab" class="tab-container">
        <h2>Settings Form</h2>
        <form id="wpvk-general-setting-form" @submit="saveSettings">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="firstname">Firstname</label>
                        </th>
                        <td>
                            <input id="firstname" class="regular-text" type="text" v-model="formData.firstname">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="lastname">Lastname</label>
                        </th>
                        <td>
                            <input id="lastname" class="regular-text" type="text" v-model="formData.lastname">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="email">Email</label>
                        </th>
                        <td>
                            <input id="email" class="regular-text" type="email" v-model="formData.email">
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <button type="submit" class="button button-primary">{{ loadingText }}</button>
            </p>
        </form>
        <div class="clear"></div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    name: 'GeneralTab',

    data() {
        return {}
    },

    mounted() {
        this.fetchSettings()
    },

    computed: {
        ...mapGetters([ 'GET_GENERAL_SETTINGS', 'GET_LOADING_TEXT' ]),

        formData: {
            get() {
                return this.GET_GENERAL_SETTINGS
            },
        },

        loadingText: {
            get() {
                return this.GET_LOADING_TEXT
            }
        }
    },

    methods: {
        ...mapActions([ 'FETCH_SETTINGS', 'SAVE_SETTINGS'  ]),

        saveSettings(e) {
            e.preventDefault();
            this.SAVE_SETTINGS( this.formData )
        },

        fetchSettings() {
            this.FETCH_SETTINGS()
        }

    }
}
</script>

<style>

</style>