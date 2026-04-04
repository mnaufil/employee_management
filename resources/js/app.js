import './bootstrap';
import { createApp } from 'vue';
import EmployeeSearch from './components/EmployeeSearch.vue';

const app = createApp({});
app.component('employee-search', EmployeeSearch);
app.mount('#app');
// console.log('vue mounted test');