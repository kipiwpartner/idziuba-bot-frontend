<script type="text/x-template" id="input-component-template">
    <div class="cb-form__field">
        <el-form-item :label="label">
            <el-input
                v-model="vmodel"
                :id="id"
                :name="id"
                :placeholder="placeholder"
                v-bind="vbind"
                @input="(val) => handleInput(val)"
            />
            <div
                class="el-form-item__error"
                :id="id + 'Error'"
            >
            </div>
        </el-form-item>
    </div>
</script>