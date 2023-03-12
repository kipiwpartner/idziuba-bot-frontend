<script type="text/x-template" id="login-index-template">
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
        <el-button type="primary">Primary</el-button>
    </div>

</script>

<script>
    const loginIndexTplVue = Vue.createApp({})
    loginIndexTplVue.use(ElementPlus);
    loginIndexTplVue.component("login-index", {
        template: "#login-index-template",
        methods: {

        },
        mounted() {

        },
        data(){
            return {
                input:{},
                data: <?= json_encode($data) ?>
            }
        } });

</script>