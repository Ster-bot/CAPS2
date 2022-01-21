<template>
  <div>
    <v-container>
      <v-row>
        <v-col
          offset-xl="1"
          xl="10"
          lg="12"
          md="12"
          cols="12"
        >
          <v-row>
            <v-col
              v-for="item in showItems"
              :key="item.id"
              xl="2"
              lg="3"
              md="4"
            >
              <v-card
                min-height="330px"
                min-width="230px"
                max-height="330px"
                max-width="230px"
                class="elevation-1"
              >
                <div>
                  <div
                    class="d-flex pt-1 pl-2"
                  >
                    <v-row >
                      <v-col cols="6" class="d-flex">
                        <h4
                          class="borderDisc mt-1 px-2  pink--text"
                          v-if="item.discount != 0"
                          
                          >
                            - {{item.discount}}%
                        </h4>
                      </v-col>
                      <v-col cols="6" class="d-flex justify-center">
                          <h5
                          class="borderQuan px-1 mt-1 ml-4 d-flex justify-center white--text"
                          >{{item.quantity}} Pcs</h5>
                      </v-col>
                    </v-row>
                  </div>
                
                  <div class="d-flex justify-center">
                    <v-img
                    :src="require('../../assets/itemPhotos/'+item.image)"
                    min-height="150px"
                    min-width="180px"
                    max-height="150px"
                    max-width="180px"
                    contain
                  ></v-img>
                  </div>
                  
                  <div class="d-flex px-5">
                    <v-icon
                    color="#1106A0"
                    size="18px"
                    class="mr-1 mx-0 my-0 py-0 px-0"
                  >
                    mdi-currency-php
                  </v-icon>
                  <h3 class="fontBlue fontStyle font-weight-black">{{priceRound(item.retailPrice - ((item.discount / 100) * item.retailPrice))}}</h3>
                  </div>
                   
                  <div
                    class="py-0"
                  >
                    <div class="">
                      <h5 
                      class=" px-5 fontDesc text-decoration-line-through"
                      v-if="item.discount != 0"
                      >
                        <v-icon
                          small
                        >
                          mdi-currency-php
                        </v-icon>
                        {{priceRound((item.supplierPrice * 1) + (item.supplierPrice * .05))}}
                      </h5>
                    </div>
                    
                    
                    <div class="px-5"> 
                      <h4
                        class="d-inline-block text-truncate font-weight-bold fontTitle"
                        style="max-width: 200px;" 
                      >{{item.name}}</h4>
                    </div>
                    
                    <div class="px-5 mt-n2">
                      <h5
                        class="d-inline-block text-truncate font-weight-black fontDesc"
                        style="max-width: 200px;" 
                      >{{item.description}}</h5>
                    </div>
                    
                    <div>
                      <v-row>
                        <v-col cols="" class="ml-5 mt-n2">
                          <h5 class="fontDesc font-weight-black">
                            {{item.size}}
                          </h5> 
                        </v-col>

                        <v-col cols="">
                          <div
                            class="d-flex"
                            >
                            <v-spacer></v-spacer>
                              <v-btn
                                class="mr-3 mt-n1"
                                  large
                                  icon
                                  white
                                  text
                                  color="#1106A0"
                                  @click="addToCartItems(item.itemCode, item.id)"
                              >
                              <v-img
        
                                contain
                                src="../../assets/Cart.svg"
                                max-height="40px"
                                max-width="40px"
                                >
                              </v-img>
                            </v-btn>
                          </div>
                        </v-col> 
                      </v-row>
                    </div>
        
                  </div>

                </div>
                


              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
  import {Mixins} from '../../Mixins/mixins.js'

  export default {
    mixins: [Mixins],

    data: () => ({
      showItems: null,
      searchKey: "",
      cartItems: {
        id: null,
        Email: "",
        Quantity: 1,
        ItemCode: "",
      },
      cartCounter: 0,
    }),

    computed: {
      categoryItems() {
        return this.$store.state.categoryItems;
      },
      cartQuantity(){
        return this.$store.state.cartQuantity;
      },
      searchKeyWords() {
        return this.$store.state.searchItem;
      },
      usersEmail(){
        return localStorage.getItem('email');
      },
      usersToken(){
        return localStorage.getItem('token');
      },
      computedShowItems(){
        var sk = this.searchKeyWords;
        var re = new RegExp(sk, 'gi');
        return this.showItems.filter((item) => {
          return item.name.match(re);
        });
      },
    },

    watch: {
      searchKeyWords() {
        this.filterItems();
      },
      categoryItems() {
        this.getCategoryItems();
      }
    }, 

    // mounted(){
    //   setTimeout(() => {
    //     this.$store.state.cartItems = {cart: 0};
    //   }, 3000);
    // },

    methods: {
      filterItems(){
        this.showItems = this.categoryItems;
        this.showItems = this.computedShowItems;
      },
      
      addToCartItems(code, id) {
        // console.log("add to cart");
        this.cartItems.Email = this.usersEmail;
        this.cartItems.ItemCode = code;

        if(this.cartItems.Email == undefined){
          this.$router.push('/login');
        }
        else {
          axios.post(this.getDomain()+'api/customercart/store', {
            register: this.cartItems
          },
          {
            headers:{
              "Authorization": `Bearer ${this.usersToken}`,
          }
          })
          .then(res => {
            if(res.data == "false"){
              console.log("Too many request");
            }
            else{
              this.$store.commit('storeCartQuantity');
            }
          })
          .catch(err => console.error(err));
        }
      },
      getCategoryItems() {
        if(!(this.categoryItems == null)){
          this.showItems = this.categoryItems;
        }
      },
      priceRound(price){
        var rounded = (Math.round(price * 100) / 100).toFixed(2);
        return rounded;
      }
    },

    beforeMount() {
      this.getCategoryItems();
    },
  }
</script>

<style scoped>
.fontBlue{
  color: #1106A0;
}
.fontDesc{
  color: #858585;
}
.fontTitle{
  color: #464646;
}
@font-face {
  font-family: "RedHatDisplay";
  src: local("RedHatDisplay"),
   url(../../assets/Fonts/RedHatDisplay-Black.ttf) format("truetype");
}
.fontStyle{
     font-family: "RedHatDisplay", Helvetica, Arial;
  }
.borderQuan{
  background-color: #ffA600;
  border: 1px solid #ffA600;
  width: 65px;
  height: 25px;
  border-radius: 8px;
}
.borderDisc{
  border: 1px solid #ff0000;
  border-radius: 5px;
}

</style>
