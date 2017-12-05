<template id="">
<section id="hero">
	<div class="hero-welcome">
		<figure class="item" v-for="item in sliderItem">
			<div class="overlay">
			</div>
			<img :src="item.img" alt="Image Slider">
			<figcaption>
				<p>{{item.header}}</p>
				<p>{{item.subheader}}</p>
        <a style="margin-top:32px" href="#menu" class="btn btn-lg btn-default btn-custom">Pick Now</a>
			</figcaption>
		</figure>
	</div>
</section>
</template>

<script type="text/javascript">
export default {

	mounted() {
		$('.hero-welcome').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			speed: 500
		});
	},
	data() {
		return {
			sliderItem: [{
					img: 'assets/img/landing-page-1.jpg',
					header: 'welcome to resto',
					subheader: 'eat and enjoy'
				},
				{
					img: 'assets/img/landing-page-2.jpg',
					header: 'pick what you want',
					subheader: 'so pick as much as you want'
				}
			]
		}
	}
}
</script>
