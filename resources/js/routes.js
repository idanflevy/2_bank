export default [
    { path: '/profiles', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/shipschedules', component: require('./components/Shipschedules.vue').default },
    { path: '/courier', component: require('./components/Courier.vue').default },
    { path: '/courier-records', component: require('./components/CourierTable.vue').default },
    { path: '/tracking', component: require('./components/tracking.vue').default }, 
    { path: '/admin-user', component: require('./components/Adminuser.vue').default }, 


  



 

   


    { path: '*', component: require('./components/NotFound.vue').default }
];
