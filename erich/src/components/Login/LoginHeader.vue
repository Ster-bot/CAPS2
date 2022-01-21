<template>
  <div>
    <v-app-bar
      color="#FFFFFF"
      height="auto"
    >
      <v-container fluid>
        <v-row>
          <v-col
            cols="12"
          >
            <div
              class="d-flex"
            >
              <router-link
                to="/"
              >
                <v-img
                  contain
                  src="../../assets/ERICHNEW.svg"
                  max-height="120px"
                  max-width="120px"
                  class="mr-3"
                ></v-img>
              </router-link>
              <v-divider
                vertical
              ></v-divider>
              <h2
                class=" ml-3 my-0 pt-1 grey--text text--darken-1"
              >Login</h2>
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