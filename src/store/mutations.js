import Axios from 'axios'

export const mutations = {
    UPDATE_SETTINGS: ( state, payload ) => {
        state.settings.general = payload
    },

    SAVED: ( state ) => {
        state.loadingText = 'Save Settings'
    },

    SAVING: ( state ) => {
        state.loadingText = 'Saving...'
    }

}