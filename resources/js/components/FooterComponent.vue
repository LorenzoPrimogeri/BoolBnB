<template>
  <footer id="Footer">

    <div class="container wmax-100 h-100 pd-20-lr">


      <div class="col-2 h-100">
      </div>

      <div class="cnt-footer-items col-8 h-100">

        <!--search-->
        <div class="cnt-items-ftr">

          <ul>
            <li><a href="#">link1</a></li>
            <li><a href="#">link2</a></li>
            <li><a href="#">link3</a></li>
          </ul>

        </div>
        <!--search-->

      </div>

      <div class="col-2 h-100">
      </div>


    </div>

  </footer>
</template>

<script>
export default {
  name: "FooterComponent",
}
</script>

<style scoped lang="scss">
footer {
  border-top: 1px solid lightgray;
  position: fixed;
  bottom: 0;
  height: auto;
  width: 100%;

  .cnt-footer-items {
    display: flex;
    justify-content: center;
    width: 100%;

    .cnt-items-ftr {

      ul {
        display: flex;
        align-items: center;
        gap: 10px;
        list-style-type: none;
        margin: 0 !important;
        padding: 15px;

        li {
          a {
            text-decoration: none;
            color: darkslategray;

            &:hover {
              color: #7174b6;
            }
          }
        }
      }
    }
  }
}
</style>