export const getters = {
    GET_GENERAL_SETTINGS: ( state ) => {
        return state.settings.general
    },

    GET_LOADING_TEXT: ( state ) => {
        return state.loadingText
    }
}