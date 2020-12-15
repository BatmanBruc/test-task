<template>
    <tr>
        <th scope="row">{{ id }}</th>
        <td>{{ name }}</td>
        <td>{{ email }}</td>
        <td>{{ theme }}</td>
        <td>{{ message }}</td>
        <td>{{ created }}</td>
        <td><a :href="'/uploads/'+file">Ссылка на файл</a></td>
        <td>
            <button v-if="!check" @click="checking(id)" type="button" class="btn btn-primary">Отметить</button>
            {{ check ? 'Просмотренно' : '' }}
        </td>
    </tr>
</template>

<script>
    export default {
       name: 'itemList',
       props:{
            id: {
                type: Number,
            },
            name: {
                type: String,
            },
            email: {
                type: String,
            },
            theme: {
                type: String,
            },
            message: {
                type: String,
            },
            created: {
                type: String,
            },
            check: {
                type: Number,
            },
            file: {
                type: String,
            }
       },
        methods:{
            checking(id){
                this.$emit('check', id);
                $.ajax({
                    url: '/checkRequest',
                    data: { id },
                    type: 'POST',
                    headers: {

                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

                    },
                })
            }
        }
    }
</script>
