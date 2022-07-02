<template>
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
        <h1 >{{ apartment.title }}</h1>
        <img :src="`/storage/${apartment.img}`" class="img-fluid" :alt="apartment.title">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>{{ apartment.description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <div id="map">

            </div>
            <p>{{ apartment.address }}</p>
            <router-link class="btn btn-info mt-3" :to="{name: 'home'}">
                Torna alla Home
            </router-link>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">

        </div>
    </div>

  </div>
</template>

<script>




export default {
  name: "ApartmentComponent",
  data() {
    return {
      apartment: [],
      lat: 0,
      lng: 0,
    };
  },
  mounted() {
    const id = this.$route.params.id;
    // console.log(id)
    const url = "/api/apartments/" + id;
    window.axios.get(url).then((result) => {
      this.apartment = result.data.results;
      console.log(this.apartment);
       this.lat = this.apartment.lat; //prendo lat
       this.lng = this.apartment.lng; //prendo lng

    console.log(this.lat);
    console.log(this.lng);
    this.createMap(); //funzione per generare la mappa
    });



  },
  methods:{
    createMap(){

    let center = [this.lng, this.lat];
    // let size = 50;
    //size of map, lo sa dio come funziona


    const map = tt.map({
            key: "GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
            container: "map",
            countrySet: 'IT',
            center: center,
            zoom: 15,

            style: {
                map: 'basic_night',
            },
            around: center,
            renderingMode: '3d'
        })
    map.on('load', () => {
                new tt.Marker({anchor: 'center'}).setLngLat(center).setPopup(popup).addTo(map);//adding marker


            })

    let nav = new tt.NavigationControl({});
    map.addControl(nav, 'top-left');
    //navigation control (top-left of map)


    let markerHeight = 18, markerRadius = 10, linearOffset = 25;
    let popupOffsets = {
    'top': [0, 0],
    'top-left': [0,0],
    'top-right': [0,0],
    'bottom': [0, -markerHeight],
    'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'left': [markerRadius, (markerHeight - markerRadius) * -1],
    'right': [-markerRadius, (markerHeight - markerRadius) * -1]
    };

    let popup = new tt.Popup({offset: popupOffsets, className: 'my-class'})
    .setLngLat(center)
    .setHTML("Il tuo appartamento!")
    .addTo(map);


  }
  }
}
</script>

<style lang="scss" scoped>
    #map{
        width: 300px;
        height: 300px;
        margin-top: 50px;
    }



    @media only screen and (max-width: 360px){

    #map{
        width: 225px;
        height: 225px;
    }
}

</style>






