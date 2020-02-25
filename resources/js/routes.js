import UserComponent from './components/UsersComponent.vue';
import Example from './components/ExampleComponent.vue';
export const routes = [
    { path: '/users', component: UserComponent, name: 'UserComponent' },
    { path: '/example', component: Example, name: 'Example' }
];