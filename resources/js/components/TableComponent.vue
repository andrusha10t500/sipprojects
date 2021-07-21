<template>
    <div class="container">
        <table class="table table-dark rounded table-bordered">
            <thead class="thead-dark text-center">
                <th>ID</th>
                <th>Ссылка</th>
                <th>Размер файла</th>
                <th>Дата/время загрузки</th>
            </thead>
            <tbody v-for="file in files">
                <tr>
                    <td>{{ file['id'] }}</td>

                    <td><a v-bind:href="currentHostname(file['link'])" >{{ currentHostname(file['link']) }}</a> </td>

                    <td>{{ file['size'] }}</td>

                    <td class="text-center">{{ file['created_at'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data()  {
            return {
                files : null,
                currentHost : null
            }
        },
        created() {
            this.update();
        },
        methods: {
            update() {
                axios
                    .get('/api/')
                    .then(response => {
                        this.files = response.data.data;
                    })
                    .catch(error => {
                        console.log(error.message);
                    })
            },
            currentHostname(link) {
                link = location.href + link.substr(link.indexOf('storage'));
                return link;
            }
        }
    }
</script>

<style scoped>

</style>