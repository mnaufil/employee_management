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
                    <td class="px-4">{{ emp.name }}</td>
                    <td class="px-4">{{ emp.email }}</td>
                    <td class="px-4">{{ emp.phone || '-' }}</td>
                    <td class="px-4">{{ emp.designation || '-' }}</td>

                    <!-- ACTION COLUMN -->
                    <td class="px-4 text-center">
    <div class="flex items-center justify-center gap-3">
        <a
            :href="`/employees/${emp.id}/edit`"
            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-blue-700 bg-blue-50 hover:bg-blue-600 hover:text-white transition-all duration-200 shadow-sm font-bold text-base"
            title="Edit Employee"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            <span>Edit</span>
        </a>

        <button
            @click="deleteEmployee(emp.id)"
            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-red-700 bg-red-50 hover:bg-red-600 hover:text-white transition-all duration-200 shadow-sm font-bold text-base"
            title="Delete Employee"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <span>Delete</span>
        </button>
    </div>
</td>
                </tr>

                <!-- Empty state -->
                <tr v-if="employees.length === 0">
                    <td colspan="5" class="px-4 text-center text-gray-500">
                        No employees found.
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="mt-4 flex justify-center items-center gap-2">

            <!-- PREV -->
            <button
                @click="fetchEmployees(currentPage - 1)"
                :disabled="currentPage === 1"
                class="px-3 py-1 border rounded disabled:opacity-50"
            >
                Prev
            </button>

             <!-- PAGE NUMBERS -->
            <button
                v-for="page in pages"
                :key="page"
                @click="fetchEmployees(page)"
                :class="[
                    'px-3 py-1 border rounded',
                    currentPage === page ? 'bg-blue-500 text-white' : ''
                ]"
            >
                {{ page }}
            </button>

            <!-- NEXT -->
            <button
                @click="fetchEmployees(currentPage + 1)"
                :disabled="currentPage === lastPage"
                class="px-3 py-1 border rounded disabled:opacity-50"
            >
                Next
            </button>

        </div>

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
            lastPage: 1

        };
    },

    watch: {
        search() {
            clearTimeout(this.timeout);

            this.timeout = setTimeout(() =>{
                this.fetchEmployees(1);
            }, 300)
            // this.fetchEmployees();
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
                this.currentPage = res.data.current_page;
                this.lastPage = res.data.last_page;
            }).catch(err =>{
                console.error('api eror ', err);
            }).finally(() => {
                this.loading = false;
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
    },

    computed: {
    pages() {
        let pages = [];

        let start = Math.max(1, this.currentPage - 2);
        let end = Math.min(this.lastPage, this.currentPage + 2);

        // Always show first page
        if (start > 1) {
            pages.push(1);
            if (start > 2) pages.push('...');
        }

        // Middle pages
        for (let i = start; i <= end; i++) {
            pages.push(i);
        }

        // Always show last page
        if (end < this.lastPage) {
            if (end < this.lastPage - 1) pages.push('...');
            pages.push(this.lastPage);
        }

        return pages;
    }
}
};
</script>