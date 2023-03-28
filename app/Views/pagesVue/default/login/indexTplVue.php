<script type="text/x-template" id="index-login-default-template">
    <div class="cb-form">
        <h1 class="text-blue-600">Login Vue {{this.data.test}}</h1>
        <el-form
                :label-position="'top'"
                label-width="100px"
                :model="modelForm"
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
                    <div
                            class="el-form-item__error"
                            id="emailError"
                            name="emailError"
                    >
                        Please input email
                    </div>
                </el-form-item>
            </div>
            <div class="cb-form__field">
                <el-form-item :label="this.labels.password" :class="'is-error'">
                    <el-input
                            v-model="modelForm.password"
                            id="password"
                            name="password"
                            :placeholder="placeholders.password"
                            show-password
                            class="cb-form__field__input"
                    />
                    <div
                            class="el-form-item__error"
                            id="passwordError"
                            name="passwordError"
                    >
                        Please input password
                    </div>
                </el-form-item>
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
                    {'email': this.modelForm.email, 'password': this.modelForm.password},
                    'POST'
                )
                console.log(data)
            },
            open4: function () {
                mainScripts.notify(this.$notify, this.titles.error, this.messages.form_invalid,'error')
            }
        },
        mounted() {
            console.log()
        },
        data() {
            return {
                modelForm: {},
                data: <?= json_encode($data) ?>,
                lang: <?= json_encode( langObj('Translate.lang')) ?>,
                labels: <?= json_encode( langObj('Rules.labels')) ?>,
                placeholders: <?= json_encode( langObj('Rules.placeholders')) ?>,
                titles: <?= json_encode( langObj('Rules.titles')) ?>,
                messages: <?= json_encode( langObj('Rules.messages')) ?>
            }
        }
    });
</script>