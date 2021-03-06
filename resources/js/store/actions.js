const BASE_URL = '/api/v1';

let actions = {
    FETCH_API ({commit}, payload) {
        return new Promise((resolve, reject) => {

            commit('LOADING', true);

            axios.get(`${BASE_URL}/${payload.url}`, {
                params: {}
            })
            .then(response => {
                commit('SET_LIST', response.data.data);
                resolve(response.data);
            })
            .catch(err => {
                reject(err)
            })

        })
    },

    POST_API ({ commit }, payload ) {
        return new Promise((resolve, reject) => {

            commit('LOADING', true);

            axios
            .post(`${BASE_URL}/${payload.url}`, payload)
            .then(response => {
                resolve(response.data);
            })
            .catch(err => {
                reject(err)
            })

        })
    },

    SHOW_API ({ commit }, payload) {
        return new Promise ((resolve,reject) => {

            commit('LOADING', true)
            
            axios.get(`${BASE_URL}/${payload.url}`)
            .then(response => {
                commit('SET_LIST_ITEM', response.data.data);
                resolve(response.data);
            })
            .catch(err => {
                reject(err)
            })

        })
    },

    UPDATE_API({ commit }, payload) {
        return new Promise ((resolve, reject) => {

            commit('LOADING', true)

            axios
            .put(`${BASE_URL}/${payload.url}`, payload)
            .then(response=> {
                commit('UPDATE_LIST_ITEM', response.data.data);
                resolve(response)
            })
            .catch(err => {
                reject(err)
            })

        })
    },

    DELETE_API ({ commit }, payload) {
        return new Promise ((resolve, reject) => {

            commit('LOADING', true)

            axios
            .delete(`${BASE_URL}/${payload.url}`)
            .then(response => {
                commit('UNSET_LIST_ITEM', response.data.data.id);
                resolve(response.data);
            })
            .catch(err => {
                reject(err)
            })

        })
    }
};

export default actions;
