<template lang="html">

  <section id="cart">
    <div class="">
        <h3>Pesanan</h3>
    </div>
    <div class="">
      <table>
        <h5>Makanan</h5>
        <tr v-for="food in foods">
          <td>{{food.nama}}</td>
          <td>
            <div class="input-group number-custom">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="decrease(food.id)">-</button>
              </span>
              <input min='1' readonly class="form-control" v-model="food.jumlah">
              <span class="input-group-btn">
                <button class="btn btn-default" @click="food.jumlah++">+</button>
              </span>
            </div>
          </td>
          <td>Rp {{food.jumlah * food.harga}}</td>
        </tr>
        <h5>Minuman</h5>
        <tr v-for="drink in drinks">
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
          <td><h3>Rp {{billTotalHarga}}</h3></td>
        </tr>
      </table>
    </div>
  </section>

</template>

<script>
import {mapGetters} from 'vuex'

export default {
  data(){
    return {
      foods : [
        {
          id : "001",
          nama : "Nasi Goreng",
          harga : 10000,
          jumlah : 1
        },
        {
          id : "003",
          nama : "Cumi Bakar",
          harga : 12000,
          jumlah : 1
        },
        {
          id : "005",
          nama : "Kangkung Saus Tiram",
          harga : 8000,
          jumlah : 1
        }
      ],
      drinks : [
        {
          id : "002",
          nama : "Jus Avocado",
          harga : 10000,
          jumlah : 1
        },
        {
          id : "004",
          nama : "Es Teh Manis",
          harga : 5000,
          jumlah : 1
        }
      ]
    }
  },
  methods:{
    decrease(value){
      let min = null
      if($('input').attr('min') != null){
          min = $('input').attr('min')
      }

      console.log(min);
      for(let i in this.foods){
        if(this.foods[i].id == value){
          if(min != null){
            if(this.foods[i].jumlah )
              this.foods[i].jumlah--
          }
          else if (min == null){
            this.foods[i].jumlah--
          }
        }
      }


    }
  },
  computed: {
    // mapGetters(['cartData']),
    billTotalHarga : function(){
      let hargaMakanan = 0;
      let hargaMinuman = 0;
      for(let index in this.foods){
        hargaMakanan += (this.foods[index].jumlah * this.foods[index].harga)
      }
      for(let index in this.drinks){
        hargaMinuman += (this.drinks[index].jumlah * this.drinks[index].harga)
      }

      return hargaMakanan + hargaMinuman
    },
    // total
  }
}
</script>
