<template>
    <div class="form-group pt-3">
        <textarea
            v-on:keydown.enter="sendComment"
            v-model="message"
            class="form-control"
            id="comment"
            rows="3"
            placeholder="Escribe un comentario"
        ></textarea>
    </div>
</template>

<script>
export default {
    props: ["userId", "postId"],

    mounted() {
        console.log("Component mounted.");
    },

    data: function() {
        return {
            status: this.follows,
            message: ""
        };
    },

    methods: {
        sendComment() {
            axios
                .post("/comment/", { params: {
                    comment: this.message,
                    user: this.userId,
                    post: this.postId
                } })
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
            return this.status ? "Unfollow" : "Follow";
        }
    }
};
</script>
