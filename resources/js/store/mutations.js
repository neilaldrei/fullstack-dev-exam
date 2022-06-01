let mutations = {
    LOADING (state, payload) {
        state.status.loading = payload
    },

    SET_LIST (state, payload) {
        state.list = payload
    },

    ADD_TO_LIST (state, payload) {
        state.list.unshift(payload);
    },

    UPDATE_LIST_ITEM (state, payload) {
        let i = state.list.findIndex((item => item.id === payload.id));
        state.list[i].name = payload.name
        state.list[i].itenary = payload.itenary
        state.list[i].status = payload.status
    },

    SET_LIST_ITEM (state, payload) {
        state.item = payload
    },

    UNSET_LIST_ITEM (state, payload) {
        let i = state.list.findIndex((item => item.id === payload));

        state.list.splice(i, 1);
    },
}

export default mutations;