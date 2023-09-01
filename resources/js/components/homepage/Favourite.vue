<template>
    <div class="image-gallery">
        <h2 class="title">Địa điểm yêu thích</h2>
        <div class="images">
            <div class="image-wrapper" v-for="(image, index) in imageList" :key="index">
                <div class="image-container">
                    <img :src="image.src" :alt="`Ảnh ${index + 1}`" class="gallery-image">
                </div>
                <p class="image-name">{{ image.name }}</p>
            </div>
        </div>
        <div class="style-POxBs" aria-hidden="true" id="style-POxBs">
            <svg width="16" height="17" fill="none" class="svgFillAll jss663">
                <path d="M3.333 8.5h9.334M10 11.167L12.667 8.5M10 5.833L12.667 8.5" stroke="#1A202C" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </div>
        <div class="controls">
            <!-- <button @click="prevImage" :disabled="currentImageIndex === 0">Trước</button>
            <button @click="nextImage" :disabled="currentImageIndex === imageList.length - 1">Sau</button> -->
            <!-- <div class="style-POxBs" aria-hidden="true" id="style-dWwwM">
                <svg width="16" height="17" fill="none" class="svgFillAll jss663" style="transform: rotate(180deg);">
                    <path d="M3.333 8.5h9.334M10 11.167L12.667 8.5M10 5.833L12.667 8.5" stroke="#1A202C" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </div> -->

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageList: [
                { src: ".../file/img/banner1.jpg", name: "Địa điểm 1" },
                { src: "resources/file/img/banner2.jpg", name: "Địa điểm 2" },
                { src: "resources/file/img/banner3.jpg", name: "Địa điểm 3" },
                { src: "resources/file/img/banner4.jpg", name: "Địa điểm 4" },
                { src: "resources/file/img/banner1.jpg", name: "Địa điểm 5" },
                { src: "resources/file/img/banner1.jpg", name: "Địa điểm 6" },
                { src: "resources/file/img/banner1.jpg", name: "Địa điểm 7" }
            ],
            currentImageIndex: 0
        };
    },
    methods: {
        prevImage() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
            }
        },
        nextImage() {
            if (this.currentImageIndex < this.imageList.length - 1) {
                this.currentImageIndex++;
            }
        }
    }
};
</script>

<style scoped>
.title {
    margin-bottom: 50px;
    font-size: 20px;
    text-align: left;
    /* Sang trái */
}

.image-gallery {
    margin-top: 50px;
    width: 100%;
    padding: 20px;
    background-color: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.images {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}


.controls {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.image-wrapper {
    flex: 1;
    margin-right: 10px;
    margin-bottom: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
}

.image-container {
    position: relative;
    width: 120px;
    /* Độ rộng ảnh vuông cùng với margin và padding */
    height: 120px;
    /* Chiều cao ảnh vuông cùng với margin và padding */
    border-radius: 10%;
    overflow: hidden;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-name {
    margin-top: auto;
    /* Đẩy chữ xuống dưới ảnh */
    font-size: 14px;
    text-align: center;
    padding: 5px;
    /* Khoảng cách từ chữ tới viền ảnh */
    box-sizing: border-box;
}

#style-POxBs.style-POxBs {
    background: white;
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
    border-radius: 100px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 8px 12px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    /* right: 80px; */
}
</style>

