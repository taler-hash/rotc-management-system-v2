<template>
	<div class="w-full h-full">
		<Menubar :model="nav" class="text-sm font-bold py-2">
			<template #item="{ item, props, hasSubmenu }">
				<router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
					<a :href="href" v-bind="props.action" @click="navigate">
						<span :class="item.icon" />
						<span class="ml-2">{{ item.label }}</span>
					</a>
				</router-link>
			</template>
		</Menubar>
		<!-- Content -->
		<div class="w-full h-[calc(100%-2rem)] p-4">
      <div class="p-2 bg-white rounded-md shadow">
			  <router-view></router-view>
      </div>
		</div>
	</div>
</template>

<script>
import 'primevue/resources/themes/aura-light-green/theme.css';
import Menubar from 'primevue/menubar';
import Badge from 'primevue/badge';

export default {
	components: {
		Menubar,
		Badge
	},

	data() {
		return {
			nav: [
				{
					label: 'Admin',
					route: 'admin',
				},
				{
					label: 'Dashboard',
          route: 'dashboard',
				},
				{
					label: 'Cadets',
				},
				{
					label: 'Grades',
				}

			]
		}
	}
}


</script>