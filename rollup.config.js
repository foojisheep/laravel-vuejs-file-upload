import commonjs from '@rollup/plugin-commonjs';

export default {
  input: 'resources/js/app.js',
  output: {
    dir: 'output',
    format: 'cjs'
  },
  plugins: [commonjs()]
};