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
          name: "gender",
          label: "Gender",
          align: "left",
          field: (row) => row.gender,
        },
        {
          name: "phone",
          label: "Phone",
          align: "left",
          field: (row) => row.phone,
        },
        {
          name: "homeName",
          label: "Home Name",
          align: "left",
          field: (row) => row.homeName,
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
    goAddPerson(a) {
      window.location.href = "new-person.php";
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
          action: "getTblPerson",
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
