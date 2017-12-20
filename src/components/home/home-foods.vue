<template id="">
<section id="food-list">
	<div class="container">
		<header>
			<h3>Foods</h3>
		</header>
		<div class="row">
			<div v-for="item in foods" @click="pick(item)" :class="{picked:item.picked}" class="col-md-3 col-sm-6 col-xs-12 card">
				<div class="item">
					<img :src="item.gambar" alt="gambar makanan">
					<figcaption v-show="item.picked" class="message">
						<span><p>Sudah dipilih</p></span>
					</figcaption>
					<figcaption class="">
						<p>
							{{item.nama}}
						</p>
						<p>
							IDR {{item.harga}}
						</p>
					</figcaption>
				</div>
			</div>
		</div>
	</div>

	<p></p>

	<div class="container">
		<header>
			<h3>Drinks</h3>
		</header>
		<div class="row">
			<div v-for="item in drinks" @click="pick(item)" class="col-md-3 col-sm-6 col-xs-12 card" :class="{picked:item.picked}">
				<div class="item">
					<img :src="item.gambar" alt="gambar makanan">
					<figcaption v-show="item.picked" class="message">
						<span><p>Sudah dipilih</p></span>
					</figcaption>
					<figcaption class="">
						<p>
							{{item.nama}}
						</p>
						<p>
							IDR {{item.harga}}
						</p>
					</figcaption>
				</div>
			</div>
		</div>
	</div>
</section>
</template>
<script type="text/javascript">
import {
	mapGetters
} from 'vuex'

export default {
	mounted: function() {

	},
	updated: function() {
		// console.log(this.foodData);
	},
	data() {
		return {

		}
	},
	methods: {
		pick(foodOrDrink) {
			if (!foodOrDrink.picked) {
				this.$store.dispatch('pickFood', foodOrDrink)
				this.$store.dispatch('updateBill')
			}

		}
	},
	computed: {
		...mapGetters(['foodData']),
		foods: function() {
			let temp = []
			this.foodData.forEach((item) => {
				if (item.tipe === "makanan") {
					temp.push(item)
				}
			})

			return temp
		},
		drinks: function() {
			let temp = []
			this.foodData.forEach((item) => {
				if (item.tipe === "minuman") {
					temp.push(item)
				}
			})

			return temp
		}
	}

}
</script>
