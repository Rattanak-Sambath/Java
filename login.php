<?php
include 'session/check_if_session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- quasar -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>

<body>
    <!-- Add the following at the end of your body tag -->
    <div id="q-app">
        <div class="window-height window-width row justify-center items-center ">
            <img src="public/john-towner-JgOeRuGD_Y4-unsplash.jpg" alt="" style="width: 100%; height: 100%; position: absolute;"  >
            <div class="column float">
                <div class="row">
                    <q-card flat bordered  >

                        <q-card-section>
                            <div class="text-center q-mb-lg ">
                                <img src="https://www.svgrepo.com/show/176688/rabbit-animals.svg" alt=""
                                    style="width: 70px; height: 70px" />
                                <q-toolbar-title>
                                    Rabbit Technology
                                </q-toolbar-title>
                            </div>
                            <q-form class=" q-gutter-xs" @submit.prevent.stop="onLogin()">
                                <!-- username -->
                                <div class="q-pa-xs">
                                    <q-input ref="email"  v-model="form.email" autofocus outlined label="Username"
                                        :rules="[val => !!val || 'email is required']" />
                                </div>

                                <!-- password -->
                                <div>
                                    <q-input ref="password" v-model="form.password" outlined type="password"
                                        label="Password" :rules="[val => !!val || 'Password is required']" />
                                </div>

                                <div class="q-pa-xs">
                                    <q-btn :loading="loading" push color="positive" size="lg" dense class="full-width"
                                        label="Login" type="submit">

                                    </q-btn>
                                    <q-btn :loading="loading1" push color="indigo-10" size="lg"
                                        class="full-width q-my-xs" dense label="Register" type="register"
                                        @click="register()">

                                    </q-btn>
                                </div>

                            </q-form>
                        </q-card-section>
                    </q-card>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.umd.min.js"></script>

    <script>
    var app = new Vue({
        el: "#q-app",
        name: "Login",
        data: function() {
            return {
                form: {
                    email: "",
                    password: "",
                },
                loading: false,
                loading1: false,
            };
        },
        methods: {
            onLogin() {
                this.$refs.email.validate();
                this.$refs.password.validate();

                if (this.$refs.email.hasError || this.$refs.password.hasError) {
                    // check when value null
                } else {
                    this.loading = true;
                    axios
                        .post("./action/login_action.php", {
                            action: "login",
                            email: this.form.email,
                            password: this.form.password,
                        })
                        .then((res) => {
                            if (res.data.status == "login_success") {
                                this.$q.notify({
                                    message: "Login",
                                    position: "top-right",
                                    type: "positive",
                                });
                                setTimeout(() => {
                                    this.loading = false;
                                    window.location.href = "dashboard.php";
                                }, 500);
                            } else {
                                setTimeout(() => {
                                    this.loading = false;
                                    this.$q.notify({
                                        message: res.data.status,
                                        position: "top-right",
                                        type: "negative",
                                    });
                                }, 500);
                            }
                        });
                }
            },
            register() {
                window.location.href = "register.php";
            }

        },
    });
    </script>

</body>

</html>
<style>
.q-card {
    width: 500px;
    
  
}
</style>