/**
 * View your website at your own local server.
 * Example: if you're using WP-CLI then the common URL is: http://localhost:8080.
 * 
 * http://localhost:5173 is serving Vite on development. Access this URL will show empty page.
 * 
 */

import { defineConfig } from "vite";
import path, { resolve } from 'path';


export default defineConfig({
    plugins: [
        {
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.php')) {
                    server.ws.send({ type: 'full-reload', path: '*' });
                }
            }
        }
    ],
   
    build: {
        // emit manifest so PHP can find the hashed files
        manifest: true, 
        
        outDir: path.resolve(__dirname, 'dist'),
        rollupOptions: {
            input: {
                main: resolve(__dirname +'/main.js'),
                path: resolve(__dirname +'/autor.js')
            },
            output: {
                assetFileNames: "[name].[ext]",
                chunkFileNames: "[name].[ext]",
                entryFileNames: "[name].js",
              },
        }
    },
  
    server: {
        // required to load scripts from custom host
        cors: {
            origin: "*"
        },
        
        // We need a strict port to match on PHP side.
        // You can change it. But, please update it on your .env file to match the same port
        strictPort: true,
        port: 5173
    },
    export:{
        
    }
})
