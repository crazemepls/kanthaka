<template>
    <div class="bg-gradient-primary">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6s col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" id="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name = "email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
<!--                                            <span v-if=@{{// errors.email}} class="help-block"><strong>@{{ errors.name }}</strong></span>-->
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name = "password" placeholder="Password">
<!--                                            <span v-if=@{{errors.password}} class="help-block"><strong>@{{ errors.password }}</strong></span>-->
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { mapActions, mapMutations, mapGetters, mapState } from 'https://unpkg.com/vuex@3.1.1/dist/vuex.js';
    export default {
        data() {
            return {
                data: {
                    email: '',
                    password: '',
                    // remember_me: false
                }
            }
        },
        created() {
            if (this.isAuth) {
                this.$router.push({ name: 'home' })
            }
        },
        computed: {
            ...mapGetters(['isAuth']),
            ...mapState(['errors'])
        },
        methods: {
            ...mapActions('auth', ['submit']),
            ...mapMutations(['CLEAR_ERRORS']),
            postLogin() {
                this.submit(this.data).then(() => {
                    if (this.isAuth) {
                        this.CLEAR_ERRORS()
                        this.$router.push({ name: 'home' })
                    }
                })
            }
        }
    }
</script>