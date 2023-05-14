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
            <div class="flex flex-row justify-between">
                <buttonComponentSendApi />
                <buttonComponentSendGraphQL />
            </div>

            <buttonComponentNotify />
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
        password: ''
    }

    loginIndexVue.use(ElementPlus);
    loginIndexVue.component("index-login-default", {
        template: "#index-login-default-template",
        components: {
            /* Inputs */
            'inputComponentEmail': {
                template: '#input-component-template',
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
                template: '#input-component-template',
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
                        let data = await mainScripts.onAxiosCall(this.data.axiosAPI.auth,
                            authModel,
                            'POST'
                        )
                        e.target.parentNode.blur();
                        console.log(data)
                        this.$parent.$parent.loading = false
                    }
                },
                data() {
                    return {
                        type: 'primary',
                        vbind: {'round': true},
                        title:  <?= json_encode(lang('Form.buttons.send')) ?> + ' Api',
                        data: <?= json_encode($data) ?>
                    }
                }
            },
            'buttonComponentSendGraphQL': {
                template: '#button-component-template',
                methods: {
                    handleClick: async function (e) {
                        this.$parent.$parent.loading = true
                        let data = await mainScripts.onAxiosCall(this.data.axiosGraphQL.login,
                            authModel,
                            'POST'
                        )
                        e.target.parentNode.blur();
                        console.log(data)
                        this.$parent.$parent.loading = false
                    }
                },
                data() {
                    return {
                        type: 'info',
                        vbind: {},
                        title: <?= json_encode(lang('Form.buttons.send')) ?> + ' GraphQL',
                        data: <?= json_encode($data) ?>
                    }
                }
            },
            'buttonComponentNotify': {
                template: '#button-component-template',
                methods: {
                    handleClick: function (e) {
                        mainScripts.notify(this.$notify, this.data.lang.notify.titles.error, this.data.lang.notify.msg.form_invalid, 'error')
                        e.target.parentNode.blur();
                    }
                },
                data() {
                    return {
                        type: '',
                        vbind: { 'plain': true },
                        title: <?= json_encode(lang('Form.buttons.notify')) ?> + ' GraphQL',
                        data: <?= json_encode($data) ?>
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