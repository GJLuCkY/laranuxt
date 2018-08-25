import Vuex from 'vuex'
import axios from '@/plugins/axios'


const createStore = () => {
  return new Vuex.Store({
    state: {
        products: [

        ],
        filters: [

        ],
        category: {},
        pagination: {},

    },
    getters: {
      getProducts(state) {
        return state.products
      },
      getFilters(state) {
        return state.filters
      },
      getCategory(state) {
        return state.category
      },
      getPagination(state, pagination) {
        return state.pagination
      }        
    },
    mutations: {
      SET_PRODUCTS(state, products) {
        state.products = products
      },
      SET_FILTERS(state, filters) {
        state.filters = filters
      },
      SET_CATEGORY(state, category) {
        state.category = category
      },
      SET_PAGINATION(state, pagination) {
        state.pagination = pagination
      }
        
    },
    actions: {
        getCategoryPartials(context, payload) {
          return Promise.all([
            context.dispatch('getProducts', payload),
            context.dispatch('getFilters', payload.category)
          ])
        },
        getProducts({commit}, payload) {
          axios.get(`/catalog/${payload.category}?page=${payload.page}`)
            .then((response) => {
                commit('SET_PRODUCTS', response.data.data)
                commit('SET_CATEGORY', response.data.meta.category)
                commit('SET_PAGINATION', response.data.meta)
            })
        },
        getFilters({commit}, category) {
          axios.get(`/filter/${category}`)
            .then((response) => {
              commit('SET_FILTERS', response.data.data)
            })
        }
    }
  })
}

export default createStore
