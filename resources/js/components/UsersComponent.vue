<template>
    <div class="container">
        <div class="row justify-content-center" v-if="usersData">
            <div class="col-md-4" v-for="user in usersData">
                <div class="card">
                    <div class="card-header"><a href="#" v-on:click="getUserDetails(user)">User Details</a></div>

                    <div class="card-body">
                        <h2>{{user.name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
    
        data () {
            return {
                usersData: [
                   /*  { id: 1, name: 'My journey with Vue' },
                    { id: 2, name: 'Blogging with Vue' },
                    { id: 3, name: 'Why Vue is so fun' } */
                ]
            }
        },
		//props: ['usersData'],
        mounted() {
           // getUserDetails(){
                axios
                    .get('/api/v1/users')
                    .then(response => (this.usersData = response.data))
            //}
        }
       /*  methods: {
            getUserDetails(){
                axios
                    .get('/api/v1/users')
                    .then(response => (this.usersData = response))
            }
        } */
    }
</script>