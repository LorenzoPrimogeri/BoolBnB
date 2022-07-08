<template>
    <main>
        <div class="container jc-c wmax-100">
            <div class="cnt-cards">
                <div class="cards box-card">
                    <div class="picture">
                        <img class="img-fluid" src="assets/img/photo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Lorenzo Primogeri</h3>
                        <h4 class="title">Jr. FullStack Developer</h4>
                        <h5>Backend Developer</h5>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="ico ico-lnkd"
                                aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>

                <div class="cards box-card">
                    <div class="picture">
                        <img class="img-fluid" src="assets/img/photo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Antonio Ruggero</h3>
                        <h4 class="title">Jr. FullStack Developer</h4>
                        <h5>Backend Developer</h5>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="ico ico-lnkd"
                                aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>

                <div class="cards box-card">
                    <div class="picture">
                        <img class="img-fluid" src="assets/img/photo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Francesco Moles</h3>
                        <h4 class="title">Jr. FullStack Developer</h4>
                        <h5>Backend Developer</h5>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="ico ico-lnkd"
                                aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>

                <div class="cards box-card">
                    <div class="picture">
                        <img class="img-fluid" src="assets/img/photo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Michele Camera</h3>
                        <h4 class="title">Jr. FullStack Developer</h4>
                        <h5>Fontend Developer</h5>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="ico ico-lnkd"
                                aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>

                <div class="cards box-card">
                    <div class="picture">
                        <img class="img-fluid" src="assets/img/photo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Marco Cataldi</h3>
                        <h4 class="title">Jr. FullStack Developer</h4>
                        <h5>Frontend Developer</h5>
                    </div>
                    <ul class="social">
                        <li><a href="#" class="ico ico-lnkd"
                                aria-hidden="true"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: 'wearePage',

    mounted() {

        $(document).ready(function () {
            let cards = $(".cards")
            for (let i = 0; i < cards.length; i++) {
                let target = Math.floor(Math.random() * cards.length - 1) + 1;
                let target2 = Math.floor(Math.random() * cards.length - 1) + 1;
                cards.eq(target).before(cards.eq(target2));
            }
        });
    }
}

</script>

<style scoped lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
//font-family: 'Lobster', cursive;

main {
    display: flex;
    width: 100%;
    margin: 180px auto;
    flex-direction: column;

    .cnt-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;

        .box-card {
            display: flex;
            flex-direction: column;
            position: relative;
            width: calc(100% / 4 - 25px);
            padding: 30px 0 80px;
            margin-bottom: 30px;
            background-color: #d2d9ff;
            text-align: center;
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid #dfdfdf;
            -webkit-box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);
            -moz-box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);
            box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);

            .picture {
                margin: 0 auto;
                position: relative;
                display: inline-block;
                height: 130px;
                width: 130px;
                margin-bottom: 20px;
                z-index: 1;

                &::before {
                    content: "";
                    width: 100%;
                    height: 0;
                    border-radius: 50%;
                    background-color: #9eadff;
                    position: absolute;
                    bottom: 135%;
                    right: 0;
                    left: 0;
                    opacity: 0.9;
                    transform: scale(3);
                    transition: all 0.3s linear 0s;
                }

                img {
                    width: 100%;
                    height: auto;
                    border-radius: 50%;
                    transform: scale(1);
                    transition: all 0.9s ease 0s;
                }
            }

            &:hover .picture::before {
                height: 100%;
            }

            .picture img {
                box-shadow: 0 0 0 5px #f7f5ec;
                transform: scale(0.7);
            }

            .team-content {
                display: flex;
                flex-direction: column;
                gap: 5px;

                h3,
                h5 {
                    color: #3b426c;
                }

                h4 {
                    color: #fff;
                }
            }

            .title {
                display: block;
                font-size: 15px;
                color: #4e5052;
                text-transform: capitalize;
            }

            .social {
                display: flex;
                padding: 10px;
                justify-content: center;
                width: 100%;
                margin: 0;
                background-color: #313131;
                position: absolute;
                bottom: -100px;
                left: 0;
                transition: all 0.5s ease 0s;

                li {
                    display: inline-block;

                    a {
                        display: block;
                        padding: 10px;
                        font-size: 17px;
                        color: white;
                        transition: all 0.3s ease 0s;
                        text-decoration: none;
                    }

                    .ico {
                        width: 30px;
                        height: 30px;
                        background-color: lightgray;
                    }

                    .ico-lnkd {
                        background: url("../../../public/img/linkedin-svgrepo-com.svg");
                    }
                }
            }

            &:hover .social {
                bottom: 0;
            }
        }
    }
}
</style>