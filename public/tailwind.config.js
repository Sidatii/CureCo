/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./app/views/pages/*.{php, html, js}", "./app/views/inc/*.{php, html, js}", "./node_modules/flowbite/**/*.js"],
    "darkMode": "class",
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],}
