<template>
    <div>
        <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" name="title" required class="form-control"/>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Data Inicial</label>
                    <input type="date" name="starts_at" required class="form-control" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Data Final</label>
                    <input type="date" name="closes_at" class="form-control" required />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 form-group" v-for="opcao in opcoes">
                <label for="">Opção {{opcao}}</label>
                <input type="text" class="form-control" name="options[]" required />
            </div>

            <div class="col-md-3">
                <button class="btn btn-success" @click="opcoes++" style="margin-top: 1.8rem">+</button>
                <button class="btn btn-danger" @click="opcoes--" v-if="opcoes > 3" style="margin-top: 1.8rem">-</button>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    data() {
        return {
            opcoes: 3
        }
    }
}
</script>

