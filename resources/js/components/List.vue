<template>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Тема</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Дата и время</th>
            <th scope="col">Файл</th>
            </tr>
        </thead>
        <tbody id="list">
            <itemList v-for="request in requests" 
            :key="request.id" 
            :id="request.id" 
            :name="request.name" 
            :email="request.email" 
            :theme="request.theme"  
            :message="request.message"
            :created="request.created_at"
            :check="request.check"
            :file="request.file"
            @check="()=>{request.check = 1}"
            ></itemList>
        </tbody>
    </table>
</template>

<script>
    import itemList from './itemList.vue';

    export default {
        name: 'List',
        components:{
            itemList
        },
        data: function () {
            return {
                requests: requests
            }
        },
    }
</script>
