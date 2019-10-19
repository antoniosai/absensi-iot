<template>
  <div>
    <div id="container" class="cls-container">

		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay"></div>


		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
                        <img src="/uploads/logo/logo_smk.png" style="height: 170px" alt="">
                        <h1 class="h3">ABSENSIs IoT</h1>
		            </div>
                    <form @submit.prevent="login">
		                <div class="form-group">
		                    <input type="email" name="email" v-model="form.email" class="form-control" placeholder="Email" autofocus>
		                </div>
		                <div class="form-group">
		                    <input type="password" name="password" v-model="form.password" class="form-control" placeholder="Password">
		                </div>
		                <div class="checkbox pad-btm text-left">
		                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
		                    <label for="demo-form-checkbox">Remember me</label>
		                </div>
		                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
		            </form>
		        </div>

		    </div>
		</div>
		<!--===================================================-->





    </div>
  </div>
</template>


<script>
export default {
    data() {
        return {
          form: {
            email: "",
            password: ""
          }
        }
    },
    methods: {

        async login() {

          let email = this.email
            let password = this.password
            this.$store.dispatch('login', this.form)
            .then(() => {
                swal("Sukses!", "Anda berhasil login!", "success");

                this.$router.push('/dashboard')
            })
            .catch(err => {
                swal("Gagal!", "Anda gagal login!", "warning");
            })

        }
    }
}
</script>
