<?php require_once(APPPATH.'Views\templates\components\ButtonComponent.php') ?>
<?php require_once(APPPATH.'Views\templates\components\InputComponent.php') ?>

<script type="text/x-template" id="index-login-default-template">
    <el-container v-loading="loading">
        <div class="cb-form">
            <h1 class="text-blue-600">Login Vue {{this.data.test}}</h1>
            <el-form
                :label-position="'top'"
                label-width="100px"
            >
                <inputComponentEmail />
                <inputComponentPassword />
            </el-form>
            <div class="flex flex-row justify-between mt-5">
                <buttonComponentSendApi />
                <buttonComponentSendGraphQL />
            </div>
        </div>
    </el-container>
</script>

<script>
    const loginIndexVue = Vue.createApp({})

    const authModel = {
        email: '',
        password: ''
    }

    const templates = {
        button: '#button-component-template',
        input: '#input-component-template'
    }

    loginIndexVue.use(ElementPlus);
    loginIndexVue.component("index-login-default", {
        template: "#index-login-default-template",
        components: {
            /* Inputs */
            'inputComponentEmail': {
                template: templates.input,
                methods: {
                    handleInput: function (val) {
                        authModel.email = val;
                    }
                },
                data() {
                    return {
                        vmodel: authModel.email,
                        id: 'email',
                        label: <?= json_encode( lang('Form.labels.email')) ?>,
                        placeholder: '<?= lang('Form.placeholders.email') ?>',
                        vbind: {'clearable':true}
                    }
                }
            },
            'inputComponentPassword': {
                template: templates.input,
                methods: {
                    handleInput: function (val) {
                        authModel.password = val;
                    }
                },
                data() {
                    return {
                        vmodel: authModel.password,
                        id: 'password',
                        label: <?= json_encode( lang('Form.labels.password')) ?>,
                        placeholder: '<?= lang('Form.placeholders.password') ?>',
                        vbind: {'show-password':true}
                    }
                }
            },
            /* Buttons */
            'buttonComponentSendApi': {
                template: templates.button,
                methods: {
                    handleClick: async function (e) {
                        this.$parent.$parent.loading = true
                        let data = this.$parent.$parent.data

                        let resp = await mainScripts.onAxiosCall(data.axiosAPI.auth,
                            authModel,
                            'POST'
                        )
                        e.target.parentNode.blur();
                        mainScripts.resetErrorArray(authModel)
                        if (!resp.data.validation.result) {
                            mainScripts.notify(this.$notify, data.lang.notify.titles.error, data.lang.notify.msg.form_invalid, 'error')
                            mainScripts.setErrorArray(resp.data.validation.errors)
                        }
                        if (resp.data.validation.result && resp.data.resp.result && resp.data.resp.status === 200){
                            mainScripts.notify(this.$notify, data.lang.notify.titles.success, data.lang.notify.msg.auth_success, 'success')
                        }
                        if (!resp.data.resp.result && resp.data.resp.status === 500){
                            mainScripts.notify(this.$notify, data.lang.notify.titles.error, data.lang.notify.msg.bad_request, 'error')
                        }
                        this.$parent.$parent.loading = false
                    }
                },
                data() {
                    return {
                        type: 'success',
                        vbind: {},
                        title:  <?= json_encode(lang('Form.buttons.auth')) ?>
                    }
                }
            },
            'buttonComponentSendGraphQL': {
                template: templates.button,
                methods: {
                    handleClick: async function (e) {
                        this.$parent.$parent.loading = true
                        let data = this.$parent.$parent.data

                        let resp = await mainScripts.onAxiosCall(data.axiosGraphQL.login,
                            authModel,
                            'POST'
                        )
                        e.target.parentNode.blur();

                        mainScripts.resetErrorArray(authModel)
                        if (!resp.data.validation.result) {
                            mainScripts.setErrorArray(resp.data.validation.errors)
                        }
                        this.$parent.$parent.loading = false
                        console.log(resp)
                    }
                },
                data() {
                    return {
                        type: 'info',
                        vbind: {},
                        title: <?= json_encode(lang('Form.buttons.send')) ?> + ' GraphQL'
                    }
                }
            }
        },
        data() {
            return {
                loading: false,
                data: <?= json_encode($data) ?>
            }
        }
    });
</script>