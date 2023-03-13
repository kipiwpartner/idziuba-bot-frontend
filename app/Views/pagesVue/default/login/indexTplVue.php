<script type="text/x-template" id="index-login-default-template">
    <div>
        <h1>Login Vue {{this.data.test}}</h1>
        <el-input
                v-model="input.email"
                id="email"
                name="email"
                placeholder="Please input email"
                clearable
        />
        <el-input
                v-model="input.password"
                type="password"
                placeholder="Please input password"
                show-password
        />
        <el-button type="primary">{{this.lang.btn_send}}</el-button>
        <p>{{this.lang.test}}</p>
    </div>

</script>

<script>
    const loginIndexTplVue = Vue.createApp({})
    loginIndexTplVue.use(ElementPlus);
    loginIndexTplVue.component("index-login-default", {
        template: "#index-login-default-template",
        methods: {},
        mounted() {
            console.log(this.lang)
        },
        data() {
            return {
                input: {},
                data: <?= json_encode($data) ?>,
                lang: <?= json_encode( langObj('Translate.lang')) ?>
            }
        }
    });
</script>