<template>
    <div>
        <div v-for="post in allPost" :key="post.id" class="card">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{post.updated_at}}</small></p>
                </div>
                <router-link>Visualizza</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostComponent",
    data(){
        return{
            allPost: Array
        }
    },
    mounted(){
        window.axios.get("http://127.0.0.1:8000/api/posts").then(r => {
            this.allPost = r.data;
            console.log(this.allPost);
        }).catch(e => {
            console.log(e);
        })
    },
    methods:{
        /* getPost(){
            return this.allPost;
        } */
    }
}
</script>

<style>
</style>
