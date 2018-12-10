<template lang="pug">
fragment
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
	data() {
		return {
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
    computed: {
        kmk: function () {
            return this.omsetUsaha * ( this.hpp/100 ) * ( this.piutangUsaha + this.hutang + this.inventoriUsaha )
        }
    }
}
</script>