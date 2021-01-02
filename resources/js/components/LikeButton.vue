<template>
    <div>
        <button
            class="btn btn-sm"
            v-bind:class="{
                'btn-primary': status,
                'btn-outline-primary': !status
            }"
            @click="likePost"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["userId", "likes"],

    mounted() {
        console.log("Component mounted.");
    },

    data: function() {
        return {
            status: this.likes
        };
    },

    methods: {
        likePost() {
            axios
                .post("/like/" + this.userId)
                .then(response => {
                    this.status = !this.status;

                    //console.log(response.data);
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
        }
    },

    computed: {
        buttonText() {
            return this.status ? "Liked" : "Like";
        }
    }
};
</script>
