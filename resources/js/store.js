import { createStore } from 'vuex'

// eslint-disable-next-line no-unused-vars
export default createStore({
  state: {
    sideBarOpen: false,
  },
  getters: {
    sideBarOpen: state => {
      return state.sideBarOpen
    },
  },
  mutations: {
    toggleSidebar (state) {
      state.sideBarOpen = !state.sideBarOpen
    },
  },
  actions: {
    toggleSidebar(context) {
      context.commit('toggleSidebar')
    },
  },
})
