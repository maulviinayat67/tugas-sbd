<template lang="html">
  <section id="cart" class="closed">
    <div class="cart-header">
        <h3>Pesanan</h3>
        <button type="button" name="button" class="btn btn-custom" @click="openCart()">
          Tutup
        </button>
    </div>
    <div class="">
      <h5>Meja</h5>
      <div class="list">
        <p>Pilih meja : </p>
        <div class="meja">
          <div class="item" v-for="(value, key) in tableData" @click="pickTable(value)" :class="{'not-available':value.isTersedia=='tidak tersedia', picked:value.picked && value.isTersedia=='tersedia'}">
            <p>{{value.id_meja}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="">
      <table>
        <h5>Makanan</h5>
        <tr class="message" v-show="!hasPickedFood">
          <td   colspan="3">Silahkan Pilih Makanan</td>
        </tr>
        <tr v-for="food in cartData.foods" v-if="food.tipe == 'makanan'">
          <td>{{food.nama}}</td>
          <td>
            <div class="input-group number-custom">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="decrease(food)">-</button>
              </span>
              <input min='1' readonly class="form-control" :value="food.jumlah">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="increase(food)">+</button>
              </span>
            </div>
          </td>
          <td>Rp {{food.jumlah * food.harga}}</td>
          <td>
            <button type="button" @click="pick(food)" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </td>
        </tr>
        <h5>Minuman</h5>
        <tr class="message" v-show="!hasPickedDrink">
          <td colspan="3">Silahkan Pilih Minuman</td>
        </tr>
        <tr v-for="drink in cartData.foods" v-if="drink.tipe == 'minuman'">
          <td>{{drink.nama}}</td>
          <td>
            <div class="input-group number-custom">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="decrease(drink)">-</button>
              </span>
              <input min='1' readonly class="form-control" :value="drink.jumlah">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="increase(drink)">+</button>
              </span>
            </div>
          </td>
          <td>Rp {{drink.jumlah * drink.harga}}</td>
          <td>
            <button type="button" @click="pick(drink)" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </td>
        </tr>
        <tr>
          <td colspan="2"><h3>Total</h3></td>
          <td><h3>Rp {{cartData.bill}}</h3></td>
        </tr>
      </table>
      <div class="send">
        <button @click="send()" :disabled="!hasOrder" type="button" class="btn btn-default full-width" name="button">Pesan</button>
      </div>
    </div>
  </section>

</template>

<script>
import {
	mapGetters
} from 'vuex'

export default {
	mounted() {

	},
	data() {
		return {
      cartWidth:0
    }
	},
	methods: {
    openCart() {
      let cartWidth = document.getElementById("cart").style.width
      console.log(cartWidth);
      if(cartWidth == 0 ||cartWidth == '0px') {

        // document.getElementById("cart").style.display = "fixed";
        document.getElementById("cart").style.width = "499px";
        $('#cart').removeClass('closed')
      } else {

        document.getElementById("cart").style.width = "0";
        $('#cart').addClass('closed')
        // document.getElementById("cart").style.display = "none";
      }
    },
    send(){
      // console.log(this.cartData);

      this.$http.post('api/v1/order',this.cartData,{emulateJSON:true})
        .then((response)=>{
          // console.log(response);
          this.$store.dispatch('switchProgressStatus')
          this.$store.dispatch('loadTable')
          this.$store.dispatch('loadFoods')
          this.$store.dispatch('clearCart')
          this.$store.dispatch('updateBill')
          bootbox.alert('Terima Kasih Sudah Memesan')
          this.$store.dispatch('switchProgressStatus')
        })
    },
    pickTable(table){
      this.$store.dispatch('pickTable', table)
    },
		pick(foodOrDrink) {
			this.$store.dispatch('pickFood', foodOrDrink)
			this.$store.dispatch('updateBill')
		},
		decrease(target) {
			let min = null
			if ($('input').attr('min') != null) {
				min = $('input').attr('min')
			}

			if (min != null) {
				if (target.jumlah > 0) {
					target.jumlah--
				}
			} else {
				target.jumlah--
			}

			if (target.jumlah == 0) {
				this.$store.dispatch('pickFood', target)
			}

			this.$store.dispatch('updateBill')
		},
		increase(target) {
			let max = null
			if ($('input').attr('max') != null) {
				max = $('input').attr('max')
			}

			if (max != null) {
				if (target.jumlah < 0) {
					target.jumlah++
				}
			} else {
				target.jumlah++
			}

			this.$store.dispatch('updateBill')
		}
	},
	computed: {

    hasOrder(){
      if(this.cartData.foods.length != 0 && this.cartData.tableNumber.length != 0){
        return true
      }
      else{
        return false
      }

    },
		...mapGetters(['cartData', 'tableData']),
		hasPickedFood: function() {
			let temp = [];
			this.cartData.foods.forEach((item) => {
				if (item.tipe == 'makanan') {
					temp.push(item)
				}
			})
			if (temp.length != 0) {
				return true
			} else {
				return false
			}
		},
		hasPickedDrink: function() {
			let temp = [];
			this.cartData.foods.forEach((item) => {
				if (item.tipe == 'minuman') {
					temp.push(item)
				}
			})
			if (temp.length != 0) {
				return true
			} else {
				return false
			}
		}
	}
}
</script>
