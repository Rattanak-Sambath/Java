var app = new Vue({
  el: "#q-app",
  name: "person",
  data: function () {
    return {
      year: null,
      years: [],
      checkboxText: false,
      month: "",
      columns: [
        {
          name: "index",
          label: "No",
          align: "left",
        },
        {
          name: "name",
          label: "Khmer",
          align: "left",
          field: (row) => row.name,
        },
        {
          name: "latin",
          label: "English",
          align: "left",
          field: (row) => row.latin,
        },
        {
          name: "created_at",
          label: "Created",
          align: "left",
          field: (row) => this.convertDate(row.created_at),
        },
        {
          name: "updated_at",
          label: "Updated",
          align: "left",
          field: (row) => this.convertDate(row.updated_at),
        },
        {
          name: "action",
          label: "Action",
          align: "center",
        },
      ],
      data: [],
    };
  },
  created() {
    // console.log(dayjs().format('YYYY-MM-DD'));
    this.getAllData();
  },
  methods: {
    goPerson() {
      window.location.href = "person.php";
    },
    goIndex() {
      window.location.href = "index.php";
    },
    goHome() {
      window.location.href = "home.php";
    },
    goNewHome() {
      window.location.href = "new-home.php";
    },
    onLogout() {
      axios
        .post("action/logout_action.php", {
          action: "logout",
        })
        .then((res) => {
          if (res.data.status == "logout") {
            window.location.href = "login.php";
          }
        });
    },
    generateYear() {
      //
      console.log(this.months[new Date().getMonth()]);
      this.month = this.months[new Date().getMonth()];
      //
      this.year = new Date().getFullYear();
      this.years = [];
      thisYear = new Date().getFullYear();
      for (i = 0; i < 5; i++) {
        this.years.push(thisYear);
        thisYear += 1;
      }
    },
    getAllData() {
      axios
        .post("action/person_action.php", {
          action: "getTblHome",
        })
        .then((res) => {
          console.log(res.data);
          this.data = res.data;
        });
    },
    testGet(a) {
      console.log(a);
      let uri = window.location.search.substring(1);
      let params = new URLSearchParams(uri);
      let id = params.get("id");
      // console.log(id);
    },
    convertDate(d) {
      return dayjs(d).format("YYYY-MM-DD");
    },
    onEdit(id) {
      console.log(id);
      window.location.href = "edit-home.php?id=" + id;
    },
  },
});
