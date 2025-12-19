/// <reference types="unlighthouse" />
import { defineConfig } from 'unlighthouse';

/**
 * @see https://unlighthouse.dev/api/config
 */

export default defineConfig({
	scanner: {
		// sitemap: ['https://stadtverwicklung.de/sitemap.xml'],
		// use mobile or desktop to scan
		device: 'mobile',
		// exclude specific routes
		exclude: [
			'/en/*',
		],
		// run lighthouse for each URL 3 times
		samples: 1,
		// enable the throttling mode
		throttle: true,
	},
	puppeteerOptions: {
		// ignore certificate errors for local testing
		args: ['--ignore-certificate-errors'],
	},
	// Auth for staging
	auth: {
		username: 'vorschau',
		password: 'wohl',
	},
});
