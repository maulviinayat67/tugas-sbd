<template id="">
  <div class="">
    <div class="loader-container" :class="{'active':progressStatus}">
      <div class="loader">

      </div>
    </div>
    <div class="main-content" :class="{'loading':progressStatus}">
      <nav-bar></nav-bar>
      <home></home>
    </div>

  </div>

</template>
<script type="text/javascript">
import NavBar from './nav/nav.vue'
import Home from './home/home-main.vue'
import {mapGetters} from 'vuex'

export default {
	components: {
		'nav-bar': NavBar,
		'home': Home
	},
  computed : mapGetters(['progressStatus'])
}
</script>
