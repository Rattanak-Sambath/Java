var app = new Vue({
  el: "#q-app",
  name: "edit-home",
  data: function () {
    return {
      form: {
        name: "",
        latin: "",
        description: "",
      },
    };
  },
  created() {
    this.getData();
  },
  methods: {
    onSubmit() {
      this.$refs.name.validate();
      this.$refs.latin.validate();

      if (this.$refs.name.hasError || this.$refs.latin.hasError) {
        // check when value null
      } else {
        let uri = window.location.search.substring(1);
        let params = new URLSearchParams(uri);
        let id = params.get("id");
        console.log(id);
        //
        axios
          .post("action/edit-home_action.php", {
            action: "updateHome",
            id: id,
            name: this.form.name,
            latin: this.form.latin,
            description: this.form.description,
            updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
          })
          .then((res) => {
            if (res.data == "updated") {
              this.$q.notify({
                message: "Updated",
                type: "positive",
                position: "top-right",
              });
              setTimeout(() => {
                window.location.href = "home.php";
              }, 500);
            }
          });
      }
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
    getData() {
      let uri = window.location.search.substring(1);
      let params = new URLSearchParams(uri);
      let id = params.get("id");
      console.log(id);
      //
      axios
        .post("action/edit-home_action.php", {
          action: "getHome",
          id: id,
        })
        .then((res) => {
          console.log(res.data);
          if (res.data == "no data") {
            this.$q.notify({
              message: "This ID not found !",
              type: "warning",
              position: "top-right",
            });
            setTimeout(() => {
              window.location.href = "home.php";
            }, 2000);
          } else {
            this.form.name = res.data.name;
            this.form.latin = res.data.latin;
            this.form.description = res.data.description;
          }
        });
    },
  },
});
