<template lang="html">

  <section id="cart">
    <div class="">

    </div>
    <div class="">
      <table>
          <tr v-for="foods in cart.foods">
            <td>{{food.nama}}</td>
            <td>IDR{{food.harga}}</td>
            <td><input type="number" :value="food.jumlah"/></td>
            <td>IDR {{food.harga * food.jumlah}}</td>
          </tr>
      </table>
    </div>
  </section>

</template>

<script>

import {mapGetters} from 'vuex'

export default {
  computed: mapGetters(['cartData'])
}
</script>
