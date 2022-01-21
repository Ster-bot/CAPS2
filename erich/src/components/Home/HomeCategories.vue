<template>
  <div
    class=""
  >
    <v-container fluid>
      <v-row>
        <v-col
          offset-xl="1"
          xl="10"
          lg="12"
          md="12"
          cols="12"
        >
          <h3 class="mt-5">Browse by Category</h3>
        </v-col>
      </v-row>
      <v-row>
        <v-col
          class="d-flex"
          offset-xl="1"
          xl="10"
          lg="12"
          md="12"
          cols="12"
        >
          <!-- <div
            v-for="categorie in categories"
            :key="categorie.id"
          >
            <v-card
              height="130px"
              width="130px"
              class="rounded-lg mx-5"
              @click="toCategoriseItem()"
            >
              <v-img
                height="70px"
                width="300px"
                src="https://picsum.photos/1920/1080?random"
              >
              </v-img>
              <v-card-title
                class="d-flex justify-center"
              >
                <h4>
                  {{categorie.cname}}
                </h4>
              </v-card-title>
            </v-card>
          </div> -->
    
          <v-slide-group
            multiple
            show-arrows       
          >
            <v-slide-item
              v-for="categorie in categories"
              :key="categorie.id"
            >
              <div
                class="ma-2"
                rounded

              >
                <v-hover>
                  <template v-slot:default="{hover}">
                  <v-card
                    
                    :elevation="hover? 4:0"
                    height="150px"
                    width="150px"
                    class="rounded-lg mx-2 elevation-0"
                    
                    :style="{'background-color':hover ?'#E2E0FF':'#F8F8FC'}"
                    @click="toCategoriseItem(categorie.ccond)"
                  >
                    <div class="d-flex justify-center">
                      <div class="mt-2" >
                        <v-img contain
                          class="mt-5"
                          height="50%"
                          width="100%"
                          :src="require('../../assets/CategoryPics/'+categorie.cimg)"
                          >
                        </v-img>
                      </div> 
                    </div>
                    <div>
                      <v-card-title
                        class="d-flex justify-center ma-0 pa-0"
                      >
                        <h5 class="grey--text text--darken-2 mt-n3">
                          {{categorie.cname}}
                        </h5>
                      </v-card-title>
                    </div>          
                    
                  </v-card>
                  </template>
                </v-hover>
                
              </div>
            </v-slide-item>
          </v-slide-group>

        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
  export default {
    data: () => ({
      categories: [
        
        { id: 1, cname: "Bakery", cimg: "bakery.png", ccond: "bakery"},
        { id: 2, cname: "Baking Goods", cimg: "baking.png", ccond: "baking"},
        { id: 3, cname: "Beverages", cimg: "beverages,png", ccond: "beverages"},
        { id: 4, cname: "Canned Goods", cimg: "cannedGoods.png", ccond: "cannedGoods"},
        { id: 5, cname: "Condiments", cimg: "condiments.png", ccond: "condiments"},
        { id: 6, cname: "Dairy", cimg: "dairy.png", ccond: "dairy"},
        { id: 7, cname: "Frozen Goods", cimg: "frozen.png", ccond: "frozenGoods"},
        { id: 8, cname: "Laundry", cimg: "laundry.png", ccond: "laundry"}, 
        { id: 9, cname: "Pasta", cimg: "pasta.png", ccond: "pasta"},
        { id: 10, cname: "Personal Care", cimg: "personalCare.png", ccond: "personalCare"},
        { id: 11, cname: "Snacks", cimg: "snacks.png", ccond: "snacks"},
        { id: 12, cname: "Sweets", cimg: "sweets.png", ccond: "sweets"},
        { id: 13, cname: "Promo Deals", cimg: "deals.png", ccond: "deals"},
      ],
    }),
    methods: {
      toCategoriseItem(cond) {
        this.$router.push('/item');
      }
    }
  }
</script>