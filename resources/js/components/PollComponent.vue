<template>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>#{{poll.id}}. {{ poll.title }}</strong></div>
                <div class="card-body">
                    <div class="col-md-12">
                        <p>{{ poll.description }}</p>
                    </div>
                    <form method="POST" :action="'/poll/vote/confirm/' + poll.id">
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="col-md-12"  v-for="option in options">
                        <label :for="'option' + option.id">
                            <input type="radio" name="option" :value="option.id"> {{option.value}}
                        </label>
                        </div>
                        <button class="btn btn-success">Votar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['poll', 'options'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        console.log(this.poll);
        console.log(this.options);
    }

}
</script>

<style scoped>
    strong {
        font-weight: 900;
    }
</style>
