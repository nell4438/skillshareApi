<template>
  <v-app class="my-app">
    <v-container fill-height>
      <v-layout align-center justify-center>
        <v-flex xs12 sm8 md4>
          <v-card>
            <v-card-title class="deep-blue darken-1 black--text"
              >Paste link here</v-card-title
            >
            <v-card-text>
              <v-text-field
                v-model="url"
                label="Enter link"
                solo
                placeholder="https://www.slideshare.net/"
                hide-details
                clearable
              ></v-text-field>
            </v-card-text>
            <v-card-actions class="px-4">
              <v-spacer></v-spacer>
              <v-btn color="primary" class="white--text" @click="submitLink"
                >Submit</v-btn
              >
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      url: null,
    };
  },
  methods: {
    submitLink() {
      // Logic to handle the submitted link
      axios
        .get("/api/skillshare", { params: { url: this.url } })
        .then((res) => console.log(res));
    },
  },
};
</script>

<style scoped>
.my-app {
  background-color: #121212; /* A dark background color */
}
</style>
