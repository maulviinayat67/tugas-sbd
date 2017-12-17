<template lang="html">

  <section id="cart">
    <div class="">
        <h3>Pesanan</h3>
    </div>
    <div class="">
      <table>
        <h5>Makanan</h5>
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
        </tr>
        <h5>Minuman</h5>
        <tr v-for="drink in cartData.foods" v-if="drink.tipe == 'minuman'">
          <td>{{drink.nama}}</td>
          <td>
            <div class="input-group number-custom">
              <span class="input-group-btn">
                <button class="btn btn-default">-</button>
              </span>
              <input min='1' class="form-control" v-model="drink.jumlah">
              <span class="input-group-btn">
                <button class="btn btn-default">+</button>
              </span>
            </div>
          </td>
          <td>Rp {{drink.jumlah * drink.harga}}</td>
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
		console.log(this.cartData);
	},
	data() {
		return {
			// cartData: {
			// 	foods: [{
			// 			id_makanan: "MA1",
			// 			nama: "Nasi Goreng",
			// 			tipe: "makanan",
			//       jumlah:1,
			// 			harga: "10000",
			// 			gambar: "http://localhost/tugas-sbd//assets/gambar/6891691.jpg"
			// 		},
			// 		{
			// 			id_makanan: "MA2",
			// 			nama: "Empal Gentong",
			//       jumlah:1,
			// 			tipe: "makanan",
			// 			harga: "15000",
			// 			gambar: "http://localhost/tugas-sbd//assets/gambar/6449601.png"
			// 		},
			// 		{
			// 			id_makanan: "MI1",
			// 			nama: "Jus Mangga",
			//       jumlah:1,
			// 			tipe: "minuman",
			// 			harga: "8000",
			// 			gambar: "http://localhost/tugas-sbd//assets/gambar/azusa1.jpg"
			// 		}
			// 	]
			// }
		}
	},
	methods: {
		decrease(target) {
			let min = null
			if ($('input').attr('min') != null) {
				min = $('input').attr('min')
			}

      if (min != null) {
        if (target.jumlah > 0) {
            target.jumlah--
        }
      }
      else{
        target.jumlah--
      }

			this.$store.dispatch('updateBill')
			console.log(this.cartData);
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
      }
      else{
        target.jumlah++
      }

			this.$store.dispatch('updateBill')
			console.log(this.cartData);
		}
	},
	computed: {
		...mapGetters(['cartData'])
	}
}
</script>
