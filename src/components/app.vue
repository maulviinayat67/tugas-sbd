<template id="">
  <div class="">
    <nav-bar></nav-bar>
    <home></home>
  </div>

</template>
<script type="text/javascript">
import NavBar from './nav/nav.vue'
import Home from './home/home-main.vue'

export default {
	components: {
		'nav-bar': NavBar,
		'home': Home
	}
}
</script>
