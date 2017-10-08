<template>
  <div id="app">
    ggggggggggggggggg
    <img src="./assets/logo.png">
    <router-view/>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'app',
  data() {
    return {
        test: '',
        errors: [],
        config: {
          headers: {'Content-Type': 'image/png; application/x-www-form-urlencoded'}
        },
    }
  },

  methods: {
      // testGet: function(){
      //     axios.get('http://rest/user6/rest_task1/client/api/cars/1', this.config)
      //       .then(function (response) {
      //       console.log(response);
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });
      // },
      // testPost: function()
      // {
      //   var data = new FormData();
      //   data.append('login', 'dd');
      //   data.append('pass', '123456');
      //   axios.post('http://rest/user6/rest_task1/client/api/users/', data, this.config)
      //   .then(function (response) {
      //     console.log(response);
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });
      // },
      testPut: function()
      {
        var data = new FormData();
        data.append('login', 'dddddd');
        data.append('pass', '123456');
        axios.put('http://rest/user6/rest_task1/client/api/users/', data)
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
      // testPut(){
      //   axios.put('http://rest/user6/rest_task1/client/api/users/',{
      //     login: 'zalupaKony'
      //   })
      //   .then(response => {})
      //   .catch(e => {
      //     this.errors.push(e)
      //   })
      // }
  },
  created(){
    // this.testGet()
    // this.testPost()
    this.testPut()
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
