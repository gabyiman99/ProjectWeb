<template lang="pug">
b-navbar(class='navbar-laravel', toggleable='md', type='dark')
    b-container
        b-navbar-toggle(target='nav_collapse')
        slot(name="brand")
        b-collapse#nav_collapse(is-nav)
            b-navbar-nav
                slot(name="left")
                // Right aligned nav items
            b-navbar-nav.mx-auto
                slot(name="center")
            b-navbar-nav.ml-auto
                slot(name="right")
</template>