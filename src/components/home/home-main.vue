<template id="">
  <div class="">
      <home-hero></home-hero>
      <home-foods></home-foods>
      <home-cart></home-cart>
  </div>

</template>
<script type="text/javascript">

  import HomeHero from './home-hero_image.vue'
  import HomeFoods from './home-foods.vue'
  import HomeCart from './home-cart.vue'

  export default {
    components : {
      'home-hero' : HomeHero,
      'home-foods' : HomeFoods,
      'home-cart' : HomeCart

    }
  }
</script>
