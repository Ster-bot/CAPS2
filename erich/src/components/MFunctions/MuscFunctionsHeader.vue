<template>
  <div>
    <v-app-bar
      color="#FFFFFF"
      height="auto"
    >
      <v-container fluid>
        <v-row>
          <v-col
            cols="5"
          >
            <div
              class="d-flex"
            >
              <v-img
                contain
                src="../../assets/ERICHNEW.svg"
                max-height="100px"
                max-width="100px"
                class="mr-2"
              ></v-img>
              <v-divider
                vertical
              ></v-divider>
              <p
                class="text-h5 ml-3 my-0 pt-1 grey--text text--darken-1"
              >Erich Grocery Store</p>
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

    }),

    methods: {
    },

    beforeMount(){
    },
  }
</script>