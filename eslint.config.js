// eslint.config.js
import eslint from "@eslint/js";
import pluginVue from "eslint-plugin-vue";
import parser from "vue-eslint-parser";
import globals from "globals";
import eslintConfigPrettier from "eslint-config-prettier"; // Import the Prettier config

export default [
    eslint.configs.recommended,
    ...pluginVue.configs["flat/recommended"],
    {
        files: ["**/*.vue", "**/*.js"],
        languageOptions: {
            parser: parser,
            ecmaVersion: 2020,
            sourceType: "module",
            parserOptions: {
                ecmaFeatures: {
                    jsx: true,
                },
            },
            globals: {
                ...globals.browser,
                ...globals.amd,
            },
        },
        rules: {
            // Remove or turn off formatting rules here, as Prettier will handle them.
            // Eslint-config-prettier handles this for the extended configs,
            // but you should still remove your custom ones.
            // 'indent': ['error', 2],
            // 'quotes': ['warn', 'single'],
            // 'semi': ['warn', 'never'],
            "no-unused-vars": [
                "error",
                { vars: "all", args: "after-used", ignoreRestSiblings: true },
            ],
            "comma-dangle": ["warn", "always-multiline"],

            "vue/multi-word-component-names": "off",
            "vue/max-attributes-per-line": "off",
            "vue/no-v-html": "off",
            "vue/require-default-prop": "off",
            "vue/singleline-html-element-content-newline": "off",
            "vue/html-self-closing": [
                "warn",
                {
                    html: {
                        void: "always",
                        normal: "always",
                        component: "always",
                    },
                },
            ],
            "vue/no-v-text-v-html-on-component": "off",
        },
    },
    eslintConfigPrettier, // Put this last to override all other formatting rules.
];
