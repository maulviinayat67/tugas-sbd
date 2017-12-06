<template id="">
  <div class="">
      <home-hero></home-hero>
      <home-foods></home-foods>
  </div>

</template>
<script type="text/javascript">

  import HomeHero from './home-hero_image.vue'
  import HomeFoods from './home-foods.vue'

  export default {
    components : {
      'home-hero' : HomeHero,
      'home-foods' : HomeFoods

    }
  }
</script>
