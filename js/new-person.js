var app = new Vue({
  el: "#q-app",
  name: "new-person",
  data: function () {
    return {
      form: {
        homeId: "",
        name: "",
        latin: "",
        gender: "",
        phone: "",
      },
      options: {
        gender: ["Male", "Female"],
        home: [],
      },
    };
  },
  created() {
    this.getHome();
  },
  methods: {
    onSubmit() {
      this.$refs.homeId.validate();
      this.$refs.name.validate();
      this.$refs.latin.validate();
      this.$refs.gender.validate();
      this.$refs.phone.validate();

      if (
        this.$refs.name.hasError ||
        this.$refs.latin.hasError ||
        this.$refs.homeId.hasError ||
        this.$refs.gender.hasError ||
        this.$refs.phone.hasError
      ) {
        // check when value null
      } else {
        // console.log(this.form);
        axios
          .post("action/new-person_action.php", {
            action: "addNewPerson",
            homeId: this.form.homeId,
            name: this.form.name,
            latin: this.form.latin,
            gender: this.form.gender,
            phone: this.form.phone,
            created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
            updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
          })
          .then((res) => {
            console.log(res.data);
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
    getHome() {
      axios
        .post("action/new-person_action.php", {
          action: "getHome",
        })
        .then((res) => {
          this.options.home = res.data;
        });
    },
  },
});
