<template>
  <div>
    <v-app-bar
      fixed
      color="#FFFFFF"
      height="auto"
    >
      <v-container fluid>
        <v-row class="">
          <!-- Store Logo -->
          <v-col
            class="d-flex align-center"
            offset-xl="1"
            xl="2"
            lg="2"
            md="2"
            cols="2"
          >
            <router-link
              to="/"
            >
              <v-img
                contain
                src="../../assets/ERICHNEW.svg"
                max-height="122px"
                max-width="122px"
                class="pb-1"
              >
              </v-img>
            </router-link>
          </v-col>

          <!-- Header Search Bar -->
          <v-col
            class="d-flex align-center"
            xl="6"
            lg="7"
            md="6"
            cols="6"
          >
            <v-text-field
              rounded
              class="py-2"
              color="#1106A0"
              hide-details="auto"
              outlined
              prepend-inner-icon="mdi-magnify"
              dense
              background-color="#EDEDF0"
              placeholder="Search for entire store here.."
              v-model="searchKey"
              v-on:keyup="toSearch(searchKey)"
            >
            </v-text-field>
            <v-badge
              overlap
              :color="cartColor"
              :content="cartCounter"
            >
              <v-btn
                height="auto"
                dark
                text
                :to="{name: 'Cart' , params: { id: 'items', title: 'Items'}}"
              >
                <v-img
                contain
                src="../../assets/headerCart.png"
                max-height="80%"
                max-width="80%"
               
              >
                
              </v-img>
              </v-btn>
            </v-badge>
          </v-col>

          <!-- Header Buttons -->
          <v-col
            class="d-flex align-center justify-end"
            xl="2"
            lg="3"
            md="4"
            cols="4"
          >
            <div
              class="mx-5 ml-md-0 mr-md-3"
            >
              <v-menu
                offset-y
                transition="slide-y-transition"
                bottom
                :disabled="notifCounter == 0"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-badge
                    overlap
                    :color="notifColor"
                    :content="notifCounter"
                  >
                    <v-btn
                      dark
                      text
                      medium
                      v-bind="attrs"
                      v-on="on"         
                    >
                      <v-icon color="#1106A0">mdi-bell</v-icon>
                    </v-btn>
                  </v-badge>
                </template>

                <v-list dense>
                  <v-list-item-group
                    v-model="selectedNotif"
                    color="#1106A0"
                    
                  >
                    <v-list-item
                      v-for="(item, n) in notifications"
                      :key="n"
                    >
                      <v-list-item-content>
                        <v-list-item-title @click="goToMiscFunctions(item.to)"><span>{{item.title}}</span><br><span>{{item.desc}}</span></v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list-item-group>
                </v-list>
              </v-menu>
            </div>
            

            <div
              class="d-flex"
            >
              <div class="text-center">
                <p
                  class="my-0 py-0 mx-2 d-flex"
                >{{usersFName}} {{usersLName}}</p>
                <v-menu
                  offset-y
                  transition="slide-y-transition"
                  bottom
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      white
                      text
                      v-bind="attrs"
                      v-on="on"
                      class="qfont elevation-3 px-2"
                      color="#1106A0"           
                    >
                      <h4 class="font-weight-black">My Account</h4>
                      <v-spacer></v-spacer>
                      <v-icon>mdi-chevron-down</v-icon>
                    </v-btn>
                  </template>

                  <v-list dense>
                    <v-list-item-group
                      v-model="selectedItem"
                      color="#1106A0"
                      
                    >
                      <v-list-item
                        v-for="(item, n) in items"
                        :key="n"
                      >
                        <v-list-item-icon>
                          <v-icon v-text="item.icon"></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title v-text="item.text" @click="accountButton(item.to)"></v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-list-item-group>
                  </v-list>
                </v-menu>
                <v-avatar
                  color="blue"
                  class="mx-2"            
                  @click="accountButton('account')"   
                >
                  <v-icon dark>
                    mdi-account-circle
                  </v-icon>
                </v-avatar>
              </div>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>
  </div>
</template>

<script>
  import {Mixins} from '../../Mixins/mixins.js'

  export default {
    mixins: [Mixins],
    
    data: () => ({
      selectedItem: 0,
      selectedNotif: 0,
      notifications: [
        // { title: "Verify", desc: 'Verify Your Email', to: "verify"},
      ],
       items: [
        { title: "Account", text: 'My Account', icon: 'mdi-account', to: "account"  },
        { title: "Address", text: 'My Address', icon: 'mdi-map-marker', to: "address"  },
        { title: "Purchase", text: 'My Purchase', icon: 'mdi-cart', to: "orders"  },
      ],
      customerEmail: "",
      cartCounter: 0,
      searchKey: "",
      notifCounter: 0,
    }),

    computed: {
      usersEmail(){
        return localStorage.getItem('email');
      },
      usersFName(){
        return localStorage.getItem('firstName');
      },
      usersLName(){
        return localStorage.getItem('lastName');
      },
      usersTag(){
        return localStorage.getItem('tag');
      },
      cartQuantity() {
        return this.$store.state.cartQuantity;
      },
      usersToken(){
        return localStorage.getItem('token');
      },
      cartColor(){
        if(this.cartCounter != 0){
          return "#FFA600"
        }
        else{
          return "#FFFFF"
        }
      },
      notifColor(){
        if(this.notifCounter != 0){
          return "#ff0000"
        }
        else{
          return "#FFFFF"
        }
      }
    },

    watch: {
      cartQuantity(){
        this.cartCounter++;
      }
    },  

    methods: {
      toSearch(data){
        this.$store.commit('searchItem', data);
      },
      accountButton(cond) {
        if(cond == "account"){
          this.$router.push({path: '/profile'});
        }
        else if(cond == "address"){
          //console.log("Admin");
          this.$store.commit('goToAddress');
          this.$router.push({path: '/profile'});
        }
        else if(cond == "orders"){
          //console.log("Admin");
          this.$store.commit('goToOrder');
          this.$router.push({path: '/profile'});
        }
        else if(cond == "admin"){
          //console.log("Admin");
          this.$router.push({path: '/admin/dashboard'});
        }
        else if(cond == "onlinecashier"){
          //console.log("Admin");
          this.$router.push({path: '/onlinecashier'});
        }
        else if(cond == "physicalcashier"){
          //console.log("Admin");
          this.$router.push({path: '/physicalcashier'});
        }
        else if(cond == "logout"){
          localStorage.removeItem("firstName");
          localStorage.removeItem("lastName");
          localStorage.removeItem("email");
          localStorage.removeItem("mobileNumber");
          localStorage.removeItem("birthday");
          localStorage.removeItem("gender");
          localStorage.removeItem("tag");
          localStorage.removeItem("token");
          window.location.href = "http://localhost:8080/";
          // window.location.href = "http://erichgrocery.store/";
        }
      },
      goToMiscFunctions(cond){
        if(cond == "verify"){
          this.$store.commit('notifCond', 'verify');
          this.$router.push("/erich");
        }
        else if(cond == "profile"){
          this.$router.push("/profile");
        }
        else{
          this.$router.push("/");
        }
      },
      getItemsQuantity() {
        //console.log("This is Header Cart quantity");
        //console.log(this.customerInfos.Email);
        this.customerEmail = this.usersEmail;
        axios.post(this.getDomain()+'api/headercart/store', {
          register: this.customerEmail
        },
        {
          headers:{
            "Authorization": `Bearer ${this.usersToken}`,
        }
        })
        .then(res => {
          // console.log(res.data);
          this.cartCounter = res.data;
        })
        .catch(err => console.error(err));
      },
      getNotif(){
        this.customerEmail = this.usersEmail;
        axios.post(this.getDomain()+'api/customernotif/getnotif', {
          customeremail: this.customerEmail
        },
        {
          headers:{
            "Authorization": `Bearer ${this.usersToken}`,
        }
        })
        .then(res => {
          var notif;
          // console.log("Customer Notif");
          // console.log(res.data);
          for(var i = 0; i < res.data.length; i++){
            notif = {
              id: res.data[i].id,
              title: res.data[i].title,
              desc: res.data[i].description,
              to: res.data[i].link,
            }
            this.notifications.push(notif);
            this.notifCounter++;
          }
          this.$store.commit('userNotif', this.notifications);
        })
        .catch(err => console.error(err));
      },
    },

    beforeMount(){
      var ob1 = { title: "Admin", text: 'Admin', icon: 'mdi-cog-outline', to: "admin" };
      var ob2 = { title: "Cashier", text: 'Cashier', icon: 'mdi-cash-register', to: "onlinecashier" };
      var ob3 = { title: "Encoder", text: 'Encoder', icon: 'mdi-barcode-scan', to: "admin" };
      var ob4 = { title: "Logout", text: 'Logout', icon: 'mdi-logout', to: "logout"  };
      var ob5 = { title: "POS", text: 'POS', icon: 'mdi-cash-register', to: "physicalcashier"  };
      if(this.usersTag == "Admin"){
        this.items.push(ob1);
        this.items.push(ob2);
        this.items.push(ob5);
        this.items.push(ob4);
      }
      else if(this.usersTag == "Encoder"){
        this.items.push(ob3);
        this.items.push(ob4);
      }
      else{
        this.items.push(ob4);
      }
      this.getItemsQuantity();
      this.getNotif();
    },
  }
</script>

<style scoped>
@font-face {
  font-family: "Quicksand";
  src: local("Quicksand"),
   url(../../assets/Fonts/Quicksand-Bold.ttf) format("truetype");
}
.qfont{
     font-family: "Quicksand", Helvetica, Arial;
  }


</style>





<!-- <v-btn
  dark
  text
  class="rounded-0"
  style="border-left: 2px solid rgba(255, 255, 255, 0.5);"
  :to="{name: 'Admin' , params: { id: 'dashboard', title: 'DashBoard'}}"
>
  Admin
</v-btn> -->