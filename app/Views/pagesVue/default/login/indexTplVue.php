<script type="text/x-template" id="index-login-default-template">
    <div class="cb-form">
        <h1>Login Vue {{this.data.test}}</h1>
        <el-form
                :label-position="'top'"
                label-width="100px"
                :model="modelForm"
                style="max-width: 460px"
        >
            <div class="cb-form__field">
                <el-form-item :label="this.labels.email" :class="'is-error is-required'">
                    <el-input
                            v-model="modelForm.email"
                            id="email"
                            name="email"
                            :placeholder="placeholders.email"
                            clearable
                    />
                    <div class="el-form-item__error">Please input activity form</div>
                </el-form-item>
            </div>
            <div class="cb-form__field">
                <label id="passwordLabel" class="cb-form__field__label">{{this.labels.password}}</label>
                <el-input
                        v-model="modelForm.password"
                        type="password"
                        :placeholder="placeholders.password"
                        show-password
                        name="password"
                        id="password"
                        class="cb-form__field__input"
                />
                <p class="cb-form__field__error">Hello </p>
            </div>

        </el-form>


        <el-button type="primary" @click="handleClick">{{this.lang.btn_send}}</el-button>
        <el-button plain @click="open4"> Error </el-button>
        <p>{{this.lang.test}}</p>
    </div>

</script>

<script>
    const loginIndexTplVue = Vue.createApp({})
    loginIndexTplVue.use(ElementPlus);
    loginIndexTplVue.component("index-login-default", {
        template: "#index-login-default-template",
        methods: {
            handleClick: async function () {
                let data = await mainScripts.onAxiosCall(this.data.onAxiosCalls.auth,
                    {'email':'fdsfsdf', 'password':'mamaTest'},
                    'POST'
                )
                console.log(data)
            },
            open4: function () {
                this.$notify({
                    title: 'Error',
                    message: this.labels.password,
                    type: 'error',
                })
            }
        },
        mounted() {
            console.log(this.data.onAxiosCalls.login)
        },
        data() {
            return {
                modelForm: {},
                data: <?= json_encode($data) ?>,
                lang: <?= json_encode( langObj('Translate.lang')) ?>,
                labels: <?= json_encode( langObj('Rules.labels')) ?>,
                placeholders: <?= json_encode( langObj('Rules.placeholders')) ?>
            }
        }
    });
</script>