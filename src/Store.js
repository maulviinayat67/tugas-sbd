import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state : {
    foods : [],
    cart : {
      tableNumber : '',
      foods : [],
      bill : 0
    }
  },
  mutations : {
    LOAD_FOOD_DATA(state, data){
      state.foods = data
    },
    LOAD_PICKED_FOOD_DATA(state){
      state.cart.foods = state.foods.filter(food => {
        return food.picked == true
      })
    },
    PICK_FOOD(state,data){
      data.picked = !data.picked
      data.jumlah = 1
    },
    BILL(state){
      let t = 0
      for(let i in state.cart.foods){
          t += (state.cart.foods[i].jumlah * parseInt(state.cart.foods[i].harga))
      }
      state.cart.bill = t
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
          return response.data
        })
        .then((data) => {
          state.commit('LOAD_FOOD_DATA', addAttribute(data))
        })
    },
    pickFood : (state, data) =>{
      state.commit('PICK_FOOD',data)
      state.commit('LOAD_PICKED_FOOD_DATA')
    },
    updateBill:(state) =>{
      state.commit('BILL')
    }
  }
})


//additionals
function addAttribute(data){
  let temp = []
  data.forEach((item) => {
    item.picked = false;
    temp.push(item)
  })

  return temp;
}

// function categorized(categoryType, data){
//   let temp = []
//   data.forEach((item) => {
//     if(item.tipe == categoryType){
//       item.picked = false;
//       temp.push(item)
//     }
//   })
//
//   return temp;
// }
