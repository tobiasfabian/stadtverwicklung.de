import path from 'path'
import { defineConfig } from 'kirbyup/config'

const kirbyVueRoot = path.resolve(__dirname, '../../../kirby/panel/src');

export default defineConfig({
  extendViteConfig: {
    resolve: {
      alias: [
        { find: '@', replacement: kirbyVueRoot },
      ],
    },
  },
});
