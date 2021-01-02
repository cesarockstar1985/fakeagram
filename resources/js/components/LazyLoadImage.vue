<template>
    <img
        itemprop="image"
        v-bind:style="styleObject"
        v-bind:src="imageScr"
        v-bind:alt="alt"
    />
</template>

<script>
export default {
    props: {
        initialImage: {
            type: String,
            required: true
        },
        finalImage: {
            type: String,
            required: true
        },
        alt: {
            type: String,
            default: ""
        },
        blurAmount: {
            type: Number,
            default: 5
        }
    },
    data() {
        return {
            imageScr: this.initialImage,
            loaded: false,
            completed: false,
            styleObject: {
                filter: `blur(${this.blurAmount}px)`,
                transition: "all 1s"
            }
        };
    },
    methods: {
        setWindowLoaded() {
            setTimeout(() => {
                this.loaded = true;
            }, 100);
        },
        lazyLoad() {
            if (this.loaded && !this.completed) {
                this.completed = true;
                this.imageScr = this.finalImage;
                this.styleObject = {
                    transition: "all 1s"
                };
            }
        }
    },
    mounted() {
        window.addEventListener("load", this.setWindowLoaded);

        window.addEventListener("scroll", this.lazyLoad);
    }
};
</script>
