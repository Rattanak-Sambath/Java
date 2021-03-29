var app = new Vue({
  el: "#q-app",
  name: "Login",
  data: function () {
    return {
      form: {
        username: "",
        password: "",
      },
      loading: false,
    };
  },
  methods: {
    onLogin() {
      this.$refs.username.validate();
      this.$refs.password.validate();

      if (this.$refs.username.hasError || this.$refs.password.hasError) {
        // check when value null
      } else {
        this.loading = true;
        axios
          .post("./action/login_action.php", {
            action: "login",
            username: this.form.username,
            password: this.form.password,
          })
          .then((res) => {
            if (res.data.status == "login_success") {
              console.log(res.data.status);
              console.log(res.data);
              this.$q.notify({
                message: "Login",
                position: "top-right",
                type: "positive",
              });
              setTimeout(() => {
                this.loading = false;
                window.location.href = "index.php";
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
              console.log(res.data.status);
            }
          });
      }
    },
    showInfo() {
      window.location.href = "public/index.php";
    },
  },
});
