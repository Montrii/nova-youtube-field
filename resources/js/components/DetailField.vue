<template>
    <div class="flex flex-col md:flex-row -mx-6 px-6 py-2 md:py-0 space-y-2 md:space-y-0">
        <div class="md:w-1/4 md:py-3">
            <h4 class="font-normal">
                {{ field.indexName }}
            </h4>
        </div>
        <div class="md:w-3/4 md:py-3 break-all lg:break-words">
            <span v-if="invalidLink">Invalid Youtube Link</span>
            <iframe v-else :style="cssProps" v-bind:src="embedLink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</template>

<script>
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],


    data()
    {
        return {
            youtubeVideoId: null,
            invalidLink: null,
            embedLink: null,
        }
    },

    mounted()
    {
        let match = this.field.value.match(/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/);
        if (match && match[2].length === 11)
        {
            this.youtubeVideoId = match[2];
            this.embedLink = "https://www.youtube.com/embed/" + this.youtubeVideoId;
        } else
        {
            this.invalidLink = true;
        }

        console.log(this.field);
    },

    computed:
    {
        cssProps()
        {
            let width = this.field.detailWidth !== undefined ? this.field.detailWidth : 560;
            let height = this.field.detailHeight !== undefined ? this.field.detailHeight : 316;
            return {
                'position': 'relative',
                'width': width + "px",
                'height': height + "px",
            }
        }
    }
}
</script>
