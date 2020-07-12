<template>
    <div class="py-2 px-0">
        <a class="btn btn-outline p-0" @click="changeHeart()">
            <svg id="svg" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path id="heart-unfilled" fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
            </svg>
        </a>
    </div>  
</template>

<script>
    export default {
        props: ['ifuserlikedblog', 'blogid'],

        mounted() {
            console.log('Component mounted.')
        },

        methods:{  
            changeHeart(){
                let svg = document.getElementById("svg");
                let heart = document.getElementById("heart-unfilled");

                if(this.ifuserlikedblog){
                    heart.setAttribute("d", "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z");
                }
                else{
                    heart.setAttribute("d", "M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z");
                }
                axios.post("/like/" + this.blogid)
                    .then(response => {
                            console.log(this.ifuserlikedblog);
                            this.ifuserlikedblog = !this.ifuserlikedblog;
                        })
                        .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        }
    }
</script>
