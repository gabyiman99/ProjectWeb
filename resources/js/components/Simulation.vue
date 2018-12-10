<template lang="pug">
form-wizard(@on-complete="onComplete", shape='tab', color='#005BAA', title='Formulir Aplikasi Pinjaman', subtitle='Silahkan isi formulir dibawah ini')
	tab-content(title='Rincian Personal')
		b-form-group(id='grupNomorRekening', label='Nomor Rekening', label-for='rekening')
			b-form-input(id='rekening', v-model="rekening", placeholder='Masukan nomor rekening anda.', name='rekening', :state="!$v.rekening.$invalid", aria-describedby='rekeningInvalid')
			b-form-invalid-feedback(id='rekeningInvalid') Kolom ini tidak boleh kosong

		b-form-group(id='grupPemilikRekening', label='Pemilik Rekening', label-for='nama')
			b-form-input(id='nama', v-model="nama", placeholder='Masukan nama yang tertera sebagai Pemilik Rekening.', name='nama', :state="!$v.nama.$invalid", aria-describedby='namaInvalid')
			b-form-invalid-feedback(id='namaInvalid') Kolom ini tidak boleh kosong dan hanya bisa huruf

		b-form-group(id='grupTelepon', label='Nomor Telepon', label-for='telepon')
			b-form-input(id='telepon', v-model='telepon', placeholder='Masukan nomor telepon anda yang dapat kami hubungi.', name='telepon', :state="!$v.telepon.$invalid", aria-describedby='teleponInvalid')
			b-form-invalid-feedback(id='teleponInvalid') Kolom ini tidak boleh kosong

		b-form-group(id='grupTipePinjaman', label='Tipe Pinjaman', label-for='tipePinjaman')
			b-form-select(id='tipePinjaman', v-model='tipePinjaman', :options='loanoptions', name='tipePinjaman')
				template(slot='first')
					option(:value="null" disabled) Pilih tipe pinjaman.

		b-form-group(id='grupPlafon', label='Plafon Pinjaman', label-for='plafon')
			b-form-input(id='plafon', v-model='plafon', placeholder='Masukan nilai plafon yang anda butuhkan', name='plafon', :state="!$v.plafon.$invalid", aria-describedby='plafonInvalid')
			b-form-invalid-feedback(id='plafonInvalid') Kolom ini tidak boleh kosong
	tab-content(title='Rincian Keuangan', :before-change="kmkvalidation")
		b-form-group(id='grupOmset', label='Omset Usaha', label-for='omsetUsaha')
			b-form-input(id='omsetUsaha', v-model='omsetUsaha', placeholder='Masukan jumlah piutang berjalan anda', name='omsetUsaha', :state="!$v.omsetUsaha.$invalid", aria-describedby='omsetUsaha')

		b-form-group(id='grupHPP', label='Total Harga Pokok Penjualan', label-for='hpp')
			b-form-input(id='hpp', v-model='hpp', placeholder='Masukan total harga pokok penjualan anda', name='hpp', :state="!$v.hpp.$invalid", aria-describedby='hpp')

		b-form-group(id='grupPiutangUsaha', label='Lama Piutang Usaha', label-for='piutangUsaha')
			b-form-input(id='piutangUsaha', v-model='piutangUsaha', placeholder='Masukan waktu piutang berjalan anda', name='piutangUsaha', :state="!$v.piutangUsaha.$invalid", aria-describedby='piutangUsaha')

		b-form-group(id='grupInventoriUsaha', label='Lama Inventori/Stok Usaha', label-for='inventoriUsaha')
			b-form-input(id='inventoriUsaha', v-model='inventoriUsaha', placeholder='Masukan waktu keseluruhan stok dan inventori usaha anda.', name='inventoriUsaha', :state="!$v.inventoriUsaha.$invalid", aria-describedby='inventoriUsaha')

		b-form-group(id='grupHutang', label='Lama Hutang Berjalan', label-for='hutang')
			b-form-input(id='hutang', v-model='hutang', placeholder='Masukan lama hutang usaha anda.', name='hutang', :state="!$v.hutang.$invalid", aria-describedby='hutang')

		b-form-group(id='grupKMK', label='Total Kebutuhan Modal Kerja', label-for='kmk')
			b-form-input(disabled, v-model='kmk', id='kmk')
</template>


<script>
import { validationMixin } from "vuelidate"
import { required, alpha, numeric } from "vuelidate/lib/validators"

export default {
	props: ['loanoptions'],
	data () {
		return {
			rekening:'',
			nama:'',
			telepon:'',
			tipePinjaman:null,
			plafon:'',
			omsetUsaha:'',
			hpp:'',
			piutangUsaha:'',
			inventoriUsaha:'',
			hutang:''
		}			
	},
	mixins: [
      validationMixin
    ],
    validations: {
        tipePinjaman: {
          required
        },
        rekening: {
          required,
          numeric   
		},
		nama: {
          required  
		},
		telepon: {
          required,
          numeric   
		},
		plafon: {
          required,
          numeric   
		},
		omsetUsaha: {
          required,
          numeric
        },
        hpp: {
          required,
          numeric   
		},
		piutangUsaha: {
          required,
          alpha   
		},
		inventoriUsaha: {
          required,
          numeric   
		},
		hutang: {
          required,
          numeric   
        }
    },
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
		},
		kmkvalidation: function(){
			if (this.plafon < this.kmk) {
				return true;
			} else {
				alert("This is called before switchind tabs")
				return false;
			}
		}
	},
	computed: {
        kmk: function () {
            return Math.round(this.omsetUsaha * ( this.hpp/100 ) * ( this.piutangUsaha + this.hutang + this.inventoriUsaha ))
        }
    }
}
</script>


<style>

</style>
