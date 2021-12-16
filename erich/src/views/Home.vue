<template> 
  <div style="background-color: #ffffff">
    <home-header v-if="headerCond"></home-header>
    <home-header-acc v-else></home-header-acc>
    <home-carousel></home-carousel>
    <home-categories></home-categories>
    <home-promodeals></home-promodeals>
    <home-footer></home-footer>
  </div>
</template>

<script>
  //adasdhatdog
  import HomeHeader from "../components/Home/HomeHeaderVisitor.vue";
  import HomeCarousel from "../components/Home/HomeCarousel.vue";
  import HomeCategories from "../components/Home/HomeCategories.vue";
  import HomePromoDeals from "../components/Home/HomePromoDeals.vue";
  import Footer from "../components/Footer.vue";
  import HomeHeaderAcc from "../components/Home/HomeHeaderAccount.vue";

  export default {
    name: "Home",

    data: () => ({
      promodeals: true,
      categoriesItem: false,
      headerCond: true,
    }),

    components: {
      "home-header": HomeHeader,
      "home-carousel": HomeCarousel,
      "home-categories": HomeCategories,
      "home-promodeals": HomePromoDeals,
      "home-footer": Footer,
      "home-header-acc": HomeHeaderAcc,
    },

    computed: {
      customerInfos() {
        return this.$store.state.customerInfos;
      },
      categoryItems() {
        return this.$store.state.categoryItems;
      },
    },

    methods: {
      navbarPicker() {
        //console.log("navbar picker");
        //console.log(this.customerInfos.Tag);
        if(this.customerInfos.Tag == "Customer" || this.customerInfos.Tag == "Admin"||
          this.customerInfos.Tag == "Cashier"|| this.customerInfos.Tag == "Encoder"){
          this.headerCond = false;
          //console.log("headerCond false");
        }
      },
      getCategoryItems() {
        //console.log("Get Items");
        axios.get('http://127.0.0.1:8000/api/categoryitem')
        .then(res => this.storeCategoryItems(res.data))
        .catch(err => console.error(err));
      },
      storeCategoryItems(data) {
        //console.log("This is items data: ");
        //console.log(data);
        this.$store.commit('storeCategoryItem', data);
        this.showItems();
      },
      showItems() {
        //console.log("showItems: ");
        //console.log(this.categoryItems);
        //this.items = this.categoryItems;
      },
    },

    beforeMount() {
      this.navbarPicker();
      this.getCategoryItems();
    },
  }
</script>
