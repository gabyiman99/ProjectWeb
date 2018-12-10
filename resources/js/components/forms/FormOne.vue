<template lang="pug">
fragment
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
			tipePinjaman:'',
			plafon:''
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
        }
    }
}
</script>
