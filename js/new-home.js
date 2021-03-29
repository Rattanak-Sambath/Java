var app = new Vue({
  el: "#q-app",
  name: "new-home",
  data: function () {
    return {
      form: {
        name: "",
        latin: "",
        description: "",
      },
    };
  },
  created() {},
  methods: {
    onSubmit() {
      this.$refs.name.validate();
      this.$refs.latin.validate();

      if (this.$refs.name.hasError || this.$refs.latin.hasError) {
        // check when value null
      } else {
        console.log(dayjs().format("YYYY-MM-DD HH:mm:ss"));
        axios
          .post("action/new-home_action.php", {
            action: "addNewHome",
            name: this.form.name,
            latin: this.form.latin,
            description: this.form.description,
            created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
            updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
          })
          .then((res) => {
            console.log(res.data);
            if (res.data.status == "inserted") {
              this.$q.notify({
                message: "Inserted successfully",
                type: "positive",
                position: "top-right",
              });
              //
              setTimeout(() => {
                window.location.href = "home.php";
              }, 500);
            } else {
              this.$q.notify({
                message: "Cannot Inserted!!!",
                type: "negative",
                position: "top-right",
              });
              this.$q.notify({
                message: res.data.err,
                type: "negative",
                position: "top-right",
              });
            }
          });
      }
    },
    goPerson() {
      window.location.href = "person.php";
    },
    goIndex() {
      window.location.href = "index.php";
    },
    goHome() {
      window.location.href = "home.php";
    },
    onLogout() {
      axios
        .post("action/index_action.php", {
          action: "logout",
        })
        .then((res) => {
          if (res.data.status == "logout") {
            window.location.href = "login.php";
          }
        });
    },
    convertDate(d) {
      return dayjs(d).format("YYYY-MM-DD");
    },
  },
});
