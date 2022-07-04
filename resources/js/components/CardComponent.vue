<template>
    <div class="cnt-cards pd-20">
        <div class="box-card">
            <!-- <div class="row"> -->
            <div class="cnt-img">
                <!-- <a href="#">
                    <img src="assets/img/mountain.jpg">
                </a> -->
            </div>
            <!-- </div> -->
            <div class="cnt-txt cnt-h col-12">
                <h2>Trentino, Italy</h2>
                <h3>Appartamento</h3>
            </div>
            <div class="price col-12">
                <span>129,00€/notte</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardComponent",

}
</script>

<style scoped lang="scss">
.container {
    position: relative;

    .cnt-label {
        position: sticky;
        /* top: 100px; */
        display: flex;
        padding: 20px;
        color: #fff;
        height: auto;
        background-color: violet;
        left: 50px;
        justify-content: center;
        align-items: center;
        font-weight: 600;
        font-size: 2em;
    }

    .cnt-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
    }

    .box-card {
        display: flex;
        width: calc(100% / 4 - 25px);
        flex-direction: column;

        .cnt-img {
            height: 200px !important;
            width: 200px;
            background-color: blue;
        }

        // img {
        //     width: 100%;
        //     border-radius: 20px;
        // }

        .cnt-h {
            height: 50px;
            padding: 10px 0;

            h2 {
                font-size: 1em;
            }

            h3 {
                color: grey;
                font-size: 0.8em;
            }
        }

        .price {
            display: contents;

            span {
                width: 100%;
                text-align: left;
                font-weight: 600;
            }
        }
    }
}
</style>