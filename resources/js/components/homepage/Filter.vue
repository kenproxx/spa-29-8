<script setup>
</script>

<template>

<!--    <div class="banner">-->
<!--        <video id="bgVideo" autoplay loop muted>-->
<!--            <source src="/src/file/banner2.mp4" type="video/mp4">-->
<!--            Your browser does not support the video tag.-->
<!--        </video>-->
<!--        <div class="overlay">-->
<!--            <div class="video-controls">-->
<!--                <button id="playPauseBtn" class="play">Play</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


    <div class="MuiBox-root jss392 jss101 snipcss0-3-3-4 snipcss-w6XCI" id="dv_filter">
        <div class="MuiBox-root jss393 jss102 snipcss0-4-4-5" id="filter">
            <div @click="activateMenu(1)" :class="{ jss104: activeMenu === 1 }"
                 class="MuiBox-root jss394 jss103 style-vgook" id="style-vgook">
                <span class="MuiBox-root jss395 jss105 jss106">
                    <svg width="20" height="20" fill="none" class="svgFillAll snipcss0-7-7-8">
                        <path
                            d="M2.5 4.75h11.25a.375.375 0 00.351-.507l-.943-2.513A1.131 1.131 0 0012.105 1h-7.96a1.131 1.131 0 00-1.05.73l-.946 2.513a.375.375 0 00.351.507zM18.25 17.5h-1.125a.188.188 0 01-.188-.188v-.357a.184.184 0 01.114-.167 1.681 1.681 0 001.012-1.538 50.433 50.433 0 00-1.328-5.355.391.391 0 00-.72 0 50.433 50.433 0 00-1.328 5.355 1.682 1.682 0 001.013 1.538.185.185 0 01.113.168v.357a.187.187 0 01-.187.187h-2.438a.188.188 0 01-.188-.188V5.688a.188.188 0 00-.188-.187H3.438a.187.187 0 00-.188.188v11.625a.188.188 0 01-.188.187H1.75a.75.75 0 100 1.5h16.5a.75.75 0 100-1.5zM5.125 7.562H7a.563.563 0 110 1.125H5.125a.563.563 0 110-1.124zM4.562 11.5a.562.562 0 01.563-.563H7a.563.563 0 010 1.126H5.125a.563.563 0 01-.563-.563zm4.688 5.813a.188.188 0 01-.188.187H7.188A.188.188 0 017 17.312v-1.687a1.125 1.125 0 012.25 0v1.688zm1.875-5.25H9.25a.562.562 0 010-1.126h1.875a.562.562 0 110 1.126zm0-3.376H9.25a.562.562 0 110-1.124h1.875a.562.562 0 110 1.125z"
                            fill="#F36">
                        </path>
                    </svg>
                </span>
                <h2 class="snipcss0-6-6-9 style-SVeSM" id="style-SVeSM">
                    <router-link to="/">Khách sạn</router-link>
                </h2>
                <h3 class="snipcss0-6-6-10 style-5sQGp" id="style-5sQGp">
                    Hot Deal khách sạn 5* đồng giá chỉ 88k
                </h3>
                <div class="MuiBox-root jss588 jss111 jss113 snipcss0-6-6-11">
                    Sale Hè
                </div>
            </div>
            <div @click="activateMenu(2)" :class="{ jss104: activeMenu === 2 }"
                 class="MuiBox-root jss396 jss103 style-stPvP" id="style-stPvP">
                <span class="MuiBox-root jss397 jss105">
                    <svg width="20" height="20" fill="none" class="svgFillAll snipcss0-7-13-14">
                        <path
                            d="M5.073 5.269l3.25 1.345a.417.417 0 00.326 0l3.46-1.506a.209.209 0 000-.383L7.703 2.904a.838.838 0 00-.639 0l-1.99.826a.833.833 0 000 1.539z"
                            fill="#1A202C">
                        </path>
                        <path
                            d="M19.656 5.043a2.083 2.083 0 00-2.722-1.127h-.006L5.895 8.718a.417.417 0 01-.352-.01l-1.98-.99a.843.843 0 00-.701-.02l-2.172.93a.833.833 0 00-.262 1.357l3.12 3.12a.833.833 0 00.899.185l4.68-1.874a.207.207 0 01.273.266l-1.63 4.35a.833.833 0 001.153 1.038l2.258-1.13a.833.833 0 00.375-.373l3.124-6.25a.416.416 0 01.228-.204l3.62-1.35a2.083 2.083 0 001.128-2.72z"
                            fill="#1A202C">
                        </path>
                    </svg>
                </span>
                <h2 class="snipcss0-6-12-15 style-cdztE" id="style-cdztE">
                    <router-link to="/ticket">Vé máy bay</router-link>
                </h2>
                <h3 class="snipcss0-6-12-16 style-mofFi" id="style-mofFi">
                    Đặt vé máy bay giá tốt, dễ dàng thao tác, hoàn hủy linh hoạt
                </h3>
                <div class="MuiBox-root jss589 jss111 jss112 snipcss0-6-12-17">
                    Chỉ 19k
                </div>
            </div>
            <div @click="activateMenu(3)" :class="{ jss104: activeMenu === 3 }"
                 class="MuiBox-root jss398 jss103 snipcss0-5-5-18 style-Nm1R4" id="style-Nm1R4">
                <span class="MuiBox-root jss399 jss105 snipcss0-6-18-19">
                    <svg width="20" height="20" fill="none" class="svgFillAll snipcss0-7-19-20">
                        <path
                            d="M11.854 11.806h2.102c.465 0 .838.374.838.84v1.578a.835.835 0 01-.838.837h-2.102a.836.836 0 01-.838-.837v-1.579c0-.465.374-.838.838-.838zM10.007 2c-.302 0-.607.165-.942.492L1.352 9.143c-.981.982.256 2.292 1.698 2.292v6.288c0 .706.641 1.274 1.438 1.274.825 0 1.413.098 1.413-.924V13.39c0-.877.705-1.582 1.582-1.582h.288c.877 0 1.582.705 1.582 1.582v4.69c0 .706.053.919 1.007.919h5.154c.797 0 1.438-.57 1.438-1.275v-6.288c1.44 0 2.679-1.31 1.697-2.292l-7.713-6.652c-.328-.33-.628-.492-.93-.491z"
                            fill="#1A202C">
                        </path>
                    </svg>
                </span>
                <h2 class="snipcss0-6-18-21 style-F23mo" id="style-F23mo">
                    <router-link to="/homestay">Biệt thự, Homestay</router-link>
                </h2>
            </div>
            <div class="MuiBox-root jss400 jss107" id="test">
            </div>
        </div>
    </div>
<!--    <router-view></router-view>-->
</template>

<!--<script>-->
<!--export default {-->
<!--    data() {-->
<!--        return {-->
<!--            activeMenu: 1-->
<!--        };-->
<!--    },-->
<!--    methods: {-->
<!--        activateMenu(menuNumber) {-->
<!--            this.activeMenu = menuNumber;-->
<!--            const divElement = document.getElementById('test');-->
<!--            if (this.activeMenu === 1) {-->
<!--                divElement.style.left = '0px';-->
<!--            } else if (this.activeMenu === 2) {-->
<!--                divElement.style.left = '160px';-->
<!--            } else if (this.activeMenu === 3) {-->
<!--                divElement.style.left = '330px';-->
<!--                divElement.style.width = '160px';-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--};-->
<!--</script>-->

<style scoped>
@font-face {
    font-family: Mt;
    src: url(https://mytour.vn/fonts/Mt/Mt-Regular.otf);
    font-display: swap;
}

body {
    color: #1a202c;
    font-size: 14px;
    font-weight: normal;
    line-height: 17px;
    font-family: Mt, -apple-system, BlinkMacSystemFont, sans-serif;
}

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

* {
    box-sizing: inherit;
}

body {
    padding: 0;
    margin: 0;
    font-family: Mt, -apple-system, BlinkMacSystemFont, sans-serif;
}

body {
    color: rgba(0, 0, 0, 0.87);
    margin: 0;
    font-size: 12px;
    font-family: Mt;
    font-weight: normal;
    line-height: 14px;
    background-color: #fff;
}

html {
    padding: 0;
    margin: 0;
    font-family: Mt, -apple-system, BlinkMacSystemFont, sans-serif;
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

*,
:before,
:after {
    box-sizing: inherit;
}

:-webkit-scrollbar {
    width: 8px;
    height: 10px;
}

:-webkit-scrollbar {
    height: 5px;
    width: 5px;
}

:-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #a0a0a0;
}

:-webkit-scrollbar-thumb {
    background: #bdbdbd;
    border-radius: 8px;
}

:-webkit-scrollbar-track {
    background: #e0e0e0;
}

.jss102 {
    gap: 40px;
    display: flex;
    position: relative;
    align-items: center;
}

.jss101 {
    width: 100%;
    height: 48px;
    display: flex;
    padding: 8px;
    position: relative;
    align-items: center;
    justify-content: center;
}

/* #filter {
    width: 85%;
    height: 48px;
    display: flex;
    padding: 8px;
    position: relative;
    background: white;
    box-shadow: 0px 10px 10px rgba(26, 32, 44, 0.05);
    align-items: center;
    border-bottom: 1px solid #EDF2F7;
    border-radius: 6px;
    justify-content: center;

    position: relative;
    display: flex;
    flex-direction: column;
} */

.jss103 {
    cursor: pointer;
    display: flex;
    position: relative;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    align-items: center;
    font-weight: 600;
    line-height: 19px;
    justify-content: center;
}

.jss107 {
    left: 0px;
    width: 110px;
    bottom: -14px;
    height: 2px;
    position: absolute;
    transition: all 0.3s;
    background-color: #FF3366;
}

.jss104 {
    color: #FF3366;
}

.jss111 {
    left: 28px;
    bottom: 26px;
    padding: 2px 4px;
    position: absolute;
    font-size: 11px;
    font-weight: 600;
    line-height: 13px;
    border-radius: 5px 5px 5px 0px;
}

.jss113 {
    color: #ffffff;
    background-color: #FF3366;
}

.jss105 {
    margin-right: 8px;
}

.jss112 {
    color: #FF3366;
    border: 1px solid #FF3366;
    background-color: #ffffff;
}

svg {
    display: block;
}

.jss105 svg {
    fill: #1a202c;
    transition: all 0.3s ease-in-out;
}


/* These were inline style tags. Uses id+class to override almost everything */
#style-vgook.style-vgook {
    min-width: 110px;
}

#style-SVeSM.style-SVeSM {
    font-size: inherit;
    margin: initial;
}

#style-5sQGp.style-5sQGp {
    display: none;
}

#style-stPvP.style-stPvP {
    min-width: 130px;
}

#style-cdztE.style-cdztE {
    font-size: inherit;
    margin: initial;
}

#style-mofFi.style-mofFi {
    display: none;
}

#style-Nm1R4.style-Nm1R4 {
    min-width: 178px;
}

#style-F23mo.style-F23mo {
    font-size: inherit;
    margin: initial;
}

/*  banner video */

/*   chilrend */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
}

.video-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
}

#playPauseBtn {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

/* #dv_filter {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
} */

/*   chilrend  end*/
body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
}

.banner {
    left: 0;
    position: relative;
    width: 100%;
    height: 60vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

/* banner video  end */
</style>
