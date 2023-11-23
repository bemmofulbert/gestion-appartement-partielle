<template>
  <h2>Presentation des Appartements</h2>
  <hr/>
  <div class="list">
    <div class="container centered">
            <Appartement v-for="(appart, index) in appartements" :key="index" :model="appart"/>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Appartement from './components/Appartement.vue'
import axios from 'axios'

const urlApi = 'http://localhost/appart/api'

const http = axios.create({
  baseURL: urlApi
})

@Options({
  components: {
    Appartement
  }
})
export default class App extends Vue {
  appartements!: any
  data () {
    return {
      appartements: Object
    }
  }

  created (): void {
    http.get('/appartementApi.php')
      .then((data: any) => {
        this.appartements = data.data
        console.log(this.appartements)
      })
      .catch(_error => {
        this.appartements = [
          {
            numLocation: 0
          }
        ]
      })
  }
}
</script>

<style lang="less">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.root{
    width: 100%;
    padding: 2.5%;
}
.container {
    width: 100%;
    flex-wrap: wrap;
    justify-content: space-between;
}
.container div {
    padding-bottom: 2em;
}
.navigateur {
    justify-content: space-around;
}
.numberEntry {
  flex-direction: column;
}
.numberEntry > div > input {
  background: white;
  height: 2.5em;
  width: 4em;
  border-radius: 50px;
  border: 1px #0A2640 solid;
  padding-left: 1.3em;
  font-size: 16px;
}
.butNat {
  border-radius: 50px;
  height: 2.5em;
  background-color: #65E4A3;
  padding-left: 15px;
  padding-right: 15px;
  font-weight: 600;
  font-size: 18px;
  border: 0;
  outline: 0;
  cursor: pointer;
}
.go {
  margin-top: 2px;
}
.butNat:hover {
  background-color: #43c281;
}
.text {
  font-weight: 600;
  font-size: 18px;
}
.centered {
  display:flex;
  align-items: center;
  align-content:center;
  justify-content:center;
}
</style>
