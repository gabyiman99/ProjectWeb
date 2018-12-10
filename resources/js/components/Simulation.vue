<template lang="pug">
form-wizard(@on-complete="onComplete", shape='tab', color='#005BAA', title='Formulir Aplikasi Pinjaman', subtitle='Silahkan isi formulir dibawah ini')
	tab-content(title='Rincian Personal', icon='ti-user')
		form-one(:loanoptions='loanoptions')
	tab-content(title='Rincian Keuangan', icon='ti-settings')
		form-two
</template>


<script>
export default {
	props: ['loanoptions'],
	methods: {
    	onComplete: function(){
        	axios.post('/api/loan', {
				rekening: this.rekening,
				nama: this.nama,
				telepon: this.telepon,
				tipePinjaman: this.tipePinjaman,
				plafon: this.plafon,
				kmk: this.kmk,
				dsc: this.dsc
			})
			.then(function (response) {
				console.log(response);
			})
			.catch(function (error) {
				console.log(error);
			});
       	}
    }
}
</script>


<style>

</style>
