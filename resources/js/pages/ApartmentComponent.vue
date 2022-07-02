<template>
  <div class="container-fluid">
    <div class="cnt-item-details text center">
      <div class="cnt-row col-12">
        <h3>Titolo:</h3>
        <p>{{ apartment.title }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Indirizzo:</h3>
        <p>{{ apartment.address }}</p>
      </div>
      <div class="cnt-row col-12">
        <div class="cnt-img">
          <!-- <img :src="asset('storage/'.apartment.img)" alt="" /> -->
        </div>
      </div>
      <div class="cnt-row col-12">
        <h3>Descrizione:</h3>
        <p>{{ apartment.description }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Stanze:</h3>
        <p>{{ apartment.room }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Bagni:</h3>
        <p>{{ apartment.bathroom }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Letti:</h3>
        <p>{{ apartment.bed }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Metri Quadri:</h3>
        <p>{{ apartment.mq }}</p>
      </div>
      <div class="cnt-row col-12">
        <h3>Prezzo:</h3>
        <p>{{ apartment.price }}</p>
      </div>
      <!-- <div class="cnt-row col-12">
          <h3>Servizi:</h3>
          @foreach (apartment.services as service)
          <p>{{ service->name }}</p>
          @endforeach
        </div> -->
    </div>
    <div class="col-6 offset-3">
      <div id="map" style="width: 500px; height: 500px; margin-top: 50px"></div>
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
      this.lat = this.apartment.lat;
      this.lng = this.apartment.lng;

      console.log(this.lat);
      console.log(this.lng);
      this.createMap();
    });
  },
  methods: {
    createMap() {
      let center = [this.lng, this.lat];
      let size = 50;
      let scale = new tt.ScaleControl({
        maxWidth: 80,
        unit: "imperial",
      });

      const map = tt.map({
        key: "GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        container: "map",
        countrySet: "IT",
        center: center,
        zoom: 15,
        size: size,
        style: {
          map: "basic_night",
        },
        around: center,
        renderingMode: "3d",
      });
      map.on("load", () => {
        new tt.Popup().setLngLat(center).setText("Il mio appartamento");
        new tt.Marker({ anchor: "center" }).setLngLat(center).addTo(map);
      });
      let nav = new tt.NavigationControl({});

      map.addControl(nav, "top-left");
    },
  },
};
</script>

<style lang="scss" scoped>
</style>




