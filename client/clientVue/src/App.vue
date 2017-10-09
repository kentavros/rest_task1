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
          headers: {'Content-Type': 'application/x-www-form-urlencoded'
          }
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
      //   data.append('login', 'aaaaaa');
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
        axios.put('http://rest/user6/rest_task1/client/api/users/', {
          login: 'dddddd',
          pass: '123456'
        }, this.config)
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
      // testPut: function()
      // {
      //   var body = "login="+'dddddd'+'&pass=' + 'sdfssdfsdf'
      //   // var user = 'USER'
      //   // var pass = 'PASS'
        
      //   var xhr = new XMLHttpRequest();
      //   xhr.open('PUT', 'http://rest/user6/rest_task1/client/api/users/', true)
      //   // xhr.open('PUT', 'http://rest/user6/rest_task1/client/api/users/', true, user, password)
      //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
      //   xhr.send(body)
      //   xhr.onreadystatechange = function()
      //   {
      //     if (xhr.readyState != 4)
      //     {
      //         return 5
      //     }
      //     if (xhr.status != 200)
      //     {
      //         return 6
      //     }
      //     else
      //     {
      //         console.log(JSON.stringify(xhr.response))
      //     }
      //   }
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
