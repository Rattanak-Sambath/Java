<!DOCTYPE html>
<html>

<head>
    <title>New Home</title>
    <!-- quasar -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- dayjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"
        integrity="sha512-0fcCRl828lBlrSCa8QJY51mtNqTcHxabaXVLPgw/jPA5Nutujh6CbTdDgRzl9aSPYW/uuE7c4SffFUQFBAy6lg=="
        crossorigin="anonymous"></script>

</head>

<body>
    <div>
        <template>
            <div class="container">
                <div class="large-12 medium-12 small-12 cell">
                    <h1>File Upload Example In Vuejs Using PHP</h1>
                    <label>File
                        <input type="file" id="file" ref="file" />
                    </label>
                    <button v-on:click="uploadFile">Upload</button>
                </div>
            </div>
        </template>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.umd.min.js"></script>
    <script>
    export default {

        data() {
            return {
                file: ''
            }
        },
        methods: {
            uploadFile() {
                this.file = this.$refs.file.files[0];
                let formData = new FormData();
                formData.append('file', this.file);
                this.$refs.file.value = '';
                this.axios.post('http://localhost/rajesh/api/upload.php', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        if (!response.data) {
                            alert('File not uploaded.');
                        } else {
                            alert('File uploaded successfully.');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        },

    }
    </script>
</body>

</html>