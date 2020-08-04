import Axios from 'axios'

export const mutations = {
    SET_SETTINGS: ( state, payload ) => {
        let url = 'http://wpdev.local/wp-json/wpvk/v1/settings'
        Axios.post( url, {
            textfield: payload.textfield
        } )
        .then( ( response ) => {
            console.log( response.data )
        } )
        .catch( ( error ) => {
            console.log( error )
        } )
    }
}