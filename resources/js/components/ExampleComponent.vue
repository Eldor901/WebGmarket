<template>
    <div class="container">
        <div class="card" style="overflow-x:auto;">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Restaurant</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(order, idx) in rows" v-bind:key="idx">
                    <td class="text-center">{{order.name}}</td>
                    <td class="text-center">{{order.age}}</td>
                    <td class="text-center">{{order.createdAt}}</td>
                    <td class="text-center">{{order.score}}</td>
                    <td class="text-center">{{order.total}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },


        data(){
            return {
                rows: [
                    { id:1, name:"John", age: 20, createdAt: '',score: 0.03343 },
                    { id:2, name:"Jane", age: 24, createdAt: '2011-10-31', score: 0.03343 },
                    { id:3, name:"Susan", age: 16, createdAt: '2011-10-30', score: 0.03343 },
                    { id:4, name:"Chris", age: 55, createdAt: '2011-10-11', score: 0.03343 },
                    { id:5, name:"Dan", age: 40, createdAt: '2011-10-21', score: 0.03343 },
                    { id:6, name:"John", age: 20, createdAt: '2011-10-31', score: 0.03343 },
                ],
            };
        },

        methods: {
            sortArrays(arrays) {
                return _.orderBy(arrays, 'name', 'asc');
            }
        }
    }
</script>
