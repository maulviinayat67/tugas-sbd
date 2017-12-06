import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state : {
    foods : {
      foods : [],
      drinks : []
    },
    cart : {
      tableNumber : '',
      foods : [],
      drinks : [],
      bill : ''
    }
  },
  mutations : {
    LOAD_FOOD_DATA(state, data){
      state.foods = data
    },
    PICK_FOOD(state,data){

    }
  },
  getters : {
    foodData : (state) => {
      return state.foods
    },
    cartData : (state) => {
      return state.cart
    }
  },
  actions : {
    loadFoods : (state) => {
      Vue.http.get('api/v1/makanan')
        .then((response)=>{
          // console.log(response);
          return response.data
        })
        .then((data) => {
          let temp = {
            foods : categorized('makanan',data),
            drinks : categorized('minuman',data)
          }

          state.commit('LOAD_FOOD_DATA', temp)
        })
    },
    pickFood : (state) =>{

    }
  }
})


//additionals
function categorized(categoryType, data){
  let temp = []
  data.forEach((item) => {
    if(item.tipe == categoryType){
      temp.push(item)
    }
  })

  return temp;
}
