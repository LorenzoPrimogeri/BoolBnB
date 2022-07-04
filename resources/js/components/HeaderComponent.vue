<template>
  <header id="Header">
    <div id="logo-container">
      <img src="../../../public/img/boolbnb-logo.svg" alt="">
    </div>
    <div  id="search-container"></div>
    <div  id="btn-container" >
      <a href="/login" class="btn btn-primary">Accedi</a>
      <a href="/register" class="btn btn-primary">Registrati</a>
      <a href="/search" class="btn btn-primary">Cerca</a>
    </div>
  </header>
</template>

<script>
export default {
    name: "HeaderComponent",

}
</script>

<style scoped lang="scss">
#Header{
    width: 100vw;
    height:10vh;
    display: flex;
    #logo-container{
        width: 15vw;
        height:10vh;
        display: flex;
        justify-content: center;
        align-items: center;
        img{
          width: 200px;
        }
    }
    #search-container{
        width: 70vw;
        height:10vh;
    }
    #btn-container{
        width: 15vw;
        height:10vh;
        display: flex;
        justify-content: center;
        align-items: center;
        a{
         margin: 1%;
        }
    }
}
</style>