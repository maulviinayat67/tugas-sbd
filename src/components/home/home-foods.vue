<template id="">
  <section id="food-list">
    <div class="container">
      <header>
        <h3>Foods</h3>
      </header>
      <div class="row">
        <div v-for="item in foodData.foods" class="col-md-3 col-sm-6 col-xs-12 card">
          <div class="item">
            <img :src="item.gambar" alt="gambar makanan">
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
        <div v-for="item in foodData.drinks" class="col-md-3 col-sm-6 col-xs-12 card">
          <div class="item">
            <img :src="item.gambar" alt="gambar makanan">
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
import {mapGetters} from 'vuex'

export default {
  data(){
    return {
        foods : [],
        drinks : []
    }
  },
  computed:mapGetters(['foodData'])
}
</script>
