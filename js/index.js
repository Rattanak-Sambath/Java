var app = new Vue({
  el: "#q-app",
  name: "ex",
  data: function () {
    return {
      year: null,
      years: [],
      checkboxText: false,
      month: "",
      months: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
      persons: [
        {
          homeName: "កុដិលេខ០៨",
          name: "Vann Sopeha",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
        {
          homeName: "កុដិលេខ០៨",
          name: "San Saren",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
        {
          homeName: "កុដិលេខ០៨",
          name: "Vann Sopeha",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
        {
          homeName: "កុដិលេខ០៨",
          name: "San Saren",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
        {
          homeName: "កុដិលេខ០៨",
          name: "Vann Sopeha",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
        {
          homeName: "កុដិលេខ០៨",
          name: "San Saren",
          gender: "Male",
          ele_old: 10,
          ele_new: 15,
          water_old: 5,
          water_new: 8,
        },
      ],
      unit: {
        ele: 2000,
        water: 1000,
      },
    };
  },
  created() {
    this.generateYear();
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
    getAllMonths() {
      console.log(this.month, this.year);
    },
  },
});
