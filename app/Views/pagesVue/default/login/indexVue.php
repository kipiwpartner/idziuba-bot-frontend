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
            <el-button plain @click="open4"> Error </el-button>
            <p>{{this.lang.test}}</p>
        </div>
    </el-container>
</script>

<script>
    const loginIndexVue = Vue.createApp({})

    const authModel = {
        email: '',
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
                        vbind: {'clearable':true},
                        label: <?= json_encode( lang('Rules.labels.email')) ?>,
                        id: 'email',
                        placeholder: '<?= lang('Rules.placeholders.email') ?>'
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
                        vbind: {'show-password':true},
                        label: <?= json_encode( lang('Rules.labels.password')) ?>,
                        id: 'password',
                        placeholder: '<?= lang('Rules.placeholders.password') ?>'
                    }
                }
            },
            /* Buttons */
            'buttonComponentSendApi': {
                template: '#button-component-template',
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
                        title:  <?= json_encode(lang('Translate.lang.btn_send')) ?> + ' Api',
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
                        title: <?= json_encode(lang('Translate.lang.btn_send')) ?> + ' GraphQL',
                        data: <?= json_encode($data) ?>
                    }
                }
            }
        },
        methods: {
            open4: function () {
                mainScripts.notify(this.$notify, this.titles.error, this.messages.form_invalid,'error')
            }
        },
        data() {
            return {
                loading: false,
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