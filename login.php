<?php
include 'session/check_if_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <!-- quasar -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
  <!-- axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>

<body>
  <!-- Add the following at the end of your body tag -->
  <div id="q-app">
    <div class="window-height window-width row justify-center items-center bg-primary">
      <div class="column">
        <div class="row">
          <q-card flat bordered class="q-pa-lg shadow-1 bg-grey-3">
            <q-card-section>
              <q-form class="q-gutter-xs" @submit.prevent.stop="onLogin()">
                <!-- username -->
                <div class="q-pa-xs">
                  <q-input ref="username" v-model="form.username" autofocus outlined label="Username" :rules="[val => !!val || 'Username is required']" />
                </div>

                <!-- password -->
                <div>
                  <q-input ref="password" v-model="form.password" outlined type="password" label="Password" :rules="[val => !!val || 'Password is required']" />
                </div>

                <div class="q-pa-xs">
                  <q-btn :loading="loading" push color="positive" size="lg" class="full-width" label="Login" type="submit">

                  </q-btn>
                </div>
                <div class="q-pa-sm">
                  <q-btn push color="primary" size="lg" class="full-width" label="Show Info" @click="showInfo()" />
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
    new Vue({
      el: '#q-app',
      name: 'Login',
      data: function() {
        return {
          form: {
            username: '',
            password: '',
          },
          loading: false,
        }
      },
      methods: {
        onLogin() {
          this.$refs.username.validate()
          this.$refs.password.validate()

          if (this.$refs.username.hasError || this.$refs.password.hasError) {
            // check when value null
          } else {
            this.loading = true;
            axios.post('./action/login_action.php', {
              action: 'login',
              username: this.form.username,
              password: this.form.password
            }).then(res => {
              if (res.data.status == "login_success") {
                console.log(res.data.status);
                console.log(res.data);
                this.$q.notify({
                  message: 'Login',
                  position: 'top-right',
                  type: 'positive'
                })
                setTimeout(() => {
                  this.loading = false
                  window.location.href = 'index.php';
                }, 500);
              } else {
                setTimeout(() => {
                  this.loading = false
                  this.$q.notify({
                    message: res.data.status,
                    position: 'top-right',
                    type: 'negative'
                  })
                }, 500);
                console.log(res.data.status);
              }
            })
          }
        },
        showInfo() {
          window.location.href = 'public/index.php'
        },
      }
    })
  </script>
</body>

</html>
<style>
  .q-card {
    width: 500px;
  }
</style>