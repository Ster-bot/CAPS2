<template>
  <div class="mt-15">
    <v-footer
      color=""
      height="auto"
      width="auto"
      style="
        background-color:#FFFFFF"
      class=""
    >
    <v-container fluid>
    
      <v-row>
        <v-col
          class="d-flex justify-center px-1"
          offset-xl="1"
          xl="10"
          lg="12"
          md="12"
          cols="12"
        >
          <v-sheet
            color="#F9F9FF"
            width="100%"
            class="py-5"
            rounded="xl"
          >
            <v-row >
              <v-col
                offset-lg="1"
                lg="4"
                md="6"
              >
                <div
                    class="d-flex flex-column mt-5"
                    >
                    <h3
                    class="d-flex 
                    justify-center
                    fontTitle
                    qfont
                    "
                    >
                    Hello from ERICH Grocery!
                    </h3>
                    <p class="d-flex text-justify   mt-3 px-5 grey--text text--darken-2">
                        Erich Grocery Store is a local website grocery delivery service In Sta. Maria Bulacan. Its goal is to ensure that basic daily necessities are delivered quickly, conveniently, and safely like beverages, breads, dairy, home essentials, hygiene, chips, candy, noodles, biscuit, Frozen goods, canned goods.
                    </p>
                </div>
              </v-col>

              <v-col
                lg="3"
                md="3"
              >
                <div
                    class="d-flex flex-column mt-5 "
                  >
                    <h3
                      class="d-flex 
                      justify-center 
                      fontTitle 
                      qfont"
                    >
                      Policies
                    </h3>
                    <v-btn
                      plain
                      text
                      class=" btn no-uppercase font-weight-bold"
                      @click="poliQl('rfp')"
                    >
                      Refund Policy
                    </v-btn>
                    
                    <v-btn
                      plain
                      class=" font-weight-bold no-uppercase"
                      @click="poliQl('spp')"
                    >
                      Shipping Policy
                    </v-btn>

                    <v-btn
                      plain
                      class=" font-weight-bold no-uppercase"
                      @click="poliQl('pvp')"
                    >
                      Privacy Policy
                    </v-btn>

                      <v-btn
                      plain
                      class=" font-weight-bold no-uppercase"
                      @click="poliQl('tsp')"
                    >
                      Terms of Service
                    </v-btn>
                  </div>
              </v-col>

              <v-col 
                lg="3"
                md="3"
              >
                <div
                    class="d-flex flex-column justify-center mt-5"
                  >
                    <h3
                      class="d-flex 
                      justify-center 
                      qfont
                      fontTitle
                      "
                    >
                      Quick Links
                    </h3>
                    <v-btn
                      plain
                      class=" font-weight-bold  no-uppercase"
                      @click="poliQl('auq')"
                    >
                      About Us
                    </v-btn>

                    <v-btn
                      plain
                      class=" font-weight-bold no-uppercase"
                      @click="poliQl('cuq')"
                    >
                      Contact us
                    </v-btn>

                    <v-btn
                      plain
                      class=" font-weight-bold no-uppercase"
                      @click="poliQl('fqq')"
                    >
                      FAQ
                    </v-btn>
                  </div>
              </v-col>
            </v-row>
          </v-sheet>
        </v-col>
      </v-row>
   
      <v-row>
        <v-col
          offset-lg="1"
          lg="8"
          md="8"
        >
          <div class="mx-5">
          <v-icon color="#FFA600"> mdi-alpha-c-circle-outline</v-icon>
          <span class="qfont fontTitle ml-1"> Erich Grocery. All Rights Reserve</span>
        </div>
        </v-col>

        <v-col
          lg="2"
          md="4"
          class="d-flex justify-end"
        >
          <div
            class="pr-2"
          >
            <v-btn 
            dark 
            text
            href="https://www.facebook.com/Erichgrocery" target="_blank" rel="noopener noreferrer"
            >
              
              <v-icon color="#1106A0">mdi-facebook</v-icon>
              
            </v-btn>

            <v-btn 
            dark 
            text
            href="https://twitter.com/GroceryErich" target="_blank" rel="noopener noreferrer" 
            >
                <v-icon color="#1106A0">mdi-twitter</v-icon>
            </v-btn>

            <v-btn 
            dark 
            text
            href="https://www.instagram.com/erich_grocery/" target="_blank" rel="noopener noreferrer" 
            >
              <v-icon color="#1106A0">mdi-instagram</v-icon>
            </v-btn>
            
          </div>
        </v-col>
      </v-row>
    </v-container>
    </v-footer>
  </div>
</template>

<script>
  export default {
    methods: {
      poliQl(cond){
        if(cond == 'rfp'){
          this.$store.commit('aboutCond', 'ref');
          this.$router.push("/about");
        }
        else if(cond == 'spp'){
          this.$store.commit('aboutCond', 'ship');
          this.$router.push("/about");
        }
        else if(cond == 'pvp'){
          this.$store.commit('aboutCond', 'priv');
          this.$router.push("/about");
        }
        else if(cond == 'tsp'){
          this.$store.commit('aboutCond', 'term');
          this.$router.push("/about");
        }
        else if(cond == 'auq'){
          this.$store.commit('aboutCond', 'aucu');
          this.$router.push("/about");
        }
        else if(cond == 'cuq'){
          this.$store.commit('aboutCond', 'aucu');
          this.$router.push("/about");
        }
        else if(cond == 'fqq'){
          this.$store.commit('aboutCond', 'faq');
          this.$router.push("/about");
        }
      }
    }
  }
</script>

<style scoped>
.rounded-card{
  border-radius: 15px;
}
.fontTitle{
  color: #1106A0;
}
.qfont{
     font-family: "Quicksand", Helvetica, Arial;
  }
.btn{
  color:"#fff"
}

.no-uppercase{
 text-transform: none;
}

</style>