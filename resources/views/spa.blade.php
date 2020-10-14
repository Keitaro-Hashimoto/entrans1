<html>
<body>
    <div id="app">
        <div v-if="!loggedIn">
            ログインフォーム<br>
            <input type="email" v-model="email">
            <br>
            <input type="password" v-model="password">
            <br>
            <button type="button" @click="login">ログイン</button>
        </div>
        <div v-else>
            ログイン中！<br>
<!--            <button type="button" @click="getUser">ユーザー情報を取得</button>-->
        </div>
    </div>
    <script src="/js/app.js"></script>
    <script>

        new Vue({
            el: '#app',
            data: {
                loggedIn: false,
                email: '',
                password: '',
                userId : ''
            },

            methods: {
                login() {

                    axios.get('/sanctum/csrf-cookie')
                        .then(response => {

                            const url = '/api/login';
                            const params = {
                                email: this.email,
                                password: this.password
                            };
                            axios.post(url, params)
                                .then(response => {

                                    this.loggedIn = response.data.result;
                                    axios.get('/api/user').then(response => {
                                      console.log(response.data); // ユーザー情報を取得
                                      this.userId = response.data.id;
                                      console.log(this.userId);
                                    });
                                })
                                .catch(error => {

                                    alert('ログインに失敗しました。');

                                });

                        });

                }
//                getUser() {
//
//                    axios.get('/api/user')
//                        .then(response => {
//
//                            console.log(response.data); // ユーザー情報を取得
//
//                        });
//
//                }
            }
        });

    </script>
</body>
</html>