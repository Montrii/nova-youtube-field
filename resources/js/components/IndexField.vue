<template>
  <span v-if="this.invalidLink">Invalid Youtube Link</span>
    <div v-else>
        <a v-bind:href="fieldValue" v-if="this.field.indexClickable" @click="openLink">
            <img v-bind:src="thumbnailImage" style="height: 3em; width: 6em; object-fit:cover;">
        </a>
        <img v-else v-bind:src="thumbnailImage" style="height: 3em; width: 6em; object-fit:cover;">
    </div>
</template>

<script>
export default {
  props: ['resourceName', 'field'],

    data()
    {
        return {
            invalidLink: false,
            youtubeVideoId: null,
            thumbnailImage: null,
        }
    },


    mounted()
    {
        let match = this.fieldValue.match(/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/);
        if (match && match[2].length === 11)
        {
            this.youtubeVideoId = match[2];
            this.thumbnailImage = "https://img.youtube.com/vi/" + this.youtubeVideoId + "/0.jpg";
        } else
        {
            this.invalidLink = true;
        }
    },
    methods: {
        openLink()
        {
            if(this.field.indexinSameTab)
                window.open(this.fieldValue,"_self")
            else
                window.open(this.fieldValue, '_blank').focus();
        }
    },
    computed: {
        fieldValue() {
            return this.field.displayedAs || this.field.value
        },
    },


}
</script>
