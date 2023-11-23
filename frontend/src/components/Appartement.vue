<template>
  <div class="root">
    <a style="text-decoration: none;color:black">
        <div class="photos">
            <div class="PhotoCouverture">
                <img :src="'http://localhost/appart/traitement/imageUpload/'+model.photo">
            </div>
            <!-- <div class="photoProfil">
                <img>
            </div> -->
        </div>
        <div class="text username">{{ model.numLocation }} - {{ model.typeAppartement }}</div>
        <div class="text competence">Adresse:{{ model.adresseLocation }} - {{ model.categorie }}</div>
        <div class="text description">{{ model.equipement }}</div>
    </a>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'

@Options({
  props: {
    model: {
      numLocation: String,
      categorie: String,
      typeAppartement: String,
      nbPersonnes: Number,
      adresseLocation: String,
      photo: String,
      equipement: String,
      tarif: Object,
      proprietaire: Object
    }
  }
})
export default class Appartement extends Vue {
model: any;
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="less">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.root {
  position: relative;
  border-radius: 35px;
  box-shadow: inset 0 0 1em rgb(220, 220, 220,0.9), 0 0 .4em gray;
  width: 300px;
  height: fit-content;
  max-height: 400px;
  overflow-y: scroll;
  text-overflow: ellipsis;
}
.photos {
  width: 100%;
}
.PhotoCouverture img{
  height: 250px;
  width: 100%;
  border-radius: 25px;
}
.photoProfil {
  top: 10px;
  left: 10px;
  position: absolute;
}
.photoProfil img {
    width: 70px;
    height: 70px;
    border-radius: 70px;
    border: 1px solid white;
    box-shadow: inset 0 0 .2em rgb(220, 220, 220,0.9), 0 0 .4em gray;
    transition-duration: .2s;
    transition-timing-function: ease-in-out;
    transition-property: box-shadow width height;
}
.photoProfil img:hover{
    box-shadow: inset 0 0 .2em rgb(220, 220, 220,0.8), 0 .6em .6em gray;
    width: 170px;
    height: 170px;
    border-radius: 170px;
}
.text {
    padding: 5px;
    padding-left: 10px;
}
.description{
    padding-bottom: 20px;
}

</style>
