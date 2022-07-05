<template>
    <div>
        <div id="bgExpand" class="bgExpandFilter">
        </div>
        <div id="cntExpand" class="cntExpandFilter">
            <div class="main-filter">

                <div class="row-filter-ttl jc-e">
                    <div class="cnt-ttl">
                        <h2>Filtri</h2>
                    </div>
                    <div class="cnt-btn-close">
                        <div class="btn-closed"></div>
                    </div>
                </div>
                <div class="cnt-row">
                    <div class="row-filter">
                        <div class="cnt-filter">
                            <h3>Numero Stanze</h3>
                            <div class="cnt-filter-select">
                                <input type="number">
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <div class="cnt-filter">
                            <h3>Numero posti Letto</h3>
                            <div class="cnt-filter-select">
                                <input type="number">
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <div class="cnt-filter">
                            <h3>Servizi</h3>
                            <div class="cnt-filter-select d-flex gp-20">
                                <div class="main-check">
                                    <div class="cnt-checkbox">
                                        <input class="input-check"
                                            type="checkbox" value=""
                                            name="services[]">
                                        <span class="checkmark"></span>
                                    </div>
                                    <div class="form-check-label">Wi-Fi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <div class="cnt-filter">
                            <h3>Distanza</h3>
                            <div class="cnt-filter-select">
                                <input type="number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FilterComponent'

}
</script>

<style  lang="scss">
body.enlargeFilter {
    position: fixed;
}

.bgExpandFilter {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: #010b2600;
    z-index: 3;
    transition: all 0.5s ease-in-out;
    visibility: hidden;
}

#bgExpand.enlargeFilter {
    visibility: visible;
}

#cntExpand.enlargeFilter {
    top: 0;
    opacity: 1;
    height: 100%;
    width: 100%;
    background-color: rgba(23, 23, 23, 0.9);
    margin-top: auto;
    left: 0;
    margin-left: auto;
}

.main-check {
    display: flex;
    align-items: center;
    gap: 10px;

    .cnt-checkbox {
        position: relative;
        height: 25px;
        width: 25px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;

        .cnt-checkbox:hover input~.checkmark {
            background-color: #ccc;
        }

        .cnt-checkbox input:checked~.checkmark {
            background-color: #2196f3;
        }

        .cnt-checkbox input:checked~.checkmark:after {
            display: block;
        }

        input[type="checkbox"].input-check {
            position: absolute;
            width: 25px;
            height: 25px;
            left: 0;
            z-index: 2;
            accent-color: #7174b6;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;

            &:after {
                content: "";
                position: absolute;
                display: none;
            }

            &:after {
                left: 9px;
                top: 5px;
                width: 5px;
                height: 10px;
                border: solid white;
                border-width: 0 3px 3px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
            }
        }
    }
}

.cnt-btn-close {
    position: relative;
    width: 40px;
    height: 40px;
    box-sizing: border-box;
    color: black;
    text-decoration: none;
    -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    -o-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
    border-radius: 50%;
    background-color: #010b26;
    background-color: transparent;

    .btn-closed {
        &::after {
            content: "";
            display: block;
            height: 30px;
            width: 3px;
            background: #90a9e8;
            position: absolute;
            left: 20px;
            top: 5px;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            border-radius: 5px;
        }

        &::before {
            content: "";
            display: block;
            height: 30px;
            width: 3px;
            background: #90a9e8;
            position: absolute;
            left: 20px;
            top: 5px;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            border-radius: 5px;
        }
    }
}

.cntExpandFilter {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    top: -1000px;
    margin-top: -350px;
    z-index: 200;
    opacity: 0;
    transition: all 0.5s ease-in-out;

    .main-filter {
        width: 80%;
        height: calc(100% - 100px);
        border-radius: 5px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transform-style: preserve-3d;
        overflow: auto;

        &::-webkit-scrollbar {
            display: none;
        }

        & {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .row-filter-ttl {
            display: flex;
            justify-content: flex-end;
            position: sticky;
            width: 100%;
            top: 0;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #d9d9d9;
            z-index: 3;

            .cnt-ttl {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);

                h2 {
                    font-size: 1.5em;
                }
            }
        }

        .cnt-row {
            padding: 50px;

            .row-filter {
                position: relative;
                display: flex;
                padding: 10px;
                border-bottom: 1px solid #d9d9d9;

                .cnt-filter-select {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 20px 0;

                    input[type="number"] {
                        display: inline-block;
                        width: max-content;
                        padding: 12px 20px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 1050px) {

    .contExpandLogMob,
    .contExpandLogRegMob {
        width: 90%;
        // background: url("../img/index/bg-dots-blu.svg") no-repeat center;
        background-color: white;
        background-size: cover;
        left: 50%;
        margin-left: -45%;
        border-radius: 5px;
        z-index: 200;
        opacity: 0;
        transition: all 0.5s ease-in-out;
    }

    #contExpandLogInMob.enlargeLogIn,
    #contExpandRegMob.enlargeLogIn {
        opacity: 1;
        width: 100%;
        height: 100%;
    }
}
</style>