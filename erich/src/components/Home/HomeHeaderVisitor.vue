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
                max-height="120px"
                max-width="120px"
                class="pb-1"
              >
                <a href="/"></a>
              </v-img>
            </router-link>
          </v-col>

          <!-- Header Search Bar -->
          <v-col
            class="d-flex align-center"
            xl="6"
            lg="7"
            md="7"
            cols="7"
          >
  
            <v-text-field
              rounded
              outlined
              class="py-2 "
              color="#1106A0"
              hide-details="auto"
              prepend-inner-icon="mdi-magnify"
              dense
              background-color="#EDEDF0"
              placeholder="Search for entire store here.."
              v-model="searchKey"
              v-on:keyup="toSearch(searchKey)"
            >
            </v-text-field>
              <!-- <v-btn
                class="my-0 py-0"
                outlined
                color="black"
                large
                max-height="40px"
              >
                <v-icon
                  
                >
                  mdi-magnify
                </v-icon>
              </v-btn> -->
            
            
            <v-btn
              height="auto"
              dark
              text
              to="/login"
            >
              <v-img
                contain
                src="../../assets/headerCart.png"
                max-height="50%"
                max-width="50%"
                
              >
                
              </v-img>
              <span
                class="white--text"
              >
                00
              </span>
            </v-btn>
          </v-col>

          <!-- Header Buttons -->
          <v-col
            class="d-flex align-center justify-end"
            xl="2"
            lg="3"
            md="3"
            cols="3"
          >
            <div
              class="d-flex 
              ml-10 
              qfont 
              "
            >
                <!-- <v-btn
                white
                text
              >
                <v-icon
                
                medium
                color="#1106A0"
                class="ev"
                >mdi-bell</v-icon>
              </v-btn> -->
              <v-btn
                medium
                outlined             
                color="#1106A0"
                white
                to="/signup"             
              >
                Sign Up
              </v-btn>
              <v-btn
                class="ml-3 indigo--text text--darken-4"
                medium
                white
                color="white"                
                to="/login"
              >
                Login
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>
  </div>
</template>

<script>
  export default {
     data: () => ({
      searchKey: "",
    }),
    methods: {
      toHome() {
        alert("gg");
      },
      toSearch(data){
        this.$store.commit('searchItem', data);
      }
    }
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