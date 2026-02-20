<template>
	<figure
		:data-empty="isEmpty"
		class="k-block-type-gallery-figure"
	>
		<ul @dblclick="open">
			<template v-if="isEmpty">
				<li
					v-for="index in 3"
					:key="index"
					class="k-block-type-gallery-placeholder"
				>
					<k-image-frame :ratio="ratio" class="k-block-type-gallery-frame" />
				</li>
			</template>
			<template v-else>
				<li v-for="item in content.items" :key="item.id">
					<k-block-figure
						:caption="item.caption"
					>
						<k-image-frame
							:ratio="ratio"
							:cover="crop"
							:src="item.image[0]?.url"
							:srcset="item.image[0]?.image.srcset"
							:alt="item.image[0]?.alt"
							class="k-block-type-gallery-frame"
						/>
					</k-block-figure>
				</li>
			</template>
		</ul>
	</figure>
</template>

<script>
import Gallery from "@/components/Forms/Blocks/Types/Gallery.vue";


/**
 * @displayName BlockTypeGallery
 */
export default {
	extends: Gallery,
	computed: {
		crop() {
			return true;
		},
		isEmpty() {
			return !this.content.items?.length;
		},
		ratio() {
			return this.content.ratio;
		}
	},
	methods: {
		onBack(value) {
			const id = `kirby.galleryBlock.${this.endpoints.field}.${this.id}`;

			if (value !== undefined) {
				this.back = value;
				sessionStorage.setItem(id, value);
			} else {
				return sessionStorage.getItem(id);
			}
		}
	}
};
</script>

<style>
	.k-block-type-gallery-figure ul {
		align-items: start;
	}
</style>
