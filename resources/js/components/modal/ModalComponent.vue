<template>
    <div class="row">
        <input class="form-control" type="file" ref="file" @change="getFile()" value="upload">
        <button class="btn btn-success" @click="upload()">Загрузить</button>
        <button class="btn btn-danger" @click="$emit('close')">close</button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                files: null,
            }
        },
        methods: {
            upload() {
                let form = new FormData();
                form.append('file', this.files);
                axios
                    .post('/upload', form, {
                        headers : {"Content-type" : "multipart/form-data"}
                    })
                    .then(response => {
                        this.$emit('close');
                    })
                    .catch(error => {
                        console.log(error.message);
                    })
            },
            getFile() {
                this.files = this.$refs.file.files[0];
            }
        }
    }
</script>

<style scoped>

</style>