<template lang="html">

  <section id="cart">
    <div class="">
        <h3>Pesanan</h3>
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
    </div>
  </section>

</template>

<script>
import {
	mapGetters
} from 'vuex'

export default {
	mounted() {
		// console.log(this.cartData);
	},
	data() {
		return {}
	},
	methods: {
    pick(foodOrDrink){
      this.$store.dispatch('pickFood',foodOrDrink)
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
        this.$store.dispatch('pickFood',target)
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
		...mapGetters(['cartData']),
		hasPickedFood: function() {
			let temp = [];
			this.cartData.foods.forEach((item) => {
				if (item.tipe == 'makanan') {
					temp.push(item)
				}
			})
			console.log(temp);
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
			console.log(temp);
			if (temp.length != 0) {
				return true
			} else {
				return false
			}
		}
	}
}
</script>
