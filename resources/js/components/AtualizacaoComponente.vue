<template>
    <div>
        <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" name="title" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Data</label>
            <input type="date" name="closes_at" class="form-control" />
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control"></textarea>
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


<!--

<form action="/poll/save/{{ $poll->id }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value={{ $poll->id }} />
            <input type="text" name="title" value={{ $poll->title }} />
            <input type="date" name="closes_at" value={{ $poll->closes_at }} />
            <textarea name="description">{{ $poll->description }}</textarea>
            <input type="text" name="options[]" required value={{ $options[0]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[0]->id }} />
            <input type="text" name="options[]" required value={{ $options[1]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[1]->id }} />
            <input type="text" name="options[]" required value={{ $options[2]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[2]->id }} />
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

-->

<script>
export default {
    data() {
        return {
            opcoes: 3
        }

    }
}
</script>

