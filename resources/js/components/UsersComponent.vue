<template>
    <div class="container">
        <div class="row justify-content-center" v-if="usersData">
            <div class="col-md-4" v-for="user in usersData">
                <div class="card">
                    <div class="card-header">All Users</div>

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
		props: ['usersData'],
        mounted() {
            console.log(this.usersData)
        }
    }
</script>