const BASE_URL = '/api/v1';

let actions = {
    FETCH_API ({commit}, payload) {
        return new Promise((resolve, reject) => {

            commit('LOADING', true);

            axios.get(`${BASE_URL}/tours`, {
                params: {}
            })
            .then(response => {
                console.log(response);
                commit('SET_LIST', response.data.data);
                resolve(response.data);
            })
            .catch(err => {
                reject(err)
            })

        })
    }
};

export default actions;
