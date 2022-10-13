export default [
    { path: '/profiles', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/admin-user', component: require('./components/Adminuser.vue').default }, 


  



 

   


    { path: '*', component: require('./components/NotFound.vue').default }
];
