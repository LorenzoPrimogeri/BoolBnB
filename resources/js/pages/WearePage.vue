<template>
    <div class="body">
        <div class="container pt-4">
            <div class="card card0">
                <div class="border">
                    <h2>Michele Camera</h2>
                    <div class="icons">
                        <a class=""><img
                                src="../../../public/img/linkedin-svgrepo-com.svg"
                                alt="linkedin"></a>
                    </div>
                </div>
            </div>
            <div class="card card1">
                <div class="border">
                    <h2>Lorenzo Primogeni</h2>
                    <div class="icons">
                        <i class="fa fa-codepen" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="card card2">
                <div class="border">
                    <h2>Francesco Moles</h2>
                    <div class="icons">
                        <i class="fa fa-codepen" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="card card3">
                <div class="border">
                    <h2>Marco Cataldi</h2>
                    <div class="icons">
                        <i class="fa fa-codepen" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="card card4">
                <div class="border">
                    <h2>Antonio Ruggiero</h2>
                    <div class="icons">
                        <i class="fa fa-codepen" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'wearePage',
}
</script>

<style scoped lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

.body {
    height: 100vh;
    width: 100vw;
    background-color: #7174b6;

}

.box-title {
    display: flex;
    justify-content: center;
    margin-top: 3%;

    h2 {
        font-family: 'Lobster', cursive;
        font-weight: bold;
        font-size: 2.8rem;
        color: #797cba;
    }
}

.container {
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
    width: 100vw;
    max-height: 800px;
    max-width: 1280px;
    min-height: 600px;
    min-width: 1000px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
}

.border {
    height: 369px;
    width: 290px;
    background: transparent;
    border-radius: 10px;
    transition: border 1s;
    position: relative;
}

.border:hover {
    border: 1px solid #fff;
}

.card {
    height: 379px;
    width: 300px;
    background: #808080;
    border-radius: 10px;
    transition: background 0.8s;
    overflow: hidden;
    background: #000;
    box-shadow: 0 70px 63px -60px #000;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;

}

.card0 {
    background: url("../../../public/img/1618635419788.jpg")center center no-repeat;
    background-size: 380px;
}

.card0:hover {
    background: url("../../../public/img/1618635419788.jpg") left center no-repeat;
    background-size: 600px;
}

.card0:hover h2 {
    color: black;
    opacity: 1;
}

.card0:hover .fa {
    opacity: 1;
}

.card1 {
    background: url("https://i.pinimg.com/originals/28/d2/e6/28d2e684e7859a0dd17fbd0cea00f8a9.jpg") center center no-repeat;
    background-size: 300px;
}

.card1:hover {
    background: url("https://i.pinimg.com/originals/28/d2/e6/28d2e684e7859a0dd17fbd0cea00f8a9.jpg") left center no-repeat;
    background-size: 600px;
}

.card1:hover h2 {
    opacity: 1;
}

.card1:hover .fa {
    opacity: 1;
}

.card2 {
    background: url("https://i.pinimg.com/originals/ee/85/08/ee850842e68cfcf6e3943c048f45c6d1.jpg") center center no-repeat;
    background-size: 300px;
}

.card2:hover {
    background: url("https://i.pinimg.com/originals/ee/85/08/ee850842e68cfcf6e3943c048f45c6d1.jpg") left center no-repeat;
    background-size: 600px;
}

.card2:hover h2 {
    opacity: 1;
}

.card2:hover .fa {
    opacity: 1;
}

.card3 {
    background: url("../../../public/img/marco\ c.jpg") center center no-repeat;
    background-size: 380px;
}

.card3:hover {
    background: url("../../../public/img/marco\ c.jpg") left center no-repeat;
    background-size: 600px;
}

.card3:hover h2 {
    opacity: 1;
}

.card3:hover .fa {
    opacity: 1;
}

.card4 {
    background: url("../../../public/img/antonio\ \(1\).jpg") center center no-repeat;
    background-size: 380px;
}

.card4:hover {
    background: url("../../../public/img/antonio\ \(1\).jpg") left center no-repeat;
    background-size: 600px;
}

.card4:hover h2 {
    opacity: 1;
}

.card4:hover .fa {
    opacity: 1;
}



h2 {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    color: #fff;
    margin: 20px;
    opacity: 0;
    transition: opacity 1s;
}

.fa {
    opacity: 0;
    transition: opacity 1s;
}

.icons {
    position: absolute;
    fill: #fff;
    color: #fff;
    height: 130px;
    top: 226px;
    width: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
}
</style>