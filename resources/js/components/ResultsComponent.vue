<template>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>#{{poll.id}}. {{ poll.title }}</strong></div>
                <div class="card-body">
                    <div class="col-md-12">
                        <p>{{ poll.description }}</p>
                    </div>

                        <div class="col-md-12"  v-for="option in this.$store.state.options">
                            <div class="alert alert-secondary">

                                {{option.value}} - {{ option.votes}} votos
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" :style="'width:' + (option.votes/$store.state.options.reduce((a, b) => a + parseInt(b['votes']), 0))*100 + '%'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    props: ['options', 'poll'],
    mounted()  {
        this.$store.state.options = this.options;
    }

}
</script>

<style scoped>
.progress-bar {
   height: 10px;
}
</style>
