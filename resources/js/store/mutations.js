let mutations = {
    LOADING (state, payload) {
        state.status.loading = payload
    },

    SET_LIST (state, payload) {
        state.list = payload
    },

    UNSET_DATA (state, payload) {
        let i = state.find(item => item.id === payload.id);

        state.list.splice(i, 1);
    }
}

export default mutations;