<template>
    <div>
        <!-- Search -->
        <input
            v-model="search"
            placeholder="Search employees..."
            class="w-1/3 border px-4 py-2 mb-4"
        />

        <!-- Table -->
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Designation</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="emp in employees" :key="emp?.id" class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ emp.name }}</td>
                    <td class="px-4 py-3">{{ emp.email }}</td>
                    <td class="px-4 py-3">{{ emp.phone || '-' }}</td>
                    <td class="px-4 py-3">{{ emp.designation || '-' }}</td>

                    <!-- ACTION COLUMN -->
                    <td class="px-4 py-3 text-center">
                        <!-- Edit -->
                        <a
                            :href="`/employees/${emp.id}/edit`"
                            class="text-blue-600 hover:underline mr-3"
                        >
                            Edit
                        </a>

                        <!-- Delete -->
                        <button
                            @click="deleteEmployee(emp.id)"
                            class="text-red-600 hover:underline"
                        >
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Empty state -->
                <tr v-if="employees.length === 0">
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                        No employees found.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            search: '',
            employees: [],
            loading: false,
            timeout: null,

            currentPage: 1,
            lastPagge: 1

        };
    },

    watch: {
        search() {
            clearTimeout(this.timeout);

            this.timeout = setTimeout(() =>{
                this.fetchEmployees(1);
            }, 300)
            this.fetchEmployees();
        }
    },

    mounted() {
        this.fetchEmployees();
    },

    methods: {
        fetchEmployees(page = 1) {
            this.loading = true; 

            axios.get('/api/employees', {
                params: { 
                    search: this.search,
                    page: page
                 }
            }).then(res => {
                this.employees = res.data.data || [];
                this.currentPage = res.data.currentPage;
                this.lastPage = res.data.last_Page;
            }).catch(err =>{
                console.error('api eror ', err);
            });
        },
        deleteEmployee(id) {
            if (!confirm("Are you sure?")) return;

            axios.delete(`/employees/${id}`)
                .then(() => {
                    // refresh list after delete
                    this.fetchEmployees();
                })
                .catch(err => {
                    console.error(err);
                });
        }
    }
};
</script>