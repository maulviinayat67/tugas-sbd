<template id="">
  <section id="food-list">
    <div class="container">
      <header>
        <h3>Foods</h3>
      </header>
      <div class="row">
        <div v-for="item in foods" class="col-md-2 col-sm-4 col-xs-4">
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
        <div v-for="item in drinks" class="col-md-2 col-sm-4 col-xs-4">
          <div class="item">
            <img :src="item.gambar" alt="gambar makanan">
            <div class="">
              <p>
                {{item.nama}}
              </p>
              <p>
                {{item.harga}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script type="text/javascript">

export default {
  data(){
    return {
        foods : [],
        drinks : []
    }
  },
  created(){
    this.$http.get('api/v1/makanan').then((response) => {
      console.log(response);
      this.foods = categorized('makanan',response.data)
      this.drinks = categorized('minuman',response.data)
    })
  }

}


function categorized(categoryType, data){
  let temp = []
  data.forEach((item) => {
    if(item.tipe == categoryType){
      temp.push(item)
    }
  })

  return temp;
}
</script>
