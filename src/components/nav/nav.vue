<template id="">
<nav class="navbar navbar-default navbar-fixed-top navbar-transparent">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">Resto</a>

			<div class="navbar-menu-left">

			</div>

			<div class="navbar-menu-right">
				<button type="button" name="button" class="btn btn-custom-dark" @click="openCart()">Pesanan
          </button>
			</div>

		</div>

		<div class="navbar-right">

		</div>
	</div>
</nav>
</template>
<script type="text/javascript">
export default {
	mounted() {

		$(window).scroll(function() {
			if ($(document).scrollTop() > 80) {
				$('nav').removeClass('navbar-transparent');
				// $('nav').addClass('shrink');
			} else {
				$('nav').addClass('navbar-transparent');
			}
		});

	},
	methods: {
		openCart() {
			let cartWidth = document.getElementById("cart").style.width
      console.log(cartWidth);
			if (cartWidth == 0 ||cartWidth == '0px') {

				// document.getElementById("cart").style.display = "fixed";
				document.getElementById("cart").style.width = "499px";
        $('#cart').removeClass('closed')
			} else {

				document.getElementById("cart").style.width = "0";
        $('#cart').addClass('closed')
				// document.getElementById("cart").style.display = "none";
			}
		}
	}
}
</script>
