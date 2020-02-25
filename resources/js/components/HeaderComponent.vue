<template>
    <div class="container">
         <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-menu">
                <div class="navbar-item">
                    <router-link to="/" class="navbar-item">Home</router-link>
                    <router-link  to="/users" class="navbar-item">Users</router-link>
                    <router-link  to="/users" class="navbar-item">About Us</router-link>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            //alert('here');
        }
    }
</script>
