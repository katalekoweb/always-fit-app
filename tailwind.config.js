import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "brand-charade": {
                    DEFAULT: "#282632",
                    50: "#7D7898",
                    100: "#726C8F",
                    200: "#605B78",
                    300: "#4D4960",
                    400: "#3B3849",
                    500: "#282632",
                    600: "#0F0E12",
                    700: "#000000",
                    800: "#000000",
                    900: "#000000",
                    950: "#000000",
                },
                "brand-jade": {
                    DEFAULT: "#00BF62",
                    50: "#78FFBD",
                    100: "#63FFB3",
                    200: "#3AFF9F",
                    300: "#12FF8B",
                    400: "#00E877",
                    500: "#00BF62",
                    600: "#008745",
                    700: "#004F28",
                    800: "#00170C",
                    900: "#000000",
                    950: "#000000",
                },
                "brand-nile-blue": {
                    DEFAULT: "#1B3C4F",
                    50: "#5B9FC7",
                    100: "#4C97C2",
                    200: "#3A81AA",
                    300: "#306A8C",
                    400: "#25536D",
                    500: "#1B3C4F",
                    600: "#0D1C25",
                    700: "#000000",
                    800: "#000000",
                    900: "#000000",
                    950: "#000000",
                },
                "brand-elephant": {
                    DEFAULT: "#143A4E",
                    50: "#49A2D0",
                    100: "#3999CC",
                    200: "#2D82AF",
                    300: "#256A8F",
                    400: "#1C526E",
                    500: "#143A4E",
                    600: "#091921",
                    700: "#000000",
                    800: "#000000",
                    900: "#000000",
                    950: "#000000",
                },
                "brand-whisper": {
                    DEFAULT: "#F7F7FB",
                    50: "#FFFFFF",
                    100: "#FFFFFF",
                    200: "#FFFFFF",
                    300: "#FFFFFF",
                    400: "#FFFFFF",
                    500: "#F7F7FB",
                    600: "#D2D2E8",
                    700: "#ACACD6",
                    800: "#8787C3",
                    900: "#6161B0",
                    950: "#5252A4",
                },
            },
        },
    },

    plugins: [forms],
};
