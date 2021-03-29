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
          name: "Sopeha",
          gender: "Male",
        },
        {
          name: "A",
        },
        {
          name: "B",
        },
        {
          name: "C",
        },
      ],
    };
  },
  created() {
    this.generateYear();
  },
  methods: {
    generateYear() {
      //
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
    goLogin() {
      window.location.href = "../login.php";
    },
  },
});
